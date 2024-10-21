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

        public function matricularAluno($turmaObj) {
            
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $turma = new turma(); 
                $turma->matricularAluno($turmaObj);
                header('Location: ../view/adminTurmas.php?matricula=ok');
            } else {
                header("Location: ../view/adminTurmas.php?matricula=erro");
                
            }
        }


        public function matricularVAriosAlunos($turmaObj, $alunosRA) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                $turma = new turma();
                $turma->matricularVAriosAlunos($turmaObj, $alunosRA);
                header('Location: ../view/adminTurmas.php?matricula=ok');
            } else {
                header("Location: ../view/adminTurmas.php?matricula=erro");
            }
        }
       public function consultarTurmas(){
            $turma = new turma();
            $result = $turma->consultarTurmas();
            return $result;
        }

        public function turmaMaterias($ra){
            $turma = new turma();
            $result = $turma->turmaMaterias($ra);
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

            if (isset($_GET['action']) && $_GET['action'] == 'matricularAluno') {
                
                $turmaObj = new turma();
                $turmaObj->setNometurma($_POST['turma']);
                $turmaObj->setAluno_ra($_POST['ra']);
                $turmaObj->setDisciplina_id($_POST['disciplina']);
                $turmaObj->setProfessor_id($_POST['professor']);
                $turmaObj->setPeriodo_id($_POST['periodo']);
                $turmaObj->setCurso_id($_POST['curso']);
                $turmaObj->setTurno_id($_POST['turno']);
                $this->matricularAluno ($turmaObj);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'matricularVariosAlunos') {
                $turmaObj = new turma();
                $turmaObj->setNometurma($_POST['turma']);
                $turmaObj->setDisciplina_id($_POST['disciplina']);
                $turmaObj->setProfessor_id($_POST['professor']);
                $turmaObj->setPeriodo_id($_POST['periodo']);
                $turmaObj->setCurso_id($_POST['curso']);
                $turmaObj->setTurno_id($_POST['turno']);
            
                $alunosRA = $_POST['ras'];
            
                $this->matricularVariosAlunos($turmaObj, $alunosRA);
            
            }

            if (isset($_GET['action']) && $_GET['action'] == 'LoteCSV') {
               
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