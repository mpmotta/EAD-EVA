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
    <link rel="stylesheet" href="../css/style.css">
</head>
<body>
    <div class="container-full">
		<header class="topo bg-warning bg-gradient pt-3 ps-3 row">
				<div class="col-md-11">
					<img src="../../../public/img/alcides-maya-tecnologia.png" alt="logo-alcides">	
					<span class="titulo">EVA - Espaço Virtual de Aprendizagem</span>
				</div>
				<div class="col-md-1 text-center">
					<a href="../../controller/usuarioController.php?action=sair">
						SAIR<img src="../img/exit.png" class="icon"/>
					</a>
				</div>
			</header>
        <section class="main">
		<div class="bord2">		
			<section class="flex">
				<aside class="info">
					<img src="../img/avatar.png" alt="avatar do usuário" />
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
        <footer class="fixed-bottom bg-primary bg-gradient text-center text-white pt-3 pb-1">
                <p>Copyright &copy 2024/2005 - EVA - Eespa Virtual de Aprendizagem</p>
        </footer>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>