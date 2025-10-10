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
            <div class="modal-body p-5 cadastra">
                <form action='../controller/disciplinaController.php?action=editarDisciplina' method='post'>
                <?php
                    $idDisc = $_GET['id'];
                    require_once '../controller/disciplinaController.php';
                    $Disciplina = new Disciplina();
                    $consulta = $Disciplina->consultarDisciplina($idDisc);

                    foreach($consulta as $linha){
   
                    echo "<input type='hidden' name='id' value='" . $linha['id_disciplina'] . "'>
                    <input type='text' name='nome' class='form-control' value='" . $linha['nome'] . "' required>";
                                            
                    }

                ?>
                    <input type="submit" value="Alterar" class="btn btn-success mt-4">
                
                </form>
            </div>    
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

