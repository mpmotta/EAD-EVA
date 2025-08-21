<?php
require_once '../config/connect.php';

class Disciplina extends Connect{
    private $logo;
    private $nomeDisciplina;
    private $curso;
    private $tabela = 'disciplinas';


    public function __construct(){
        parent::__construct();
    }

    public function getNomeDisciplina(){
        return $this->nomeDisciplina;
    }

    public function setNomeDisciplina($nomeDisciplina): void{
        $this->nomeDisciplina = $nomeDisciplina;
    }

    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo): void{
        $this->logo = $logo;
    }

    public function getCurso(){
        return $this->curso;
    }

    public function setCurso($curso): void{
        $this->curso = $curso;
    }


    public function consultarDisciplinas(){
        $sql = "SELECT * FROM $this->tabela ORDER BY nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarDisciplinaPeriodo($idPeriodo){
        $sql = "SELECT d.id_disciplina, d.nome, d.thumb, t.nome_turma, t.id_turma, tu.turno 
        FROM $this->tabela as d
        LEFT JOIN turmas as t ON disciplina_id = id_disciplina
        LEFT JOIN turnos as tu ON turno_id = id_turno
        WHERE t.periodo_id = :idPeriodo";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':idPeriodo', $idPeriodo, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarDisciplinaAluno($ra){
        $sql = "SELECT d.id_disciplina, d.nome, d.thumb 
        FROM $this->tabela as d
        LEFT JOIN turmas as t ON disciplina_id = id_disciplina
        WHERE t.aluno_ra = :ra AND t.ativa = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':ra', $ra, PDO::PARAM_STR);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function disciplinasProf($id){
        $sql = "SELECT d.id_disciplina, d.nome, d.thumb, tu.id_turno, tu.turno 
        FROM $this->tabela as d
        LEFT JOIN turmas as t ON disciplina_id = id_disciplina
        LEFT JOIN turnos as tu ON turno_id = id_turno
        WHERE t.professor_id = :id AND t.ativa = 1";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarDisciplinasCursos(){
        $sql = "SELECT d.id_disciplina, d.nome, d.logo, d.curso,  c.nome_curso
        FROM $this->tabela as d
        LEFT JOIN cursos AS c ON d.curso = c.id_curso
        ORDER BY d.nome";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarDisciplina($disciplinaObj){
        $sql = "INSERT INTO $this->tabela (nome, curso) VALUES (:nomeDisciplina, :curso)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeDisciplina', $disciplinaObj->getNomeDisciplina(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', 
        $disciplinaObj->getCurso(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarDisciplina($disciplina, $id){
        $sql = "UPDATE $this->tabela SET nome_disciplina = :nomeDisciplina, curso = :curso,
        WHERE id_disciplina = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeDisciplina', $disciplina->getNomeDisciplina(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $disciplina->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function alterarLogo($logo, $id){
        $sql = "UPDATE $this->tabela SET logo = :logo 
        WHERE id_disciplina = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirDisciplina($id){
        $sql = "DELETE FROM $this->tabela WHERE id_disciplina = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}