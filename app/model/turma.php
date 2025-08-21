<?php
require_once '../config/connect.php';

class Turma extends Connect{
    private $nomeTurma;
    private $aluno_ra;
    private $disciplina_id;
    private $periodo_id;
    private $professor_id;
    private $curso_id;
    private $turno_id;
    private $tabela = 'turmas';


    public function __construct(){
        parent::__construct();
    }

	public function getNomeTurma(){
		return $this->nomeTurma;
	}

	public function setNomeTurma($nomeTurma){
		$this->nomeTurma = $nomeTurma;
	}

	public function getAluno_ra(){
		return $this->aluno_ra;
	}

	public function setAluno_ra($aluno_ra){
		$this->aluno_ra = $aluno_ra;
	}

	public function getDisciplina_id(){
		return $this->disciplina_id;
	}

	public function setDisciplina_id($disciplina_id){
		$this->disciplina_id = $disciplina_id;
	}

	public function getPeriodo_id(){
		return $this->periodo_id;
	}

	public function setPeriodo_id($periodo_id){
		$this->periodo_id = $periodo_id;
	}

	public function getProfessor_id(){
		return $this->professor_id;
	}

	public function setProfessor_id($professor_id){
		$this->professor_id = $professor_id;
	}

	public function getCurso_id(){
		return $this->curso_id;
	}

	public function setCurso_id($curso_id){
		$this->curso_id = $curso_id;
	}

	public function getTurno_id(){
		return $this->turno_id;
	}

	public function setTurno_id($turno_id){
		$this->turno_id = $turno_id;
	}

    public function consulta(){
        $sql = "SELECT * FROM $this->tabela";
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function consultarTurmas(){
        $sql = "SELECT t.nome_turma, t.aluno_ra, t.disciplina_id, t.periodo_id, t.professor_id, t.curso_id, d.nome, p.nome_prof, pe.periodo, a.nome_aluno, c.nome_curso, tu.turno
        FROM $this->tabela as t
        LEFT JOIN alunos as a ON t.aluno_ra = a.ra
        LEFT JOIN disciplinas as d ON t.disciplina_id = d.id_disciplina
        LEFT JOIN professores as p ON t.professor_id = p.id_prof
        LEFT JOIN cursos as c ON t.curso_id = c.id_curso
        LEFT JOIN turnos as tu ON t.turno_id = tu.id_turno
        LEFT JOIN periodos as pe ON t.periodo_id = pe.id_periodo";  
        $stmt = $this->conn->prepare($sql);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

        public function consultarTurma($id_disciplina, $id_periodo){
        $sql = "SELECT t.nome_turma, t.aluno_ra, t.disciplina_id, t.periodo_id, t.professor_id, t.curso_id, d.nome, p.nome_prof, pe.periodo, a.nome_aluno, c.nome_curso, tu.turno
        FROM $this->tabela as t
        LEFT JOIN alunos as a ON t.aluno_ra = a.ra
        LEFT JOIN disciplinas as d ON t.disciplina_id = d.id_disciplina
        LEFT JOIN professores as p ON t.professor_id = p.id_prof
        LEFT JOIN cursos as c ON t.curso_id = c.id_curso
        LEFT JOIN turnos as tu ON t.turno_id = tu.id_turno
        LEFT JOIN periodos as pe ON t.periodo_id = pe.id_periodo
        WHERE id_disciplina = :id_disciplina AND id_periodo = :id_periodo";  
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id_disciplina', $id_disciplina, PDO::PARAM_INT);
        $stmt->bindParam(':id_periodo', $id_periodo, PDO::PARAM_INT);
        $stmt->execute();
        $result = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $result;
    }

    public function matricularAluno($turmaObj) {
        $nomeTurma = $turmaObj->getNomeTurma();
        $aluno_ra = $turmaObj->getAluno_ra();
        $disciplina_id = $turmaObj->getDisciplina_id();
        $periodo_id = $turmaObj->getPeriodo_id();
    
        $checkSql = "SELECT COUNT(*) FROM $this->tabela 
                     WHERE nome_turma = :nomeTurma 
                     AND aluno_ra = :aluno_ra 
                     AND disciplina_id = :disciplina_id 
                     AND periodo_id = :periodo_id";
        
        $checkStmt = $this->conn->prepare($checkSql);
        $checkStmt->bindParam(':nomeTurma', $nomeTurma, PDO::PARAM_STR);
        $checkStmt->bindParam(':aluno_ra', $aluno_ra, PDO::PARAM_STR);
        $checkStmt->bindParam(':disciplina_id', $disciplina_id, PDO::PARAM_INT);
        $checkStmt->bindParam(':periodo_id', $periodo_id, PDO::PARAM_INT);
        $checkStmt->execute();
    
        if ($checkStmt->fetchColumn() > 0) {
            header('Location: ../view/adminTurmas.php?matricula=duplicado');
            exit();
        }
    
        $sql = "INSERT INTO $this->tabela (nome_turma, aluno_ra, disciplina_id, professor_id, periodo_id, curso_id, turno_id) 
                VALUES (:nomeTurma, :aluno_ra, :disciplina_id, :professor_id, :periodo_id, :curso_id, :turno_id)";
        
        $stmt = $this->conn->prepare($sql);
    
        $professor_id = $turmaObj->getProfessor_id();
        $curso_id = $turmaObj->getCurso_id();
        $turno_id = $turmaObj->getTurno_id();
    
        $stmt->bindParam(':nomeTurma', $nomeTurma, PDO::PARAM_STR);
        $stmt->bindParam(':aluno_ra', $aluno_ra, PDO::PARAM_STR);
        $stmt->bindParam(':disciplina_id', $disciplina_id, PDO::PARAM_INT);
        $stmt->bindParam(':professor_id', $professor_id, PDO::PARAM_INT);
        $stmt->bindParam(':periodo_id', $periodo_id, PDO::PARAM_INT);
        $stmt->bindParam(':curso_id', $curso_id, PDO::PARAM_INT);
        $stmt->bindParam(':turno_id', $turno_id, PDO::PARAM_INT);
    
        $stmt->execute();
    }


    public function matricularVariosAlunos($turmaObj, $alunosRA) {
        $nomeTurma = $turmaObj->getNomeTurma();
        $disciplina_id = $turmaObj->getDisciplina_id();
        $periodo_id = $turmaObj->getPeriodo_id();
        $professor_id = $turmaObj->getProfessor_id();
        $curso_id = $turmaObj->getCurso_id();
        $turno_id = $turmaObj->getTurno_id();
    
        foreach ($alunosRA as $aluno_ra) {
            $checkSql = "SELECT COUNT(*) FROM $this->tabela 
                         WHERE nome_turma = :nomeTurma 
                         AND aluno_ra = :aluno_ra 
                         AND disciplina_id = :disciplina_id 
                         AND periodo_id = :periodo_id";
            
            $checkStmt = $this->conn->prepare($checkSql);
            $checkStmt->bindParam(':nomeTurma', $nomeTurma, PDO::PARAM_STR);
            $checkStmt->bindParam(':aluno_ra', $aluno_ra, PDO::PARAM_STR);
            $checkStmt->bindParam(':disciplina_id', $disciplina_id, PDO::PARAM_INT);
            $checkStmt->bindParam(':periodo_id', $periodo_id, PDO::PARAM_INT);
            $checkStmt->execute();
    
            if ($checkStmt->fetchColumn() > 0) {
                header('Location: ../view/adminTurmas.php?matricula=duplicado');
                exit();
            }
    
            $sql = "INSERT INTO $this->tabela (nome_turma, aluno_ra, disciplina_id, professor_id, periodo_id, curso_id, turno_id) 
                    VALUES (:nomeTurma, :aluno_ra, :disciplina_id, :professor_id, :periodo_id, :curso_id, :turno_id)";
            
            $stmt = $this->conn->prepare($sql);
    
            $stmt->bindParam(':nomeTurma', $nomeTurma, PDO::PARAM_STR);
            $stmt->bindParam(':aluno_ra', $aluno_ra, PDO::PARAM_STR);
            $stmt->bindParam(':disciplina_id', $disciplina_id, PDO::PARAM_INT);
            $stmt->bindParam(':professor_id', $professor_id, PDO::PARAM_INT);
            $stmt->bindParam(':periodo_id', $periodo_id, PDO::PARAM_INT);
            $stmt->bindParam(':curso_id', $curso_id, PDO::PARAM_INT);
            $stmt->bindParam(':turno_id', $turno_id, PDO::PARAM_INT);
    
            $stmt->execute();
        }
    }

    public function editarTurma($turma, $id){
        $sql = "UPDATE $this->tabela SET nome_turma = :nomeTurma, 
        disciplina = :disciplina, periodo  = :periodo, professor = :professor
        WHERE id_turma = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':nomeTurma', $turma->getNomeTurma(), PDO::PARAM_STR);
        $stmt->bindParam(':disciplina', $turma->getDisciplina(), PDO::PARAM_INT);
        $stmt->bindParam(':periodo', $turma->getPeriodo(), PDO::PARAM_INT);
        $stmt->bindParam(':professor', $turma->getProfessor(), PDO::PARAM_INT);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function alterarLogo($logo, $id){
        $sql = "UPDATE $this->tabela SET logo = :logo 
        WHERE id_turma = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':logo', $logo, PDO::PARAM_STR);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }

    public function excluirTurma($id){
        $sql = "DELETE FROM $this->tabela WHERE id_turma = :id";
        $stmt = $this->conn->prepare($sql);
        $stmt->bindParam(':id', $id, PDO::PARAM_INT);
        $stmt->execute();
    }


}