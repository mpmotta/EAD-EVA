<?php
require_once '../config/connect.php';

class Periodo extends Connect{
    private $nomePeriodo;
    private $dataInicio;
    private $dataFinal;
    private $tabela = 'periodos';


    public function __construct(){
        parent::__construct();
    }

    public function getNomePeriodo(){
        return $this->nomePeriodo;
    }

    public function setNomePeriodo($nomePeriodo): void{
        $this->nomePeriodo = $nomePeriodo;
    }

    public function getDataInicio(){
        return $this->dataInicio;
    }

    public function setDataInicio($dataInicio): void{
        $this->dataInicio = $dataInicio;
    }

    public function getDataFinal(){
        return $this->dataFinal;
    }

    public function setDataFinal($dataFinal): void{
        $this->dataFinal = $dataFinal;
    }


    public function consultarPeriodos(){
        $sql = "SELECT id_periodo, nome_periodo, data_inicio, data_final FROM $this->tabela";       
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarPeriodo($periodo){
        $sql = "INSERT INTO $this->tabela (nome_Periodo, data_inicio, data_final) 
        VALUES (:nomePeriodo, :dataInicio, :dataFinal)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomePeriodo', $periodo->getNomePeriodo(), PDO::PARAM_STR);
        $stmt->bindParam(':dataInicio', $periodo->getDataInicio(), PDO::PARAM_STR);
        $stmt->bindParam(':dataFinal', $periodo->getDataFinal(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarPeriodo($periodo, $id){
        $sql = "UPDATE $this->tabela SET nome_Periodo = :nomePeriodo, 
        data_inicio = :dataInicio, data_final = :dataFinal WHERE id_Periodo = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomePeriodo', $periodo->getNomePeriodo(), PDO::PARAM_STR);
        $stmt->bindParam(':dataInicio', $periodo->getDataInicio(), PDO::PARAM_STR);
        $stmt->bindParam(':dataFinal', $periodo->getDataFinal(), PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirPeriodo($id){
        $sql = "DELETE FROM $this->tabela WHERE id_periodo = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}