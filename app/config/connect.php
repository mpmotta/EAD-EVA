<?php
abstract class Connect {
    private $servidor = 'localhost';
    private $user = 'root';
    private $pass = '';
    private $banco = 'ava-ead';
    protected $conn;

    public function __construct() {
        $this->connect();
    }

    private function connect() {
        $this->conn = new PDO("mysql:host=$this->servidor;dbname=$this->banco", $this->user, $this->pass);
        $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    }
}
?>