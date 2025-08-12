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

        public function consultarProfessorEmail($email){
            $email = $_GET['email'];
            $professor = new Professor();
            $result = $professor->consultarProfessorEmail($email);            
            return $result;
        }

        public function cadastrarProfessor($professorObj) {

            $professorObj->cadastrarProfessor($professorObj);
            header('Location: ../view/adminUsers.php?cadastro=ok');      
        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarProfessor') {
                $professorObj = new professor();
                session_start();
                $professorObj->setNome($_SESSION['name']);
                $professorObj->setEmail($_SESSION['email']);
                $professorObj->setFone($_SESSION['fone']);
                $this->cadastrarProfessor ($professorObj);
            }

        }
    }
    $professorController = new professorController();
    $professorController->handleRequest();
?>