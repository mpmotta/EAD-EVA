<?php

	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true ){
                if(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 9 ){
                    header('Location: admin/index.php');
                }elseif(isset($_SESSION['nivel']) && $_SESSION['nivel'] == 3 ){
                    header('Location: eva/eva.php');
                }else{
                    header('Location: eva/index.php');
                }
        }else{
              header('Location: ../index.php');
    } 
         
?>