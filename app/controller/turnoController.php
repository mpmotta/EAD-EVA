<?php
    require_once('../model/turno.php');

    class turnoController {

        public function cadastrarTurno($turnoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $turno = new Turno(); 
                $turno->cadastrarTurno($turnoObj);
                header('Location: ../view/adminGer.php?cadastro=ok');
            } else {
                header("Location: ../view/adminGer.php?erro");
            }
        }


        public function consultarTurnos(){
            $turno = new Turno();
            $result = $turno->consultarTurnos();
            return $result;
        }


        public function excluirTurno($id){
            $turno = new turno(); 
            $turno->excluirturno($id);
        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarTurno') {
                $turnoObj = new Turno();
                $turnoObj->setTurno($_POST['nome_turno']);
                $this->cadastrarturno ($turnoObj);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'excluirTurno') {
                $id = $_GET['id'];
                $this->excluirTurno($id);
            }
        }
    }
    $turnoController = new turnoController();
    $turnoController->handleRequest();
?>