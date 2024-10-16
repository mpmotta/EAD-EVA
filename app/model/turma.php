<?php
require_once '../config/connect.php';

class Turma extends Connect{
    private $nomeTurma;
    private $aluno_ra;
    private $disciplina_id;
    private $periodo_id;
    private $professor_id;
    private $tabela = 'turmas';


    public function __construct(){
        parent::__construct();
    }

   public function getNomeTurma() {
    return $this->nomeTurma;
}

	public function getAlunoRa() {
        return $this->aluno_ra;
    }

	public function getDisciplinaId() {
        return $this->disciplina_id;
    }

	public function getPeriodoId() {
        return $this->periodo_id;
    }

	public function getProfessorId() {
        return $this->professor_id;
    }

	public function setNomeTurma( $nomeTurma): void {
        $this->nomeTurma = $nomeTurma;
    }

	public function setAlunoRa( $aluno_ra): void {
        $this->aluno_ra = $aluno_ra;
    }

	public function setDisciplinaId( $disciplina_id): void {
        $this->disciplina_id = $disciplina_id;
    }

	public function setPeriodoId( $periodo_id): void {
        $this->periodo_id = $periodo_id;
    }

	public function setProfessorId( $professor_id): void {
        $this->professor_id = $professor_id;
    }

    public function consulta(){
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarTurmas(){
        $sql = "SELECT t.nome_turma, t.aluno_ra, t.disciplina_id, t.periodo_id, t.professor_id, t.curso, d.nome, p.nome_prof, pe.periodo, a.nome_aluno, c.nome_curso, tu.turno
        FROM $this->tabela as t
        LEFT JOIN alunos as a ON t.aluno_ra = a.ra
        LEFT JOIN disciplinas as d ON t.disciplina_id = d.id_disciplina
        LEFT JOIN professores as p ON t.professor_id = p.id_prof
        LEFT JOIN cursos as c ON t.curso = c.id_curso
        LEFT JOIN turnos as tu ON t.turno_id = tu.id_turno
        LEFT JOIN periodos as pe ON t.periodo_id = pe.id_periodo";  
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarAlunos($turmaObj){
        $sql = "INSERT INTO $this->tabela (nome_turma, aluno_ra, disciplina_id, periodo_id, professor_id) 
        VALUES (:nomeTurma, :aluno_ra, :disciplina_id, :periodo_id, :professor_id)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeTurma', $turmaObj->getNomeTurma(), PDO::PARAM_STR);
        $stmt->bindParam(':disciplina', $turmaObj->getDisciplina(), PDO::PARAM_INT);
        $stmt->bindParam(':periodo', $turmaObj->getPeriodo(), PDO::PARAM_INT);
        $stmt->bindParam(':professor', $turmaObj->getProfessor(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editarTurma($turma, $id){
        $sql = "UPDATE $this->tabela SET nome_turma = :nomeTurma, 
        disciplina = :disciplina, periodo  = :periodo, professor = :professor
        WHERE id_turma = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeTurma', $turma->getNomeTurma(), PDO::PARAM_STR);
        $stmt->bindParam(':disciplina', $turma->getDisciplina(), PDO::PARAM_INT);
        $stmt->bindParam(':periodo', $turma->getPeriodo(), PDO::PARAM_INT);
        $stmt->bindParam(':professor', $turma->getProfessor(), PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function alterarLogo($logo, $id){
        $sql = "UPDATE $this->tabela SET logo = :logo 
        WHERE id_turma = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirTurma($id){
        $sql = "DELETE FROM $this->tabela WHERE id_turma = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}