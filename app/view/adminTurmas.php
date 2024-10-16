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
            <h2> EVA - GERENCIAR TURMAS</h2>

            <table class="table table-bordered table stripped">
                <thead class="table-dark">
                    <tr>
                        <th>
                            #
                        </th>
                        <th>
                            TURMA
                        </th>
                        <th>
                            RA
                        </th>
                        <th>
                            NOME
                        </th>
                        <th>
                            DISCIPLINA
                        </th>
                        <th>
                            PROFESSOR
                        </th>
                        <th>
                            PERÍODO
                        </th>
                        <th>
                            CURSO
                        </th>
                        <th>
                            TURNO
                        </th>
                    </tr>
                </thead> 
                <tbody> 
            <?php
                      require_once '../controller/turmaController.php';
                      $turma = new Turma(); 
                      $consulta = $turma->consultarTurmas();
                        $i = 1;
                      foreach($consulta as $linha){
                          $nome = $linha['nome_turma'];
                          $ra = $linha['aluno_ra'];
                          $aluno = $linha['nome_aluno'];
                          $disciplina = $linha['nome'];
                          $professor = $linha['nome_prof'];
                          $periodo = $linha['periodo'];
                          $curso = $linha['nome_curso'];
                          $turno = $linha['turno'];
  
                          echo"
                          <tr>
                              <td class='text-center'>". $i++ ."</td> 
                              <td>$nome</td>
                              <td>$ra</td>
                              <td>$aluno</td>
                              <td>$disciplina</td>
                              <td>$professor</td>
                              <td>$periodo</td>
                              <td>$curso</td>
                              <td>$turno</td>";
                          
                  echo "</tr>";
                      }
                ?>
                </tbody>
            </table>
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

