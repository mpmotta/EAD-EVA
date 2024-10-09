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
            <h2 class="mb-5"> EVA - GERENCIAR PROFESSORES</h2>

            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#cadProf">
                CADASTRAR PROFESSOR
             </button>

            <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#localiza">
                LOCALIZAR PROFESSOR
            </button>

            <a href="indexAdmin.php" class="btn btn-sm btn-warning ms-4">VOLTAR</a>
            <br>&nbsp;
            <hr class="pt-2 pb-2">

            <table class="table table-bordered table stripped">
                <thead class="table-dark">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            PROFESSOR
                        </th>
                        <th>
                            E-MAIL
                        </th>
                        <th>
                            FONE
                        </th>
                        <th>
                            ÚLTIMO LOGIN
                        </th>
                    </tr>
                </thead> 
                <tbody> 
                <?php
                      require_once '../controller/professorController.php';
                      $professor = new professor(); 
                      $consulta = $professor->consultarProfessores();
                        $i = 1;
                      foreach($consulta as $linha){
                          $nome = $linha['nome_prof'];
                          $fone = $linha['fone'];
                          $email = $linha['email'];
                          $ultimo_login = $linha['ultimo_login'];
                          $timestampAtual = time();
                          echo"
                          <tr>
                              <td class='text-center'>". $i++ ."</td> 
                              <td>$nome</td>
                              <td>$fone</td>
                              <td>$email</td>";
                                
                                  $dataHoraUltimoLogin = $ultimo_login;
                                      if (empty($dataHoraUltimoLogin)) {
                                          echo "<td>Nunca acessou</td>";
                                      } else {
                                          $timestampLogin = strtotime($dataHoraUltimoLogin); ;
                                          $diferenca = $timestampAtual - $timestampLogin; ;

                                          if ($diferenca < 60) {
                                              echo "<td>Agora</td>";
                                          } elseif ($diferenca < 3600) {
                                              $minutos = floor($diferenca / 60);
                                              echo "<td>Há $minutos minutos</td>";
                                          } elseif ($diferenca < 86400) {
                                              $horas = floor($diferenca / 3600);
                                              echo "<td>Há $horas horas<br></td>";
                                          } else {
                                              $dias = floor($diferenca / 86400);
                                              echo "<td>Há $dias dias</td>"; 
                                          }
                                      }
                          echo "</tr>";
                      }
                ?>
                </tbody>   
            </table>
        
        </section>
        </section>
        <?php require_once 'footer.php'; ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal fade" id="cadProf" tabindex="-1" aria-labelledby="Cadastrar Professor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cadProfLabel">Cadastrar Professor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body p-5 cadastra">
            <form action="../controller/professorController.php?action=cadastrarProfessor" method="post">
                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                <input type="tel" name="fone" class="form-control" placeholder="Telefone" required>
                <input type="submit" value="Cadastrar" class="btn btn-success mt-4">
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="localiza" tabindex="-1" aria-labelledby="Localizar Professor" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="localizaLabel">Localizar Professor</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body">
        aqui vai o form
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <?php
        if(isset($_GET['cadastro']) && $_GET['cadastro'] == 'ok'){
            echo  "<script src='js/cadastrado.js'></script>";
        }
    ?>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>