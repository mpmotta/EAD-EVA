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
        <header class="fixed-top topo bg-warning bg-gradient">
			<img src="../../public/img/alcides-maya-tecnologia.png" alt="logo-alcides">	
			<span class="titulo">EVA - Espaço Virtual de Aprendizagem</span>
        </header>
        <section class="main">
        <div class="container border">
			<h2 class="text-center">Login do Aluno</h2>
				<form method="POST" action="">
					<table class='table table-bordered insert'>	
						<tr>
							<td>
								<label class="bold">MATRÍCULA:</label>
							</td>
							<td>		
								<input type="text" name="ra" 
								class="form-control" required />
							</td>
						</tr>
						
						<tr>
							<td>
								<label class="bold">SENHA:</label>
							</td>
							<td>	
								<input type="password" name="pass" 
								class="form-control" required />
							</td>
						</tr>
						
						<tr>	
							<td colspan="2">
								<input type="submit" name="submit" value="LOGAR"
								class="btn btn-primary"
								/>	
							</td>
						</tr>						
					</table>
				</form>				
		</div>

        </section>
        <footer class="fixed-bottom bg-primary bg-gradient text-center text-white pt-5 pb-4">
                <p>Copyright &copy 2024/2005 - EVA - Eva Virtual de Aprendizagem</p>
        </footer>
    </div>
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if(isset($_GET['erro']) && $_GET['erro'] == 'login'){
            echo  "<script src='js/erro-login.js'></script>";
        }

        if(isset($_GET['user']) && $_GET['user'] == 'deslogado'){
            echo  "<script src='js/deslogado.js'></script>";
        }
    ?>
</body>
</html>
