<?php
    require_once('../model/usuario.php');
    require_once('../model/professor.php');
    require_once('../model/aluno.php');

    class UsuarioController {

        private function processarCadastro() {
            if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
                return;
            }

            $nivel = $_POST['nivel'];
            $usernameParaLogin = '';

            if ($nivel == 1) {
                $usernameParaLogin = $_POST['ra'];
            } elseif ($nivel == 2) {
                require_once('username.php');
                $usernameParaLogin = $username;
            } else {
                $usernameParaLogin = $_POST['email'];
            }

            $usuarioObj = new Usuario();
            $usuarioObj->setName($_POST['username']);
            $usuarioObj->setUsername($usernameParaLogin);
            $usuarioObj->setNivel($nivel);
            $usuarioObj->setEmail($_POST['email']);
            $usuarioObj->setFone($_POST['fone']);

            $idNovoUsuario = $usuarioObj->cadastrarUsuario();

            if (!$idNovoUsuario) {
                die("ERRO: Não foi possível cadastrar o usuário na tabela principal.");
            }

            if ($nivel == 1) {
                $alunoObj = new Aluno();
                $alunoObj->setNome($usuarioObj->getName());
                $alunoObj->setRa($usuarioObj->getUsername());
                $alunoObj->setEmail($usuarioObj->getEmail());
                $alunoObj->setFone($usuarioObj->getFone());
                $alunoObj->cadastrarAluno();
            } elseif ($nivel == 2) {
                $professorObj = new Professor();
                $professorObj->setNome($usuarioObj->getName());
                $professorObj->setEmail($usuarioObj->getEmail());
                $professorObj->setFone($usuarioObj->getFone());
                $professorObj->cadastrarProfessor();
            }

            header('Location: ../view/adminUsers.php?cadastro=ok');
            exit();
        }

        public function logarUsuario() {
            $usuario = new Usuario();
            $user = trim($_POST['usuario']);
            $senha = trim($_POST['senha']);
            $pass = hash('sha256', $senha);
            $usuario->logarUsuario($user, $pass);
        }

        public function sair() {
            session_start();
            session_destroy();
            header('Location: ../view/index.php?user=deslogado');
        }

        public function handleRequest() {
            $action = $_GET['action'] ?? null;

            switch ($action) {
                case 'cadastrarUsuario':
                    $this->processarCadastro();
                    break;
                case 'logarUsuario':
                    $this->logarUsuario();
                    break;
                case 'sair':
                    $this->sair();
                    break;
            }
        }
    }

    $UsuarioController = new UsuarioController();
    $UsuarioController->handleRequest();
?>