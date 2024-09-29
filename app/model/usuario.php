<?php
require_once '../config/connect.php';

class Usuario extends Connect{
    private $username;
    private $senha;
    private $nivel;
    private $email;
    private $tabela = 'usuarios';

    public function __construct(){
        parent::__construct();
    }

    public function getUsername(){
        return $this->username;
    }

    public function getSenha(){
        return $this->senha;
    }

    public function getNivel(){
        return $this->nivel;
    }

    public function getEmail(){
        return $this->email;
    }

    public function setUsername($username): void{
        $this->username = $username;
    }

    public function setSenha($senha): void{
        $this->senha = $senha;
    }

    public function setNivel($nivel): void{
        $this->nivel = $nivel;
    }

    public function setEmail($email): void{
        $this->email = $email;
    }

    public function consultarUsuarios(){
        $sql = "SELECT id_usuario, username, nivel, email, ultimo_login FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarUsuario($usuarioObj) {
        $sql = "INSERT INTO $this->tabela (usename, senha, nivel, email) VALUES (:username, :senha, :nivel, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $usuarioObj->getUsername(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $usuarioObj->getSenha(), PDO::PARAM_STR);
        $stmt->bindParam(':nivel', $usuarioObj->getNivel(), PDO::PARAM_INT);
        $stmt->bindParam(':email', $usuarioObj->getEmail(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function logarUsuario($username, $senha){
        $sql = "SELECT id_usuario, username, senha, nivel FROM $this->tabela WHERE username = :username AND senha = :senha";
        
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['id'] = $result['id_usuario'];
            $_SESSION['nivel'] = $result['nivel'];

            $this->ultimoAcesso($result['id_usuario']);

            header('Location: ../view/logado.php?logado=true');
        } else {
            header('Location: ../view/index.php?erro=login');
        }
         
    }

    function ultimoAcesso($id) {
        $sql = "UPDATE $this->tabela SET ultimo_login=NOW() WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();    
    }


    public function alterarAvatar($avatar, $id){
        $sql = "UPDATE $this->tabela SET avatar = :avatar 
        WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
