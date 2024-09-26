<?php
    require_once('../model/disciplina.php');

    class disciplinaController {

        public function cadastrardisciplina($disciplinaObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $disciplina = new disciplina(); 
                $disciplina->cadastrarDisciplina($disciplinaObj);
                header('Location: ../view/admin/index.php?cadastro=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }


        public function consultarDisciplinas(){
            $disciplina = new disciplina();
            $result = $disciplina->consultarDisciplinas();
            return $result;
        }


        public function editarDisciplina($disciplinaObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $disciplina = new disciplina(); 
                $disciplina->editardisciplina($disciplinaObj, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function alterarLogo() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                require 'uploadLogo.php';
                $aluno = new Aluno(); 
                $aluno->alterarLogo($avatar);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function excluirDisciplina($id){
            $disciplina = new disciplina(); 
            $disciplina->excluirDisciplina($id);
        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarDisciplina') {
                $disciplinaObj = new disciplina();
                $disciplinaObj->setNomeDisciplina($_POST['nomeDisciplina']);
                $disciplinaObj->setPreRequisito($_POST['preRequisito']);
                $this->cadastrarDisciplina ($disciplinaObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarDisciplina') {
                $id = $_GET['id'];
                $disciplinaObj = new disciplina();
                $disciplinaObj->setNomeDisciplina($_POST['nomeDisciplina']);
                $disciplinaObj->setPreRequisito($_POST['preRequisito']);
                $this->editardisciplina ($disciplinaObj, $id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'alterarLogo') {
                $id = $_GET['id'];
                $this->alterarLogo($id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'excluirDisciplina') {
                $id = $_GET['id'];
                $this->excluirDisciplina($id);
            }
        }
    }
    $disciplinaController = new disciplinaController();
    $disciplinaController->handleRequest();
?>