<?php
    require_once('../model/curso.php');

    class cursoController {

        public function cadastrarCurso($cursoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $curso = new curso(); 
                $curso->cadastrarcurso($cursoObj);
                header('Location: ../view/adminGer.php?cadastro=ok');
            } else {
                header("Location: ../view/adminGer.php?erro");
            }
        }


        public function consultarCursos(){
            $curso = new curso();
            $result = $curso->consultarCursos();
            return $result;
        }


        public function editarCurso($cursoObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $curso = new curso(); 
                $curso->editarcurso($cursoObj, $id);
                header('Location: ../view/adminGer.php?alterado=ok');
            } else {
                header("Location: ../view/adminGer.php?erro");
            }
        }


        public function excluircurso($id){
            $curso = new curso(); 
            $curso->excluircurso($id);
        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarCurso') {
                $cursoObj = new curso();
                $cursoObj->setNomecurso($_POST['nome_curso']);
                $this->cadastrarCurso ($cursoObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarCurso') {
                $id = $_GET['id'];
                $cursoObj = new curso();
                $cursoObj->setNomecurso($_POST['nome_curso']);
                $cursoObj->setQuemEditou($_POST['quem_editou']);
                $this->editarCurso ($cursoObj, $id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'excluirCurso') {
                $id = $_GET['id'];
                $this->excluircurso($id);
            }
        }
    }
    $cursoController = new cursoController();
    $cursoController->handleRequest();
?>