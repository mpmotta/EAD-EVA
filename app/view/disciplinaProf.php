<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] >= 1 ){ 
			$email = $_SESSION['email'];
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
        <section class="main">
			<section class="flex">
				<aside class="info">
					<?php
						require_once '../controller/professorController.php';
						$professor = new Professor();
						$consulta = $professor->consultarProfessorEmail($email); 

						foreach($consulta as $linha){
							$id = $linha['id_prof'];
							$nome = $linha['nome_prof'];
							$email = $linha['email'];
							$avatar = $linha['avatar'];

					?>
					<h5><?=$nome ?></h5>
					<img class="avatar" src="../../public/img/avatar/<?=$avatar ?>" alt="avatar do usuário" />
					<h6><?=$email ?></h6>
					<?php
						}
					?>
				</aside>
				<div class="disciplinas">
					<div class="m-3">
						
					</div>		
				</div>
			</section>
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