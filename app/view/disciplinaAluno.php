<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] == 1 ){ 
			$myra = $_SESSION['username'];
			$idAluno = $_GET['idAluno'];
			$idDisc = $_GET['idDisc'];

			if(isset($_GET['numAula'])){
				$numAula = $_GET['numAula'];
				$aulaAtiva = $_GET['numAula'];
			}else{
				$numAula = 1;
				$aulaAtiva = 1;
			}
						
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
        <section class="aluno">		
			<section class="content flex">
				<aside class="info2">
					<?php
						require_once '../controller/alunoController.php';
						$aluno = new Aluno(); 
						$consulta = $aluno->showAlunoRA($myra);

						foreach($consulta as $linha){
							$nome = $linha['nome_aluno'];
							$ra = $linha['ra'];
							$email = $linha['email'];
							$curso = $linha['nome_curso'];
							$curso = $linha['nome_curso'];
							$turno = $linha['turno'];
							$turma = $linha['nome_turma'];

					?>
					<h5><?=$nome ?></h5>
					<img src="img/avatar.png" alt="avatar do usuário" />
					<h6><?=$curso ?></h6>
					<ul>
						<li><span class="negrito">MATRÍCULA:</span> 
						<?=$ra ?></li>
						<li><span class="negrito">TURNO:</span> 
						<?=$turno ?></li>
						<li><span class="negrito">TURMA:</span> <?=$turma ?></li>
					</ul>
					<?php
						}
					?>
				</aside>
				<div class="aula">
					<?php
						require_once '../controller/conteudoController.php';
						$conteudo = new conteudo();
						$consulta = $conteudo->contarAulas($idDisc);
						
						echo'						
						<div class="numAulas pt-3">';
							foreach($consulta as $linha){
								$num = $linha['num_aula'];

								$classeCSS = 'aulas';
								if ($num == $aulaAtiva) {
									$classeCSS .= ' ativo';
								}
								echo "<p><a class='$classeCSS' href='disciplinaAluno.php?idAluno=$idAluno&idDisc=$idDisc&numAula=$num'>Aula $num</a></p>";
							}
						echo "</div>";	
						?>
					</div>	
				<div class="conteudos pt-3 ps-3 pb-5">
					<?php
						require_once '../controller/conteudoController.php';
						
						$conteudo = new conteudo();
						$consulta = $conteudo->consultarConteudoID($idDisc, $numAula);
						
						foreach($consulta as $linha){

								$conteudo = $linha['conteudo'];
								$tipo = $linha['tipo'];

								if($tipo == 'Titulo'){
									echo "<h3>$conteudo</h3>";
								}
								if($tipo == 'Video'){
									echo "<div>$conteudo</div>";
								}
				
								if($tipo == 'Texto'){
									echo "<div class='paragrafo'>$conteudo</div>";
								}
								
								if($tipo == 'Saiba'){
									echo "<div>$conteudo</div>";
								}



						}?>
				</div>

			</section>
        </section>
		<footer class="fixed-bottom bg-dark bg-gradient text-center text-white pt-2 pb-2">
        <span class="foot">Copyright &copy 2024/2025 - EVA - Espaço Virtual de Aprendizagem</span>
</footer>
    </div>
	<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
	<script>
		$(document).ready(function(){
    		$('.aulas').on('click', function(){
        		$('.aulas').removeClass('ativo');
        		$(this).addClass('ativo');
			});
		});
	</script>	
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>