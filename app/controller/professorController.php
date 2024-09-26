<?php
    require_once('../model/professor.php');

    class professorController {

        public function cadastrarprofessor(professor $professorObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $professor = new professor(); 
                $professor->cadastrarprofessor($professorObj);
                header('Location: ../view/admin/index.php?cadastro=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function consultarProfessores(){
            $professor = new professor();
            $result = $professor->consultarProfessores();
            return $result;
        }


        public function consultarProfessorCpf($cpf){
            $professor = new professor();
            $result = $professor->consultarprofessorCpf($cpf);
            return $result;
        }


        public function pesquisarProfessor($txt){
            $professor = new professor();
            $result = $professor->pesquisarProfessor($txt);
            return $result;
        }

        public function editarProfessor($professorObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $professor = new professor(); 
                $professor->editarProfessor($professorObj, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function alterarAvatar($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                require 'uploadAvatar.php';
                $professor = new professor(); 
                $professor->alterarAvatar($avatar, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function excluirProfessor($id){
            $professor = new Professor(); 
            $professor->excluirProfessor($id);
        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarProfessor') {
                $professorObj = new professor();
                $professorObj->setNome($_POST['nome']);
                $professorObj->setSenha($_POST['ra']);
                $professorObj->setCpf($_POST['cpf']);
                $professorObj->setEmail($_POST['email']);
                $professorObj->setFone($_POST['fone']);
                $professorObj->setCurso($_POST['curso']);
                $professorObj->setTurno($_POST['turno']);
                $this->cadastrarProfessor ($professorObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarProfessor') {
                $id = $_GET['id'];
                $professorObj = new professor();
                $professorObj->setNome($_POST['nome']);
                $professorObj->setCpf($_POST['cpf']);
                $professorObj->setEmail($_POST['email']);
                $professorObj->setFone($_POST['fone']);
                $this->editarprofessor ($professorObj, $id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'alterarAvatar') {
                $id = $_GET['id'];
                $this->alterarAvatar($id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'excluirProfessor') {
                $id = $_GET['id'];
                $this->excluirProfessor($id);
            }
        }
    }
    $professorController = new professorController();
    $professorController->handleRequest();
?>