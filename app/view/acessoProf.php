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
					<h5 class="mt-3"><i class="fas fa-envelope msg"></i>Mensagens</h5>
					<?php
						}
					?>
				</aside>
				<div class="disciplinas">
				<h4 class="m-3">ÁREA DO PROFESSOR</h4>
				<hr>
				<h5 class="m-3">UCS MINISTRADAS</h5>
					<div class="m-3">
						<?php
						require_once '../controller/disciplinaController.php';
						$disciplina = new disciplina();
						$consulta = $disciplina->disciplinasProf($id);

						foreach($consulta as $linha){
							$id = $linha['id_disciplina'];
							$disciplina = $linha['nome'];
							$turno = $linha['turno'];
							$turnoId = $linha['id_turno'];
							$thumb = $linha['thumb'];
						?>
						<figure class="ucs">
						<h5><?=$disciplina ?> <br/> <?=$turno ?></h5>
							<figcaption>
								<?php 
								echo "
								<img src='../../public/img/thumbs/$thumb'>
								<a href='disciplinaProf.php?id=$id&turno=$turnoId' class='btn btn-warning uc'>ACESSAR</a>";
								?>
							</figcaption>
						</figure>
						<?php
						}
					?>		
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
        header('Location: ../view/index.php');
    }   
?>