<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] == 1 ){ 
			$myra = $_SESSION['username'];
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
			<section class="flex">
				<aside class="info">
					<?php
						require_once '../controller/alunoController.php';
						$aluno = new Aluno(); 
						$consulta = $aluno->PageAlunoRA($myra);

						foreach($consulta as $linha){
							$avatar = $linha['avatar'];
							$nome = $linha['nome_aluno'];
							$ra = $linha['ra'];;
							$email = $linha['email'];
							$curso = $linha['nome_curso'];
							$turma = $linha['nome_turma'];
							$turno = $linha['turno'];

					?>
					<h4><?=$nome ?></h4>
					<img src="../../public/img/avatar/<?=$avatar ?>" alt="avatar do usuário" />
					<h4><?=$curso ?></h4>
					<ul>
						<li><span class="negrito">MATRÍCULA:</span> 
						<?=$ra ?></li>
						<li><span class="negrito">TURNO:</span> 
						<?=$turno ?></li>
						<li><span class="negrito">TURMA:</span> 
						<?=$turma ?></li>
					</ul>
					<?php
						}
					?>
				</aside>
				<div class="disciplinas">
					<h4 class="m-3">Disciplinas:</h4>
					<div class="m-3">
					<?php
						require_once '../controller/turmaController.php';
						$turma = new Turma(); 
						$consulta = $turma->turmaMaterias($myra);
						foreach($consulta as $linha){
								$uc_nome = $linha['nome'];
								$uc_id = $linha['disciplina_id']; 
								$logo = $linha['logo'];

						echo "<figure class='ucs'>
									<div class='d_nome'>$uc_nome</div>
									<div class='d_logo'>
									<img src='../../public/img/logos/$logo'></div>
								<figcaption>
									<a href='conteudoUC.php?uc=$uc_id' class='btn btn-warning uc'>ACESSAR</a>
								</figcaption>
							</figure>";
						}
					?>	
					</div>		
				</div>
			</section>
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