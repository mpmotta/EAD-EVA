<?php
session_start();
if (isset($_SESSION['logado']) && $_SESSION['logado'] == true && $_SESSION['nivel'] == 9) {
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
                <h4 class="mb-3"> EVA - GERENCIAR TURMAS</h4>

                <button type="button" class="btn btn-sm btn-primary" data-bs-toggle="modal" data-bs-target="#matAluno">
                    MATRICULAR ALUNO
                </button>
                <button type="button" class="btn btn-sm btn-primary ms-4" data-bs-toggle="modal" data-bs-target="#matGrupo">
                    MATRICULAR GRUPO DE ALUNOS
                </button>

                <a href="indexAdmin.php" class="btn btn-sm btn-warning ms-4">VOLTAR</a>
                <br>&nbsp;
                <hr class="pt-1 pb-1">

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
                        foreach ($consulta as $linha) {
                            $nome = $linha['nome_turma'];
                            $ra = $linha['aluno_ra'];
                            $aluno = $linha['nome_aluno'];
                            $disciplina = $linha['nome'];
                            $professor = $linha['nome_prof'];
                            $periodo = $linha['periodo'];
                            $curso = $linha['nome_curso'];
                            $turno = $linha['turno'];

                            echo "
                          <tr>
                              <td class='text-center'>" . $i++ . "</td> 
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

        <div class="modal fade" id="matAluno" tabindex="-1" aria-labelledby="Matricular Aluno" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="cadAlunoLabel">Matricular Aluno</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Fechar"></button>
                    </div>
                    <div class="modal-body p-5 cadastra">
                        <form action="../controller/turmaController.php?action=matricularAluno" method="post">
                        
                            <input type="text" name="turma" class="form-control" placeholder="Turma" required>

                            <input type="text" name="ra" class="form-control" placeholder="Matrícula(RA)" required>
                            
                            <select name="disciplina" class="form-control mt-3" required>
                                <option selected disabled hidden value="">Disciplina</option>
                                <?php
                                require_once '../controller/disciplinaController.php';
                                $disciplina = new disciplina();
                                $dis = $disciplina->consultarDisciplinas();
                                foreach ($dis as $dis_linha) {
                                    $id_disciplina = $dis_linha['id_disciplina'];
                                    $nome_disciplina = $dis_linha['nome'];
                                    echo "<option value='$id_disciplina'>$nome_disciplina</option>";
                                }
                                ?>
                            </select>

                            <select name="professor" class="form-control mt-3" required>
                                <option selected disabled hidden value="">Professor</option>
                                <?php
                                require_once '../controller/professorController.php';
                                $professor = new Professor();
                                $prof = $professor->consultarProf();
                                foreach ($prof as $prof_linha) {
                                    $id_prof = $prof_linha['id_prof'];
                                    $nome_prof = $prof_linha['nome_prof'];
                                    echo "<option value='$id_prof'>$nome_prof</option>";
                                }
                                ?>
                            </select>
                            <select name="periodo" class="form-control mt-3" required>
                                <option selected disabled hidden value="">Período</option>
                                <?php
                                require_once '../controller/periodoController.php';
                                $periodo = new Periodo();
                                $per = $periodo->consultarPeriodos();
                                foreach ($per as $per_linha) {
                                    $id_periodo = $per_inha['id_periodo'];
                                    $nome_periodo = $per_linha['periodo'];
                                    echo "<option value='$id_periodo'>$nome_periodo</option>";
                                }
                                ?>
                            </select>
                            <select name="curso" class="form-control mt-3" required>
                                <option selected disabled hidden value="">Curso</option>
                                <?php
                                require_once '../controller/cursoController.php';
                                $curso = new Curso();
                                $curs = $curso->consultarCursos();
                                foreach ($curs as $curs_linha) {
                                    $id_curso = $curs_linha['id_curso'];
                                    $nome_curso = $curs_linha['nome_curso'];
                                    echo "<option value='$id_curso'>$nome_curso</option>";
                                }
                                ?>
                            </select>

                            <select name="turno" class="form-control mt-3" required>
                                <option selected disabled hidden value="">Turno</option>
                                <?php
                                require_once '../controller/turnoController.php';
                                $turno = new Turno();
                                $tur = $turno->consultarTurnos();
                                foreach ($tur as $tur_linha) {
                                    $id_turno = $tur_linha['id_turno'];
                                    $nome_turno = $tur_linha['turno'];
                                    echo "<option value='$id_turno'>$nome_turno</option>";
                                }
                                ?>
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

        <div class="modal fade" id="matGrupo" tabindex="-1" aria-labelledby="Cadastrar Lote" aria-hidden="true">
            <div class="modal-dialog modal-xl modal-dialog-scrollable">
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
        if (isset($_GET['matricula']) && $_GET['matricula'] == 'ok') {
            echo  "<script src='js/matriculado.js'></script>";
        }
        if (isset($_GET['matricula']) && $_GET['matricula'] == 'duplicado') {
            echo  "<script src='js/duplicado.js'></script>";
        }
        ?>
    </body>

    </html>
<?php
} else {
    header('Location: ../index.php');
}
?>