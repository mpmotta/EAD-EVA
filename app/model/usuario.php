<?php
require_once '../config/connect.php';

class Usuario extends Connect {
    private $name;
    private $username;
    private $senha;
    private $nivel;
    private $email;
    private $fone;
    private $tabela = 'usuarios';

    public function __construct() {
        parent::__construct();
    }

    public function getName() { return $this->name; }
    public function getUsername() { return $this->username; }
    public function getSenha() { return $this->senha; }
    public function getNivel() { return $this->nivel; }
    public function getEmail() { return $this->email; }
    public function getFone() { return $this->fone; }

    public function setName($name): void { $this->name = $name; }
    public function setUsername($username): void { $this->username = $username; }
    public function setSenha($senha): void { $this->senha = $senha; }
    public function setNivel($nivel): void { $this->nivel = $nivel; }
    public function setEmail($email): void { $this->email = $email; }
    public function setFone($fone): void { $this->fone = $fone; }

    public function cadastrarUsuario() {
    
        $sql = "INSERT INTO $this->tabela (username, nivel, email) VALUES (:username, :nivel, :email)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':username', $this->getUsername(), PDO::PARAM_STR);
        $stmt->bindValue(':nivel', $this->getNivel(), PDO::PARAM_INT);
        $stmt->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        if ($stmt->execute()) {
            return $this->conn->lastInsertId();
        }
        return false;
    }

    public function logarUsuario($username, $senha) {
        $sql = "SELECT id_usuario, username, senha, email, nivel FROM $this->tabela WHERE username = :username AND senha = :senha";
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
            $_SESSION['name'] = $result['username'];
            $_SESSION['username'] = $result['username'];
            $_SESSION['email'] = $result['email'];
            $this->ultimoAcesso($result['id_usuario']);
            header('Location: ../view/logado.php?logado=true');
        } else {
            header('Location: ../view/index.php?erro=login');
        }
    }

    public function consultarUsuarios() {
        $sql = "SELECT id_usuario, username, nivel, email, ultimo_login FROM $this->tabela ORDER BY ultimo_login DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    function ultimoAcesso($id) {
        $sql = "UPDATE $this->tabela SET ultimo_login=NOW() WHERE id_usuario = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
?>