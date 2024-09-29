<?php
    require_once('../model/usuario.php');

    class UsuarioController {

        public function cadastrarUsuario(Usuario $usuarioObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $usuario = new usuario(); 
                $usuario->cadastrarUsuario($usuarioObj);
                header('Location: ../view/adminUsers.php?cadastro=ok');
            } else {
                header("Location: ../view/adminUsers.php?erro");
            }
        }

        public function logarUsuario() {
            $usuario = new Usuario();
            $user = $_POST['usuario'];
            $senha = $_POST['senha'];
            $pass = hash('sha256', $senha);
            $usuario->logarUsuario($user, $pass);
        }

        public function consultarUsuarios(){
            $usuario = new usuario();
            $result = $usuario->consultarUsuarios();            
            return $result;
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

            if (isset($_GET['action']) && $_GET['action'] == 'logarUsuario') {
                $this->logarUsuario();
            }
            if (isset($_GET['action']) && $_GET['action'] == 'sair') {
                $this->sair();
            }
        }
    }
    $UsuarioController = new UsuarioController();
    $UsuarioController->handleRequest();
?>
