<?php
require_once '../config/connect.php';

class Professor extends Connect{
    private $nome;
    private $email;
    private $fone;
    private $lastLogin;
    private $tabela = 'professores';


    public function __construct(){
        parent::__construct();
    }

    public function getNome(){
        return $this->nome;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFone(){
        return $this->fone;
    }

    public function getLastLogin(){
        return $this->lastLogin;
    }

  
    public function setNome($nome): void{
        $this->nome = $nome;
    }

    public function setEmail($email): void{
        $this->email = $email;
    }

    public function setFone($fone): void{
        $this->fone = $fone;
    }

    public function setLastLogin($lastLogin): void{
        $this->lastLogin = $lastLogin;
    }

    public function consultarProfessores(){
        $sql = "SELECT p.id_prof, p.nome_prof, p.email, p.fone, u.ultimo_login 
                FROM $this->tabela AS p 
                LEFT JOIN usuarios AS u ON p.email = u.email";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarProfessor($professorObj){
        $sql = "INSERT INTO $this->tabela (nome_prof, email, fone) VALUES (:nome, :email, :fone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $professorObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $professorObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $professorObj->getFone(), PDO::PARAM_STR);
        $stmt->execute();
    }
}
