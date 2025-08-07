<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EVA - Espaço Virtual de Aprendizagem</title>
    <link rel="stylesheet" href="css/style.css">
	<link rel="stylesheet" href="css/form.css">
</head>
<body class="first">
    <div class="container-full">
        <header class="topo bg-warning bg-gradient">
			<img class="logo" src="../../public/img/logo.png" alt="logo-alcides">	
			<span class="titulo">EVA - Espaço Virtual de Aprendizagem</span>
        </header>
        <section class="main">
			<div class="login-container">
				<h2 class="login-title">PÁGINA DE LOGIN</h2>

				<form method="POST" action="../controller/usuarioController.php?action=logarUsuario">
					<div class="input-group mb-3">
						<span class="input-group-text custom-icon-span">
							<i class="fas fa-user"></i>
						</span>
						<input type="text" name="usuario" class="form-control custom-input" 
						placeholder="Usuário" aria-label="Usuário">
					</div>

					<div class="input-group mb-3">
						<span class="input-group-text custom-icon-span">
							<i class="fas fa-lock"></i>
						</span>
						<input type="password" name="pass" class="form-control custom-input"
						 placeholder="Senha" aria-label="Senha">
					</div>

					<button type="submit" class="btn btn-acessar w-100">ACESSAR</button>

					<div class="text-center mt-3">
						<a href="#" class="forgot-password-link">Esqueceu sua senha?</a>
					</div>
				</form>
			</div>
        </section>
        <footer class="fixed-bottom bg-dark bg-gradient text-center text-white pt-2 pb-2">
                <span class="foot">Copyright &copy 2025 - EVA - Espaço Virtual de Aprendizagem</foot>
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
