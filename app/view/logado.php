<?php

	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true ){
                if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 9 ){
                    header('Location: indexAdmin.php');
                }elseif(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 3 ){
                    header('Location: adminEva.php');
                }else{
                    header('Location: eva.php');
                }
        }else{
              header('Location: ../index.php');
    } 
         
?>