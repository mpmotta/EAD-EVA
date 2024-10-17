function erro(){
    Swal.fire({
        title: "Registro Duplicado!",
        text: "Este aluno já está matriculado nessa turma!",
        icon: "error"
      });
}
erro();