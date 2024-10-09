<?php
require_once '../config/connect.php';

class Curso extends Connect{
    private $nomeCurso;
    private $quemEditou;
    private $tabela = 'cursos';


    public function __construct(){
        parent::__construct();
    }

    public function getNomeCurso() {return $this->nomeCurso;}

	public function getQuemEditou() {return $this->quemEditou;}

	public function setNomeCurso( $nomeCurso): void {$this->nomeCurso = $nomeCurso;}

	public function setQuemEditou( $quemEditou): void {$this->quemEditou = $quemEditou;}



    public function consultarCursos(){
        $sql = "SELECT id_curso, nome_curso, quem_editou
        FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarCurso($cursoObj){
        $sql = "INSERT INTO $this->tabela (nome_curso) VALUES (:nomeCurso)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeCurso', $cursoObj->getNomecurso(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarcurso($cursoObj, $id){
        $sql = "UPDATE $this->tabela SET nome_curso = :nomecurso, 
        quem_editou = :quemEditou WHERE id_curso = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomecurso', $cursoObj->getNomecurso(), PDO::PARAM_STR);
        $stmt->bindParam(':quemEditou', $cursoObj->getQuemEditou(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluircurso($id){
        $sql = "DELETE FROM $this->tabela WHERE id_curso = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}