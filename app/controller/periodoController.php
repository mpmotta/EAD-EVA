<?php
    require_once('../model/periodo.php');

    class periodoController {

        public function cadastrarPeriodo($periodoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $periodo = new periodo(); 
                $periodo->cadastrarPeriodo($periodoObj);
                header('Location: ../view/admin/index.php?cadastro=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }


        public function consultarPeriodos(){
            $periodo = new periodo();
            $result = $periodo->consultarPeriodos();
            return $result;
        }


        public function editarPeriodo($periodoObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $periodo = new periodo(); 
                $periodo->editarperiodo($periodoObj, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function excluirPeriodo($id){
            $periodo = new periodo(); 
            $periodo->excluirperiodo($id);
        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarPeriodo') {
                $periodoObj = new periodo();
                $periodoObj->setNomeperiodo($_POST['nomePeriodo']);
                $periodoObj->setDataInicio($_POST['dataInicio']);
                $periodoObj->setDataFinal($_POST['dataFinal']);
                $this->cadastrarPeriodo ($periodoObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarPeriodo') {
                $id = $_GET['id'];
                $periodoObj = new periodo();
                $periodoObj->setNomeperiodo($_POST['nomeperiodo']);
                $periodoObj->setDataInicio($_POST['dataInicio']);
                $periodoObj->setDataFinal($_POST['dataFinal']);
                $this->editarperiodo ($periodoObj, $id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'alterarAvatar') {
                $this->alterarAvatar();
            }

            if (isset($_GET['action']) && $_GET['action'] == 'excluirPeriodo') {
                $id = $_GET['id'];
                $this->excluirPeriodo($id);
            }
        }
    }
    $periodoController = new periodoController();
    $periodoController->handleRequest();
?>