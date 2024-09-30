<?php
require_once '../config/connect.php';

class Aluno extends Connect{
    private $nome;
    private $avatar;
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

    public function getAvatar(){
        return $this->avatar;
    }

    public function getRa(){
        return $this->ra;
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

    public function getCurso(){
        return $this->curso;
    }

    public function getTurno(){
        return $this->turno;
    }

    public function setNome($nome): void{
        $this->nome = $nome;
    }

    public function setAvatar($avatar): void{
        $this->avatar = $avatar;
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


    public function consultarAlunos(){
        $sql = "SELECT a.id_aluno, a.nome, a.avatar, a.ra, a.cpf, a.email, a.fone, a.curso, a.turno, u.ultimo_login 
                FROM $this->tabela AS a 
                LEFT JOIN usuarios AS u ON a.ra = u.username"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarAlunosPorTurno($turno) {
        $sql = "SELECT nome, avatar, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE turno = :turno";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':turno', $turno, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarAlunoID($id){
        $sql = "SELECT nome, avatar, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setAvatar($result['avatar']);
            $this->setRa($result['ra']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);
            $this->setCurso($result['curso']);
            $this->setTurno($result['turno']);
        }
    }

    public function consultarAlunoCpf($cpf){
        $sql = "SELECT nome, avatar, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE cpf = :CPF";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setNome($result['nome']);
            $this->setRa($result['ra']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);
            $this->setCurso($result['curso']);
            $this->setTurno($result['turno']);

        }
    }


    public function consultarAlunoRA($RA){
        $sql = "SELECT nome, avatar, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE ra = :RA";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':RA', $RA, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        if ($result) {
            $this->setNome($result['nome']);
            $this->setNome($result['nome']);
            $this->setRa($result['ra']);
            $this->setCpf($result['cpf']);
            $this->setEmail($result['email']);
            $this->setFone($result['fone']);
            $this->setCurso($result['curso']);
            $this->setTurno($result['turno']);
        }
    }


    public function pesquisarAluno($txt){
        $sql = "SELECT nome, avatar, ra, cpf, email, fone, curso, turno FROM $this->tabela WHERE nome like :txt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':txt', "%" . $txt . "%", PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarAluno($alunoObj){
        $sql = "INSERT INTO $this->tabela (nome, ra, cpf, email, fone, curso, turno) 
        VALUES (:nome, :ra, :cpf, :email, :fone, :curso, :turno)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $alunoObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $alunoObj->getRa(), PDO::PARAM_INT);
        $stmt->bindParam(':cpf', $alunoObj->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $alunoObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $alunoObj->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $alunoObj->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':turno', $alunoObj->getTurno(), PDO::PARAM_STR);
        $stmt->execute();

    }

    public function editarAluno($alunoObj, $id){
        $sql = "UPDATE $this->tabela SET nome = :nome, ra = :ra, cpf = :cpf, email = :email 
        fone = :fone, curso = :curso, turno = :turno WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $alunoObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $alunoObj->getRa(), PDO::PARAM_INT);
        $stmt->bindParam(':cpf', $alunoObj->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $alunoObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $alunoObj->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $alunoObj->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':turno', $alunoObj->getTurno(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function alterarAvatar($avatar, $id){
        $sql = "UPDATE $this->tabela SET avatar = :avatar 
        WHERE id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':avatar', $avatar, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editarAlunoCpf($alunoObj, $cpf){
        $sql = "UPDATE $this->tabela SET nome = :nome, ra = :ra, cpf = :cpf, email = :email 
        fone = :fone, curso = :curso, turno = :turno WHERE cpf = :CPF";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $alunoObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $alunoObj->getRa(), PDO::PARAM_INT);
        $stmt->bindParam(':cpf', $alunoObj->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $alunoObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $alunoObj->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $alunoObj->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':turno', $alunoObj->getTurno(), PDO::PARAM_STR);
        $stmt->bindParam(':CPF', $cpf, PDO::PARAM_STR);
        $stmt->execute();
    }

    public function excluirAluno($id){
        $sql = "DELETE FROM $this->tabela WHERE id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }
}
