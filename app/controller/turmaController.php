<?php
    require_once('../model/turma.php');

    class turmaController {

        public function cadastrarTurma($turmaObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $turma = new turma(); 
                $turma->cadastrarAlunos($turmaObj);
                header('Location: ../view/admin/index.php?cadastro=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }


        public function consultarTurmas(){
            $turma = new turma();
            $result = $turma->consultarTurmas();
            return $result;
        }


        public function editarTurma($turmaObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $turma = new turma(); 
                $turma->editarturma($turmaObj, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }


        public function excluirTurma($id){
            $turma = new turma(); 
            $turma->excluirturma($id);
        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarTurma') {
                $turmaObj = new turma();
                $turmaObj->setNometurma($_POST['nometurma']);
                $this->cadastrarturma ($turmaObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarTurma') {
                $id = $_GET['id'];
                $turmaObj = new turma();
                $turmaObj->setNometurma($_POST['nometurma']);
                $this->editarturma ($turmaObj, $id);
            }


            if (isset($_GET['action']) && $_GET['action'] == 'excluirTurma') {
                $id = $_GET['id'];
                $this->excluirturma($id);
            }
        }
    }
    $turmaController = new turmaController();
    $turmaController->handleRequest();
?>