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
            <h4> EVA - EDITAR PROFESSOR</h4>
     
            <hr/>
        </section>
        <section class="container bg-white">
            <?php
                $id = $_GET['id'];

                require_once '../controller/professorController.php';
                $prof = new ProfessorController();
                $consulta = $prof->consultarProfessorID($id);

                foreach($consulta as $linha){
                    $avatar = $linha['avatar'];
                    $ultimo_login = $linha['ultimo_login'];
                    $timestampAtual = time();

                    echo "
                         <table class='table table-bordered table-striped tabela-user' style='width: 800px;'>
                         <tbody>
                             <tr>
                                 <td rowspan='4' class='text-center' style='width: 250px;'>
                                     <img src='../../public/img/avatar/$avatar' alt='Avatar' class='img-fluid rounded-circle' style='width: 90%;'>
                                 </td>
                                 <th>NOME:</th>
                                 <td>" . $linha['nome_prof'] . "</td>
                             </tr>
                             <tr>
                                 <th>Fone:</th>
                                 <td>" . $linha['fone'] . "</td>
                             </tr>
                             <tr>
                                 <th>E-mail:</th>
                                 <td>" . $linha['email'] . "</td>
                             </tr>
                             <tr>
                                 <th>Último Acesso:</th>";
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
                             
                             echo "</tr>
                         </tbody>
                     </table>";
                }

            ?>
        </section>
        <div class="mt-5 mb-5"></div>
        <?php require_once 'footer.php'; ?>
    </div>
</body>
</html>
<?php
    }else{
        header('Location: ../index.php');
    }   
?>

