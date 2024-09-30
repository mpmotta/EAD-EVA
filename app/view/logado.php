<?php

	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true ){
                if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 9 ){
                    header('Location: indexAdmin.php');
                }elseif(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 3 ){
                    header('Location: adminEva.php');
                }elseif(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 2 ){
                    header('Location: acessoProf.php');
                }else{
                    header('Location: acessoAluno.php');
                }
        }else{
              header('Location: ../index.php');
    } 
         
?>