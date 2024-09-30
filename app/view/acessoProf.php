<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] >= 1 ){ 
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
	<h2 class="m-3"> EVA - PÁGINA DO PROFESSOR</h2>
        <section class="main">
		<div class="bord2">		
			<section class="flex">
				<aside class="info">
					<img src="img/avatar.png" alt="avatar do usuário" />
					<h4>Curso</h4>
					<ul>
						<li><span class="negrito">ALUNO:</span> Rihan da Massa</li>
						<li><span class="negrito">MATRÍCULA:</span> 771600367</li>
						<li><span class="negrito">TURNO:</span> Manhã</li>
						<li><span class="negrito">TURMA:</span> INF4M172</li>
					</ul>
				</aside>
				<div class="disciplinas">
					<h2>Disciplinas:</h2>
					<figure class="ucs">
								HTML
						<figcaption>
							<button class="btn btn-warning uc">ACESSAR</button>
						</figcaption>
					</figure>			
				</div>
			</section>
		</div>

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