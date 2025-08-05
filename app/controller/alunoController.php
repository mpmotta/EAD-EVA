<?php
    require_once('../model/aluno.php');

    class alunoController {

        public function cadastrarAluno($alunoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {
                
                $aluno = new Aluno(); 
                $aluno->cadastrarAluno($alunoObj);
            
                header('Location: ../view/adminAlunos.php?cadastro=ok');
            } else {
                header("Location: ../view/adminAlunos.php?erro");
        
            }
        }


        public function consultarAlunos(){
            $aluno = new Aluno();
            $result = $aluno->consultarAlunos();
            return $result;
        }

        public function consultarAlunosAtivos(){
            $aluno = new Aluno();
            $result = $aluno->consultarAlunosAtivos();
            return $result;
        }


        public function consultarAlunosPorTurno($turno) {
                 $aluno = new Aluno();
                 $result = $aluno->consultarAlunosPorTurno($turno);
                 return $result;
        }

        public function consultarAlunoCpf($cpf){
            $aluno = new Aluno();
            $result = $aluno->consultarAlunoCpf($cpf);
            return $result;
        }


        public function consultarAlunoID($id){
            $id = $_GET['id'];
    
            $aluno = new Aluno();
            $result = $aluno->consultarAlunoID($id);
            return $result;
        }

        public function consultarAlunoRALL($RA){
            $aluno = new Aluno();
            $result = $aluno->consultarAlunoRALL($RA);
            return $result;
        }

        public function showAlunoRA($RA){
            $aluno = new Aluno();
            $result = $aluno->showAlunoRA($RA);
            return $result;
        }

        public function pesquisarAluno($txt){
            $aluno = new Aluno();
            $result = $aluno->pesquisarAluno($txt);
            return $result;
        }

        public function editarAluno($alunoObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $aluno = new Aluno(); 
                $aluno->editarAluno($alunoObj, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function alterarAvatar($id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                require 'uploadAvatar.php';
                $aluno = new Aluno(); 
                $aluno->alterarAvatar($avatar, $id);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function excluirAluno($id){
            $aluno = new Aluno(); 
            $aluno->excluirAluno($id);
        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarAluno') {
                $alunoObj = new aluno();
                $alunoObj->setNome($_POST['nome']);
                $alunoObj->setRa($_POST['ra']);
                $alunoObj->setCpf($_POST['cpf']);
                $alunoObj->setEmail($_POST['email']);
                $alunoObj->setFone($_POST['fone']);
                $alunoObj->setCurso($_POST['curso']);
                $alunoObj->setTurno($_POST['turno']);
                $this->cadastrarAluno ($alunoObj);
            }



            if (isset($_GET['action']) && $_GET['action'] == 'lote') {
                if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_FILES['lote']) && $_FILES['lote']['error'] === UPLOAD_ERR_OK) {
                    $file = $_FILES['lote']['tmp_name'];
                    $handle = fopen($file, 'r');
                    fgetcsv($handle, 1000, ";");
    
                    while (($data = fgetcsv($handle, 1000, ";")) !== FALSE) {
                        if (count($data) === 7) {
                            $alunoObj = new Aluno();
                            $alunoObj->setNome($data[0]);
                            $alunoObj->setRa($data[1]);
                            $alunoObj->setCpf($data[2]);
                            $alunoObj->setEmail($data[3]);
                            $alunoObj->setFone($data[4]);
                            $alunoObj->setCurso($data[5]);
                            $alunoObj->setTurno($data[6]);
    
                            try {
                                $this->cadastrarAluno($alunoObj);
                            } catch (PDOException $e) {
                                header('Location: ../view/adminAlunos.php?registro=duplicado');
                                exit;
                            }
                        }
                    }
    
                    fclose($handle);
                    header('Location: ../view/adminAlunos.php?cadastro=ok');
                    exit;
                }
            }


            if (isset($_GET['action']) && $_GET['action'] == 'editarAluno') {
                $id = $_GET['id'];
                $alunoObj = new Aluno();
                $alunoObj->setNome($_POST['nome']);
                $alunoObj->setCpf($_POST['cpf']);
                $alunoObj->setEmail($_POST['email']);
                $alunoObj->setFone($_POST['fone']);
                $alunoObj->setCurso($_POST['curso']);
                $alunoObj->setTurno($_POST['turno']);
                $this->editarAluno ($alunoObj, $id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'alterarAvatar') {
                $id = $_GET['id'];
                $this->alterarAvatar($id);
            }
            
            if (isset($_GET['action']) && $_GET['action'] == 'excluirAluno') {
                $id = $_GET['id'];
                $this->excluirAluno($id);
            }
        }
    }
    $alunoController = new alunoController();
    $alunoController->handleRequest();
?>