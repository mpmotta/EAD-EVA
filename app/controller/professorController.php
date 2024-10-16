<?php
    require_once('../model/professor.php');

    class ProfessorController {

        public function consultarProfessores(){
            $professor = new Professor();
            $result = $professor->consultarProfessores();            
            return $result;
        }

        public function consultarProfessorID($id){
            $id = $_GET['id'];
            $professor = new Professor();
            $result = $professor->consultarProfessorID($id);            
            return $result;
        }

        public function cadastrarProfessor($professorObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $professor = new professor(); 
                $professor->cadastrarProfessor($professorObj);
                header('Location: ../view/adminProfes.php?cadastro=ok');
            } else {
                header("Location: ../view/adminProfes.php?erro");
            }
                
        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarProfessor') {
                $professorObj = new professor();
                $professorObj->setNome($_POST['nome']);
                $professorObj->setEmail($_POST['email']);
                $professorObj->setFone($_POST['fone']);
                $this->cadastrarProfessor ($professorObj);
            }

        }
    }
    $professorController = new professorController();
    $professorController->handleRequest();
?>