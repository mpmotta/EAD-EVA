<?php
require_once '../config/connect.php';

class Disciplina extends Connect{
    private $nomeDisciplina;
    private $preRequisito;
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

    public function getPreRequisito(){
        return $this->preRequisito;
    }

    public function setPreRequisito($preRequisito): void{
        $this->preRequisito = $preRequisito;
    }


    public function consultarDisciplinas(){
        $sql = "SELECT id_aluno, nome, avatar, ra, cpf, email, fone, curso, turno FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarDisciplina($disciplina){
        $sql = "INSERT INTO $this->tabela (nome_disciplina, pre_requisito) VALUES (:nomeDisciplina, :preRequisito)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeDisciplina', $disciplina->getNomeDisciplina(), PDO::PARAM_STR);
        $stmt->bindParam(':preRequisito', $disciplina->getPreRequisito(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarDisciplina($disciplina, $id){
        $sql = "UPDATE $this->tabela SET nome_disciplina = :nomeDisciplina, 
        pre_requisito = :preRequisito WHERE id_disciplina = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeDisciplina', $disciplina->getNomeDisciplina(), PDO::PARAM_STR);
        $stmt->bindParam(':preRequisito', $disciplina->getPreRequisito(), PDO::PARAM_INT);
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