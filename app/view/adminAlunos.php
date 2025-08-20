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
        <section class="container-fluid px-5 main bg-white">
            <h4 class="mb-3"> EVA - GERENCIAR ALUNOS</h4>

            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#cadAluno">
                CADASTRAR ALUNO
            </button>
            <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#cadLote">
                CADASTRAR LOTE DE ALUNOS
            </button>

            <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#localiza">
                LOCALIZAR ALUNO
            </button>

            <a href="indexAdmin.php" class="btn btn-sm btn-warning ms-4">VOLTAR</a>
            <br>&nbsp;
            <hr class="pt-1 pb-1">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            NOME
                        </th>
                        <th>
                            RA
                        </th>
                        <th>
                            STATUS
                        </th>
                        <th>
                            CPF
                        </th>
                        <th>
                            E-MAIL
                        </th>
                        <th>
                            FONE
                        </th>
                        <th>
                            CURSO
                        </th>
                        <th>
                            ÚLTIMO LOGIN
                        </th>
                    </tr>
                </thead> 
                <tbody> 
                <?php
                      require_once '../controller/alunoController.php';
                      $aluno = new Aluno(); 
                      $consulta = $aluno->consultarAlunos();
                        $i = 1;
                      foreach($consulta as $linha){
                          $nome = $linha['nome_aluno'];
                          $ra = $linha['ra'];
                          $status = $linha['status_aluno'];
                          $cpf = $linha['cpf'];
                          $fone = $linha['fone'];
                          $email = $linha['email'];
                          $curso = $linha['nome_curso'];
                          $ultimo_login = $linha['ultimo_login'];
                          $timestampAtual = time();
  
                          echo"
                          <tr>
                              <td class='text-center'>". $i++ ."</td> 
                              <td>$nome</td>
                              <td>$ra</td>";
                          if($status == 'inativo'){
                            echo "<td class='text-danger'>$status</td>";
                          }else{
                            echo "<td>$status</td>";
                          }    
                              

                          echo    
                              "<td>$cpf</td>
                              <td>$email</td>
                              <td>$fone</td>
                              <td>$curso</td>";
                          
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
        <?php require_once 'footer.php'; ?>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal fade" id="cadAluno" tabindex="-1" aria-labelledby="Cadastrar Aluno" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cadAlunoLabel">Cadastrar Aluno</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body p-5 cadastra">
            <form action="../controller/alunoController.php?action=cadastrarAluno" method="post">
                <input type="text" name="ra" class="form-control" placeholder="Matrícula(RA)" required>
                <input type="text" name="nome" class="form-control" placeholder="Nome Completo" required>
                <input type="text" name="cpf" class="form-control" placeholder="CPF" required>
                <input type="email" name="email" class="form-control" placeholder="E-mail" required>
                <input type="tel" name="fone" class="form-control" placeholder="Telefone" required>
                <select name="curso" class="form-control" required>
                <option selected disabled hidden value="">Curso</option>
                <?php
                  require_once '../controller/cursoController.php';
                  $curso = new Curso(); 
                  $cons = $curso->consultarCursos();
                    $i = 1;
                  foreach($cons as $linha){
                    $id_curso = $linha['id_curso'];
                    $nome_curso = $linha['nome_curso'];
                    echo "<option value='$id_curso'>$nome_curso</option>";
                  }
                ?>
                </select>
                <select name="turno" class="form-control mt-3" required>
                    <option selected disabled hidden value="">Turno</option>
                    <option value="manha">Manhã</option>
                    <option value="tarde">Tarde</option>
                    <option value="noite">Noite</option>
                </select>
                <input type="submit" value="Cadastrar" class="btn btn-success mt-4">
            </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="cadLote" tabindex="-1" aria-labelledby="Cadastrar Lote" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cadLoteLabel">Cadastrar Lote de Alunos</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body p-5">
        <form action="../controller/alunoController.php?action=lote" method="post" enctype="multipart/form-data">
          <label class="negrito">Envie um arquivo .csv </label>
          <input type="file" name="lote" class="form-control" accept=".csv" required>
          <input type="submit" value="Enviar" class="btn btn-success mt-4">
        </form>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Fechar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="localiza" tabindex="-1" aria-labelledby="Localizar Aluno" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="localizaLabel">Localizar Aluno</h1>
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
        if(isset($_GET['registro']) && $_GET['registro'] == 'duplicado'){
          echo  "<script src='js/duplicado.js'></script>";
      }
    ?>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>