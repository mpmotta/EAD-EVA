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




    public function logar($username, $senha){
        $sql = "SELECT username, senha, nivel FROM $this->tabela WHERE username = :username AND senha = :senha";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':username', $username, PDO::PARAM_STR);
        $stmt->bindParam(':senha', $senha, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);

        if ($result) {
            session_start();
            $_SESSION['logado'] = true;
            $_SESSION['nivel'] = $result['nivel'];
            header('Location: ../view/logado.php?logado=true');
        } else {
            header('Location: ../view/index.php?erro=login');
        }
    }
}
