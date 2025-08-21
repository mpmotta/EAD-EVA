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
<body class="admin">
    <div class="container-full">
    <?php require_once 'headerAdmin.php'; ?>
        <section class="container bgadmin">
            <h5 class="text-center pt-3">PÁGINA ADMINISTRATIVA</h5>
            <article class="mainBox mt-2">
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

                    <a href="adminTurmasPer.php">
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
                    <br>
                    <a href="adminConteudos.php">
                        <div class="box">
                            CONTEÚDOS
                            <img src="../../public/icons/documents.png" alt="períodos">
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
        <?php require_once 'footer.php'; ?>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../view/index.php');
    }   
?>
