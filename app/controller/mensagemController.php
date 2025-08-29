<?php
    require_once('../model/mensagem.php');

    class mensagemController {

        public function enviarMensagem($mensagemObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $mensagem = new Mensagem(); 
                $mensagem->enviarMensagem($mensagemObj);
                header('Location: ../view/adminGer.php?cadastro=ok');
            } else {
                header("Location: ../view/adminGer.php?erro");
            }
        }


        public function consultarMensagens(){
            $mensagem = new Mensagem();
            $result = $mensagem->consultarMensagens();
            return $result;
        }


        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'enviarMensagem') {
                $mensagemObj = new Turno();
                $mensagemObj->setTurno($_POST['nome_turno']);
                $this->enviarMensagem ($mensagemObj);
            }

        }
    }
    $mensagemController = new mensagemController();
    $mensagemController->handleRequest();
?>