<?php
    require_once('../model/usuarioModel.php');

    class usuarioController {

        public function cadastrarUsuario(Usuario $usuarioObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $usuario = new usuario(); 
                $usuario->cadastrarUsuario($usuarioObj);
                header('Location: ../view/admin/index.php?cadastro=ok');
            } else {
                header("Location: ../view/admin/index.php?erro");
            }
        }

        public function logar() {
            $usuario = new Usuario();

            $user = $_POST['usuario'];
            $senha = $_POST['senha'];
            $pass = hash('sha256', $senha);
            $usuario->logar($user, $pass);    
        }

        public function sair() {
            session_start();
            session_destroy();
            header('Location: ../view/index.php?user=deslogado');

        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarUsuario') {
                $usuarioObj = new usuario();
                $usuarioObj->setUsername($_POST['username']);
                $usuarioObj->setSenha($_POST['senha']);
                $usuarioObj->setNivel($_POST['nivel']);
                $usuarioObj->setEmail($_POST['email']);
                $this->cadastrarUsuario ($usuarioObj);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'logar') {
                $this->logar();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'sair') {
                $this->sair();
            }
        }
    }
    $UsuarioController = new UsuarioController();
    $UsuarioController->handleRequest();
?>
