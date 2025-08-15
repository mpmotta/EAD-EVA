<?php
require_once '../config/connect.php';

class Conteudo extends Connect{
    private $disciplina;
    private $numAula;
    private $conteudo;
    private $tipo;
    private $quem;
    private $tabela = 'conteudos';


    public function __construct(){
        parent::__construct();
    }

    public function getDisciplina() {
        return $this->disciplina;
    }

	public function getNumAula() {
        return $this->numAula;
    }

	public function getConteudo() {
        return $this->conteudo;
    }

	public function getTipo() {
        return $this->tipo;
    }

	public function getQuem() {
        return $this->quem;
    }

	public function setDisciplina( $disciplina): void {
        $this->disciplina = $disciplina;
    }

	public function setNumAula( $numAula): void {
        $this->numAula = $numAula;
    }

	public function setConteudo( $conteudo): void {
        $this->conteudo = $conteudo;
    }

	public function setTipo( $tipo): void {
        $this->tipo = $tipo;
    }

	public function setQuem( $quem): void {
        $this->quem = $quem;
    }

	 

    public function consultarConteudos(){
        $sql = "SELECT id_conteudo, disciplina, num_aula, conteudo, tipo, quem_editou, data_editado
        FROM $this->tabela ORDER BY num_aula, data_editado";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarConteudo($id){
        $sql = "SELECT num_aula, conteudo, tipo, quem_editou, data_editado
        FROM $this->tabela 
        WHERE disciplina_id = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function cadastrarconteudo($conteudoObj){
        $sql = "INSERT INTO $this->tabela (nome, curso, pre_requisito) VALUES (:nomeconteudo, :curso,  :preRequisito)";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeconteudo', $conteudoObj->getNomeconteudo(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', 
        $conteudoObj->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':preRequisito',$conteudoObj->getPreRequisito(), PDO::PARAM_STR);
        $stmt->execute();
    }

    public function editarconteudo($conteudo, $id){
        $sql = "UPDATE $this->tabela SET nome_conteudo = :nomeconteudo, curso = :curso,
        pre_requisito = :preRequisito WHERE id_conteudo = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeconteudo', $conteudo->getNomeconteudo(), PDO::PARAM_STR);
        $stmt->bindParam(':curso', $conteudo->getCurso(), PDO::PARAM_STR);
        $stmt->bindParam(':preRequisito', $conteudo->getPreRequisito(), PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function alterarLogo($logo, $id){
        $sql = "UPDATE $this->tabela SET logo = :logo 
        WHERE id_conteudo = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirconteudo($id){
        $sql = "DELETE FROM $this->tabela WHERE id_conteudo = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}