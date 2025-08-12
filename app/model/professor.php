<?php
require_once '../config/connect.php';

class Professor extends Connect {
    private $nome;
    private $email;
    private $fone;
    private $tabela = 'professores';

    public function __construct() {
        parent::__construct();
    }

    public function getNome() { return $this->nome; }
    public function getEmail() { return $this->email; }
    public function getFone() { return $this->fone; }

    public function setNome($nome): void { $this->nome = $nome; }
    public function setEmail($email): void { $this->email = $email; }
    public function setFone($fone): void { $this->fone = $fone; }

    public function cadastrarProfessor() {
        $sql = "INSERT INTO $this->tabela (nome_prof, email, fone) VALUES (:nome, :email, :fone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':nome', $this->getNome(), PDO::PARAM_STR);
        $stmt->bindValue(':email', $this->getEmail(), PDO::PARAM_STR);
        $stmt->bindValue(':fone', $this->getFone(), PDO::PARAM_STR);

       return $stmt->execute();
    }

    public function consultarProfessores() {
        $sql = "SELECT p.id_prof, p.nome_prof, p.email, p.fone, u.ultimo_login 
                FROM $this->tabela AS p 
                LEFT JOIN usuarios AS u ON p.email = u.email
                ORDER BY u.ultimo_login DESC";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        return $stmt->fetchAll(PDO::FETCH_ASSOC);
    }
}
?>