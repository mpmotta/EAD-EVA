<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] == 9 ){ 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVA - Espaço Virtual de Aprendizagem</title>
    <link rel="stylesheet" href="css/style.css">
        <script>
            window.addEventListener('pageshow', function(event) {
                if (event.persisted) {
                    window.location.reload();
                }
            });
        </script>
</head>
<body>
    <div class="container-full">
    <?php require_once 'headerAdmin.php'; ?>
        <section class="container main bg-white mb-5">
            <h4 class="text-center my-3">GERENCIAMENTO DE CONTEÚDOS</h4>
            <a href="indexAdmin.php" class="btn btn-sm btn-warning">VOLTAR</a>
            <hr class="pt-1 pb-1">

                    <?php
                        require_once '../controller/disciplinaController.php';
                        $disciplina = new disciplinaController();
                        $consulta = $disciplina->consultarDisciplinas();
                        foreach ($consulta as $linha) {
                            $disciplina = $linha['nome'];
                            $disciplinaId = $linha['id_disciplina'];
                             echo "
                            <figure class='ucs disc'>
								<h6 class='py-3 disname'>$disciplina</h6>
							<figcaption>
								<a href='conteudoDisc.php?id=$disciplinaId' class='btn btn-warning uc'>ACESSAR</a>
							</figcaption>
						</figure>";
                        }
                    ?>
    
        </section>
        <?php require_once 'footer.php'; ?>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if(isset($_GET['erro']) && $_GET['erro'] == 'login'){
            echo  "<script src='js/erro-login.js'></script>";
        }

        if(isset($_GET['user']) && $_GET['user'] == 'deslogado'){
            echo  "<script src='js/deslogado.js'></script>";
        }
    ?>
</body>
</html>
<?php
    }else{
        header('Location: ../view/index.php');
    }   
?>