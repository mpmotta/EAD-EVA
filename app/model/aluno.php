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


    public function consultarAlunos(){
        $sql = "SELECT a.id_aluno, a.nome_aluno, u.avatar, a.status_aluno, a.ra, a.cpf, a.email, a.fone, c.nome_curso, t.nome_turma, u.ultimo_login 
                FROM $this->tabela AS a 
                LEFT JOIN usuarios AS u ON a.ra = u.username
                LEFT JOIN turmas AS t ON a.ra = t.aluno_ra
                LEFT JOIN cursos AS c ON a.curso = c.id_curso
        ORDER BY a.curso, a.status_aluno, a.nome_aluno"; 
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarAlunosAtivos(){
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarAlunoID($id){
       $sql = "SELECT a.id_aluno, a.nome_aluno, u.avatar, a.status_aluno, a.ra, a.cpf, a.email, a.fone, c.nome_curso, t.nome_turma, u.ultimo_login 
                FROM $this->tabela AS a 
                LEFT JOIN usuarios AS u ON a.ra = u.username
                LEFT JOIN turmas AS t ON a.turma_id = t.id_turma
                LEFT JOIN cursos AS c ON a.curso = c.id_curso
                WHERE a.id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarAlunoCpf($cpf){
        $sql = "SELECT nome_aluno, status_aluno, avatar, ra, cpf, email, fone, curso
        FROM $this->tabela WHERE cpf = :CPF";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':cpf', $cpf, PDO::PARAM_STR);
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

        }
    }


    public function consultarAlunoRALL($ra){
        $sql = "SELECT a.nome_aluno, a.status_aluno, a.avatar, a.ra, a.cpf, a.email, a.fone, a.curso, c.nome_curso
        FROM $this->tabela as a
        LEFT JOIN cursos AS c ON a.curso = c.id_curso
        LEFT JOIN turmas AS t ON a.ra = t.aluno_ra
        WHERE ra = :ra";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function PageAlunoRA($ra){
        $sql = "SELECT a.nome_aluno, a.status_aluno, a.avatar, a.ra, a.cpf, 
        a.email, a.fone, a.curso, t.turno_id, c.nome_curso, t.nome_turma, tu.turno
        FROM $this->tabela as a
        LEFT JOIN cursos AS c ON a.curso = c.id_curso
        LEFT JOIN turmas AS t ON a.ra = t.aluno_ra
        LEFT JOIN turnos AS tu ON t.turno_id = tu.id_turno
        WHERE ra = :ra LIMIT 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }


    public function pesquisarAluno($txt){
        $sql = "SELECT nome_aluno, status_aluno, avatar, ra, cpf, email, fone, curso
        FROM $this->tabela WHERE nome like :txt";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindValue(':txt', "%" . $txt . "%", PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetch(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarAluno($alunoObj){
        $sql = "INSERT INTO $this->tabela (nome_aluno, ra, cpf, email, fone, curso) 
        VALUES (:nome, :ra, :cpf, :email, :fone, :curso)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $alunoObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $alunoObj->getRa(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $alunoObj->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $alunoObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $alunoObj->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $alunoObj->getCurso(), PDO::PARAM_STR);
        $stmt->execute();

    }

    public function editarAluno($alunoObj, $id){
        $sql = "UPDATE $this->tabela SET nome_aluno = :nome, ra = :ra, cpf = :cpf, email = :email 
        fone = :fone, curso = :curso
        WHERE id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $alunoObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $alunoObj->getRa(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $alunoObj->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $alunoObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $alunoObj->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $alunoObj->getCurso(), PDO::PARAM_STR);
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

    public function ativarAluno($id){
        $sql = "UPDATE $this->tabela SET status_aluno = 'ativo' 
        WHERE id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function desativarAluno($id){
        $sql = "UPDATE $this->tabela SET status_aluno = 'inativo' 
        WHERE id_aluno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editarAlunoCpf($alunoObj, $cpf){
        $sql = "UPDATE $this->tabela SET nome_aluno = :nome, ra = :ra, cpf = :cpf, email = :email 
        fone = :fone, curso = :curso
        WHERE cpf = :CPF";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nome', $alunoObj->getNome(), PDO::PARAM_STR);
        $stmt->bindParam(':ra', $alunoObj->getRa(), PDO::PARAM_STR);
        $stmt->bindParam(':cpf', $alunoObj->getCpf(), PDO::PARAM_STR);
        $stmt->bindParam(':email', $alunoObj->getEmail(), PDO::PARAM_STR);
        $stmt->bindParam(':fone', $alunoObj->getFone(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $alunoObj->getCurso(), PDO::PARAM_STR);
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
