<?php
    require_once('../model/conteudo.php');

    class conteudoController {

        public function cadastrarConteudo($conteudoObj) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $conteudo = new conteudo(); 
                $conteudo->cadastrarConteudo($conteudoObj);
                header('Location: ../view/adminCont.php?cadastro=ok');
            } else {
                header("Location: ../view/adminCont.php?erro");
            }
        }


        public function consultarConteudos(){
            $conteudo = new conteudo();
            $result = $conteudo->consultarconteudos();
            return $result;
        }

        public function consultarConteudoID($id){
            $conteudo = new conteudo();
            $result = $conteudo->consultarConteudoID($id);
            return $result;
        }


        public function editarconteudo($conteudoObj, $id) {
            if ($_SERVER['REQUEST_METHOD'] === 'POST') {  
                $conteudo = new conteudo(); 
                $conteudo->editarconteudo($conteudoObj, $id);
                header('Location: ../view/adminDisc.php?alterado=ok');
            } else {
                header("Location: ../view/adminDisc.php?erro");
            }
        }

        public function excluirconteudo($id){
            $conteudo = new conteudo(); 
            $conteudo->excluirconteudo($id);
        }

        public function handleRequest() {
            if (isset($_GET['action']) && $_GET['action'] == 'cadastrarconteudo') {
                $conteudoObj = new conteudo();
                $conteudoObj->setDisciplina($_POST['nomeconteudo']);
                $conteudoObj->setConteudo($_POST['curso']);
                $conteudoObj->setNumAula($_POST['preRequisito']);
                if(!$_POST['preRequisito']){
                    $conteudoObj->setTipo("Nenhum");  
                }
                $this->cadastrarconteudo ($conteudoObj);
            }
            if (isset($_GET['action']) && $_GET['action'] == 'editarconteudo') {
                $id = $_GET['id'];
                $conteudoObj = new conteudo();
                $conteudoObj->setConteudo($_POST['nomeconteudo']);
                $conteudoObj->setTipo($_POST['curso']);
                $conteudoObj->setDisciplina($_POST['preRequisito']);
                $this->editarconteudo ($conteudoObj, $id);
            }

            if (isset($_GET['action']) && $_GET['action'] == 'excluirconteudo') {
                $id = $_GET['id'];
                $this->excluirconteudo($id);
            }
        }
    }
    $conteudoController = new conteudoController();
    $conteudoController->handleRequest();
?>