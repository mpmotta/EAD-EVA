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


        public function pesquisarAluno($txt){
            $aluno = new Aluno();
            $result = $aluno->pesquisarAluno($txt);
            return $result;
        }

        public function editarAluno($id){

        }

        public function excluirAluno($id){

        }

        public function alterarAvatar($id){

        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarAluno') {
                $alunoObj = new aluno();
                $alunoObj->setNome($_POST['nome']);
                $alunoObj->setRa($_POST['ra']);
                $alunoObj->setCpf($_POST['cpf']);
                $alunoObj->setEmail($_POST['email']);
                $alunoObj->setFone($_POST['fone']);
                $alunoObj->setCursoId($_POST['curso_id']);
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
                            $alunoObj->setCursoId($data[5]);
    
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
                $alunoObj->setCursoId($_POST['curso']);
                $this->editarAluno($alunoObj, $id);
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