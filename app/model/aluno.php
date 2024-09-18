<?php
require_once '../config/connect.php';

class Aluno extends Connect{
    private $nome;
    private $ra;
    private $cpf;
    private $email;
    private $fone;
    private $curso;
    private $turno;
    private $tabela = 'alunos';


    public function __construct(){
        parent::__construct();
    }

    public function getNome(){
        return $this->nome;
    }

    public function getRa(){
        return $this->ra;
    }

    public function getCpf(){
        return $this->email;
    }

    public function getEmail(){
        return $this->email;
    }

    public function getFone(){
        return $this->fone;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function setNome($nome): void{
        $this->nome = $nome;
    }

    public function setRa($ra): void{
        $this->ra = $ra;
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

    public function setCurso($curso): void{
        $this->curso = $curso;
    }

    public function setTurno($turno): void{
        $this->turno = $turno;
    }






    public function consultaAlunos()
    {
        $sql = "SELECT id_aluno, nome, ra, cpf, email, fone, curso, turno FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultaAlunoID($id){
        $sql = "SELECT nome, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setRa($result['ra']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);
            $this->setCurso($result['curso']);
            $this->setTurno($result['turno']);

        }
    }

    public function consultaAlunoCpf($cpf){
        $sql = "SELECT nome, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE cpf = :cpf";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setRa($result['ra']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);
            $this->setCurso($result['curso']);
            $this->setTurno($result['turno']);

        }
    }

    public function inserir(Aluno $aluno){
        $sql = "INSERT INTO $this->tabela (nome, ra, cpf, email, fone, curso, turno) VALUES (:nome, :ra, :cpf, :email, :fone, :curso, :turno)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $aluno->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $aluno->getRa(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $aluno->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $aluno->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $aluno->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $aluno->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':turno', $aluno->getTurno(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarAluno(Aluno $aluno, $id){
        $sql = "UPDATE $this->tabela SET nome = :nome, ra = :ra, cpf = :cpf, email = :email 
        fone = :fone, curso = :curso, turno = :turno WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $aluno->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $aluno->getRa(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $aluno->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $aluno->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $aluno->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $aluno->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':turno', $aluno->getTurno(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editarAlunoCpf(Aluno $aluno, $cpf){
        $sql = "UPDATE $this->tabela SET nome = :nome, ra = :ra, cpf = :cpf, email = :email 
        fone = :fone, curso = :curso, turno = :turno WHERE cpf = :CPF";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $aluno->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $aluno->getRa(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $aluno->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $aluno->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $aluno->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $aluno->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':turno', $aluno->getTurno(), PDO::PARAM_STR);
        $stmt->bindParam(':CPF', $cpf, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirAluno($id){
        $sql = "DELETE FROM $this->tabela WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
