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
</head>
<body>
    <div class="container-full">
    <header class="topo bg-warning bg-gradient pt-2 ps-3 flex">
            <div class="left">
                <img src="../../public/img/alcides-maya-tecnologia.png" alt="logo-alcides">	
			    <span class="titulo">EVA - Espaço Virtual de Aprendizagem</span>
            </div>
            <div class="right text-center">
                <a href="../controller/usuarioController.php?action=sair">
                    SAIR<img src="img/exit.png" class="icon"/>
                </a>
            </div>
        </header>
        <section class="container main bg-white">
            <h2> EVA - PÁGINA ADMINISTRATIVA</h2>
            <article class="mainBox mt-5">
                    <a href="adminAlunos.php">
                        <div class="box">
                            ALUNOS
                            <img src="../../public/icons/student.png" alt="alunos">
                        </div>
                    </a>

                    <a href="adminProfes.php">
                        <div class="box">
                            PROFES
                            <img src="../../public/icons/teacher.png" alt="professores">
                        </div>
                    </a>

                    <a href="adminUsers.php">
                        <div class="box">
                            USUÁRIOS
                            <img src="../../public/icons/user.png" alt="usuarios">
                        </div>
                    </a>

                    <a href="adminDisc.php">
                        <div class="box">
                            DISCIPLINAS
                            <img src="../../public/icons/disc.png" alt="disciplinas">
                        </div>
                    </a>

                    <a href="adminTurmas.php">
                        <div class="box">
                            TURMAS
                            <img src="../../public/icons/class.png" alt="turmas">
                        </div>
                    </a>

                    <a href="adminPeriodos.php">
                        <div class="box">
                            PERÍODOS
                            <img src="../../public/icons/calendar.png" alt="períodos">
                        </div>
                    </a>

                    <a href="adminGer.php">
                        <div class="box">
                            ADMIN
                            <img src="../../public/icons/admin.png" alt="admin">
                        </div>
                    </a>
            </article>
        </section>
        <footer class="fixed-bottom bg-primary bg-gradient text-center text-white pt-3 pb-1">
                <p>Copyright &copy 2024/2025 - EVA - Espaço Virtual de Aprendizagem</p>
        </footer>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>
