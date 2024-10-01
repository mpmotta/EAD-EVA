function erro(){
    Swal.fire({
        title: "Registro Duplicado!",
        text: "Está tentando cadastrar um aluno que já existe!",
        icon: "error"
      });
}
erro();