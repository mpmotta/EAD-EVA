<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] >= 3 ){ 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVA - Espaço Virtual de Aprendizagem</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <div class="container-full">
    <?php require_once 'headerAdmin.php'; ?>
        <section class="container main bg-white">
            <h4> EVA - EDITAR DISCIPLINA</h4>
     
            <hr/>
        </section>
        <section class="container">
            <h4> EVA - EDITAR CONTEÚDO</h4>
            <?php
                $disc = $_GET['disc'];
                require_once '../controller/conteudoController.php';
                $conteudo = new Conteudo();
                $consulta = $conteudo->consultarConteudo($disc);

                foreach($consulta as $linha){
                    $conteudo = $linha['conteudo'];
                    if ($linha['tipo'] == 'Titulo'){
                        echo "<h4>$conteudo</h4>";
                    }else{
                         echo "<div>$conteudo</div>"; 
                    }
                
                }

            ?>
        </section>
        <div class="mt-5 mb-5"></div>
        <?php require_once 'footer.php'; ?>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>

