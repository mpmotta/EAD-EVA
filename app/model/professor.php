<?php
require_once '../config/connect.php';

class Professor extends Connect{
    private $nome;
    private $cpf;
    private $email;
    private $fone;
    private $tabela = 'professores';


    public function __construct(){
        parent::__construct();
    }

    public function getNome(){
        return $this->nome;
    }

    public function getCpf(){
        return $this->cpf;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFone(){
        return $this->fone;
    }

  
    public function setNome($nome): void{
        $this->nome = $nome;
    }

    public function setCpf($cpf): void{
        $this->cpf = $cpf;
    }

    public function setEmail($email): void{
        $this->email = $email;
    }

    public function setFone($fone): void{
        $this->fone = $fone;
    }

  



    public function consultaProfessores(){
        $sql = "SELECT id_professor, nome, cpf, email, fone FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultaAlunoID($id){
        $sql = "SELECT nome, cpf, email, fone FROM $this->tabela WHERE id_professor = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);

        }
    }

    public function consultaProfCpf($cpf){
        $sql = "SELECT nome, cpf, email, fone FROM $this->tabela WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);
        }
    }

    public function inserir(Professor $professor){
        $sql = "INSERT INTO $this->tabela (nome, cpf, email, fone) VALUES (:nome, :cpf, :email, :fone)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $professor->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $professor->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $professor->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $professor->getFone(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarProfessorId(Professor $professor, $id){
        $sql = "UPDATE $this->tabela SET nome = :nome, cpf = :cpf, email = :email 
        fone = :fone WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $professor->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $professor->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $professor->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $professor->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editarProfessorCpf(Professor $professor, $cpf){
        $sql = "UPDATE $this->tabela SET nome = :nome, cpf = :cpf, email = :email 
        fone = :fone WHEREWHERE cpf = :CPF";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $professor->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $professor->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $professor->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $professor->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':CPF', $cpf, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirProfessor($id){
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
