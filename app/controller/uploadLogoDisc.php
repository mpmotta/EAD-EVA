<?php
    date_default_timezone_set('America/Sao_paulo');
    $agora = date('d-m-Y-h-i-s');

    $arquivo = $_FILES['logo']['tmp_name'];
    $name = $_FILES['logo']['name'];

    $extensao = pathinfo($name, PATHINFO_EXTENSION);

    $tmp_nome = md5($name . $agora);
    $logo = $tmp_nome . "." . $extensao;

    $destino = '../../public/img/logos'. $logo;

    $upload = move_uploaded_file($arquivo, $destino);
    if(!$upload){
        $logo = "logo.png";
    }
?>