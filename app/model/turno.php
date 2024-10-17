<?php
require_once '../config/connect.php';

class Turno extends Connect{
    private $turno;
    private $tabela = 'turnos';


    public function __construct(){
        parent::__construct();
    }

    public function getTurno() {return $this->turno;}

	public function setTurno( $turno): void {$this->turno = $turno;}

	

    public function consultarTurnos(){
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarTurno($TurnoObj){
        $sql = "INSERT INTO $this->tabela (turno) VALUES (:turno)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':turno', $TurnoObj->getTurno(), PDO::PARAM_STR);
        $stmt->execute();
    }


    public function excluirTurno($id){
        $sql = "DELETE FROM $this->tabela WHERE id_turno = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}