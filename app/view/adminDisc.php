<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] == 9 ){ 
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
            <h4 class="mb-3"> EVA - GERENCIAR DISCIPLINAS</h4>

            <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#cadDis">
                CADASTRAR DISCIPLINA
             </button>

            <a href="indexAdmin.php" class="btn btn-sm btn-warning ms-4">VOLTAR</a>
            <hr class="pt-2
            
            
              pb-1">

            <table class="table table-bordered table-striped">
                <thead class="table-dark">
                    <tr>
                        <th class='text-center'>
                            #
                        </th>
                        <th class='text-center'>
                            LOGO
                        </th>
                        <th>
                            DISCIPLINA
                        </th>
                        <th>
                            CURSO
                        </th>
                        <th class='text-center'>
                            EDITAR
                        </th>
                    </tr>
                </thead> 
                <tbody> 
                <?php
                      require_once '../controller/disciplinaController.php';
                      $disciplina = new Disciplina(); 
                      $consulta = $disciplina->consultarDisciplinasCursos();
                        $i = 1;
                      foreach($consulta as $linha){
                          $id = $linha['id_disciplina'];
                          $logo = $linha['logo'];
                          $nome = $linha['nome'];
                          $curso = $linha['nome_curso'];
                          echo"
                          <tr class='dis'>
                              <td class='text-center'>". $i++ ."</td> 
                              <td class='text-center log'>
                              <img src='../../public/img/logos/$logo'></td>
                              <td>$nome</td>
                              <td>$curso</td>
                              <td class='text-center log'>
                                <a href='editDis.php?id=$id&disc=$nome'>
                                <img src='../../public/img/logos/edit.png'></a
                              </td>
                              </tr>";
                      }
                ?>
                </tbody>   
            </table>
        
        </section>
        </section>
        <?php require_once 'footer.php'; ?>
    </div>




    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

<div class="modal fade" id="cadDis" tabindex="-1" aria-labelledby="Cadastrar Disciplina" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="cadProfLabel">Cadastrar disciplina</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
      </div>
      <div class="modal-body p-5 cadastra">
            <form action="../controller/disciplinaController.php?action=cadastrarDisciplina" method="post">
                <input type="text" name="nomeDisciplina" class="form-control" placeholder="Nome da Disciplina" required>
                <select name="curso" class="mb-3" required>
                <option selected disabled hidden value="">Curso</option>
                    <option value="Técnico em Informática">
                        Técnico em Informática
                    </option>
                    <option value="Técnico em ADM">
                        Técnico em ADM
                    </option>
                    <option value="Jovem Profissional">
                        Jovem Profissional
                    </option>
                    <option value="Pacote Office">
                         Pacote Office
                    </option>
                    <option value="Outros">
                         Outros
                    </option>
                </select>
                <input type="text" name="preRequisito" class="form-control" placeholder="Pré Requisito">
                <input type="submit" 
                class="btn btn-success"
                value="Cadastrar">
            </form>
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