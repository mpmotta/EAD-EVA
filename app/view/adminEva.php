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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-full">
    <?php require_once 'headerAdmin.php'; ?>
        <section class="main bg-white flex">
            <nav class="mainMenu">
            <ol>
                <li>Introdução ao Desenvolvimento Web</li>
                <li>Fundamentos de Programação</li>
                <li>Design Responsivo com CSS</li>
                <li>JavaScript para Iniciantes</li>
                <li>Manipulação do DOM com JavaScript</li>
                <li>Introdução ao Bootstrap</li>
                <li>Conceitos Básicos de Banco de Dados</li>
                <li>Desenvolvimento de Aplicações com PHP</li>
                <li>Fundamentos de SEO</li>
                <li>Introdução ao Controle de Versão com Git</li>
            </ol>
            </nav>
            <article class="mainBox">
                        principal
            </article>
        </section>
        <?php require_once 'footer.php'; ?>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>