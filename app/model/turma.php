<?php
require_once '../config/connect.php';

class Turma extends Connect{
    private $logo;
    private $nomeTurma;
    private $disciplina;
    private $periodo;
    private $professor;
    private $tabela = 'turmas';


    public function __construct(){
        parent::__construct();
    }

    public function getLogo(){
        return $this->logo;
    }

    public function setLogo($logo): void{
        $this->logo = $logo;
    }

    public function getNomeTurma(){
        return $this->nomeTurma;
    }

    public function setNomeTurma($nomeTurma): void{
        $this->nomeTurma = $nomeTurma;
    }

    public function getDisciplina(){
        return $this->disciplina;
    }

    public function setDisciplina($disciplina): void{
        $this->disciplina = $disciplina;
    }

    public function getPeriodo(){
        return $this->periodo;
    }

    public function setPeriodo($periodo): void{
        $this->periodo = $periodo;
    }

    public function getProfessor(){
        return $this->periodo;
    }

    public function setProfessor($professor): void{
        $this->professor = $professor;
    }



    public function consultarTurmas(){
        $sql = "SELECT id_turma, logo, nome_turma, disciplina, periodo, professor FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarTurma($turma){
        $sql = "INSERT INTO $this->tabela (nome_turma, disciplina, periodo, professor) 
        VALUES (:nomeTurma, :disciplina, :periodo, :professor)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeTurma', $turma->getNomeTurma(), PDO::PARAM_STR);
        $stmt->bindParam(':disciplina', $turma->getDisciplina(), PDO::PARAM_INT);
        $stmt->bindParam(':periodo', $turma->getPeriodo(), PDO::PARAM_INT);
        $stmt->bindParam(':professor', $turma->getProfessor(), PDO::PARAM_INT);
        $stmt->execute();
    }

    public function editarTurma($Turma, $id){
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