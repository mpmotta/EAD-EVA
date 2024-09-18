<?php
	session_start();
        if(isset($_SESSION['logado']) && $_SESSION['logado'] == true ){
                if(isset($_SESSION['level']) && $_SESSION['level'] == 9 ){
                    header('Location: admin/index.php');
                }elseif(isset($_SESSION['level']) && $_SESSION['level'] == 9 ){
                    header('Location: ava/index.php');
                }else{
                    header('Location: index.php');
                }
        }else{
        header('Location: ../index.php');
    }    
?>