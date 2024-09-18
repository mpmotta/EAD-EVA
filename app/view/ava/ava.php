<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['level'] >= 3 ){ 
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ambiente Virtual de Aprendizagem</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-full">
        <header class="fixed-top topo bg-warning bg-gradient pt-3 ps-3 row">
            <div class="col-md-11">Ambiente Virtual de Aprendizagem</div>
            <div class="col-md-1 text-center">
                <a href="sair.php">
                    SAIR<img src="../img/exit.png" class="icon"/>
                </a>
            </div>
        </header>
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
        <footer class="fixed-bottom bg-primary bg-gradient text-center text-white pt-5 pb-4">
            <p>Copyright &copy 2024 - Ambiente Virtual de Aprendizagem</p>
        </footer>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>