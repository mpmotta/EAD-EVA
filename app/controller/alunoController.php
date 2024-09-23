<?php
    require_once('../model/alunoModel.php');

    class alunoController {

        public function cadastrarAluno(Aluno $alunoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $aluno = new Aluno(); 
                $aluno->cadastrarAluno($alunoObj);
                header('Location: ../view/admin/index.php?cadastro=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
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
                 
                 /*
                 isso vai no view
                if (!empty($result)) {
                    foreach ($result as $aluno) {
                        echo "Nome: " . $aluno['nome'] . "<br>";
                        echo "RA: " . $aluno['ra'] . "<br>";
                        
                    }
                } else {
                    echo "Nenhum aluno encontrado para o turno especificado.";
                }
                */
        }

        public function consultarAlunoCpf($cpf){
            $aluno = new Aluno();
            $result = $aluno->consultarAlunoCpf($cpf);
            return $result;
        }


        public function consultarAlunoRA($RA){
            $aluno = new Aluno();
            $result = $aluno->consultarAlunoRA($RA);
            return $result;
        }

        public function editarAluno(Aluno $alunoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $aluno = new Aluno(); 
                $aluno->editarAluno($alunoObj);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function alterarAvatar() {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                require 'upload.php';
                $aluno = new Aluno(); 
                $aluno->alterarAvatar($avatar);
                header('Location: ../view/admin/index.php?alterado=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarAluno') {
                $alunoObj = new aluno();
                $alunoObj->setNome($_POST['nome']);
                $alunoObj->setSenha($_POST['ra']);
                $alunoObj->setCpf($_POST['cpf']);
                $alunoObj->setEmail($_POST['email']);
                $alunoObj->setFone($_POST['fone']);
                $alunoObj->setCurso($_POST['curso']);
                $alunoObj->setTurno($_POST['turno']);
                $this->cadastrarAluno ($alunoObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarAluno') {
                $alunoObj = new aluno();
                $alunoObj->setNome($_POST['nome']);
                $alunoObj->setSenha($_POST['ra']);
                $alunoObj->setCpf($_POST['cpf']);
                $alunoObj->setEmail($_POST['email']);
                $alunoObj->setFone($_POST['fone']);
                $alunoObj->setCurso($_POST['curso']);
                $alunoObj->setTurno($_POST['turno']);
                $this->editarAluno ($alunoObj);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'alterarAvatar') {
                $this->alterarAvatar();
            }
        }
    }
    $alunoController = new alunoController();
    $alunoController->handleRequest();
?>