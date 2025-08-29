<?php
require_once '../config/connect.php';

class Mensagem extends Connect{
    private $mensagem;
    private $tabela = 'mensagens';


    public function __construct(){
        parent::__construct();
    }

    public function getMensagem() {return $this->mensagem;}

	public function setMensagem( $mensagem): void {$this->mensagem = $mensagem;}

	

    public function consultarMensagens(){
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function enviarMensagem($MensagemObj){
        $sql = "INSERT INTO $this->tabela (mensagem) VALUES (:mensagem)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':turno', $MensagemObj->getTurno(), PDO::PARAM_STR);
        $stmt->execute();
    }


}