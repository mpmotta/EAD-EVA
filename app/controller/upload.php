<?php
    date_default_timezone_set('America/Sao_paulo');
    $agora = date('d-m-Y-h-i-s');

    $arquivo = $_FILES['avatar']['tmp_name'];
    $foto = $_FILES['avatar']['name'];

    $extensao = pathinfo($foto, PATHINFO_EXTENSION);

    $tmp_nome = md5($foto . $agora);
    $avatar = $tmp_nome . "." . $extensao;

    $destino = '../view/img/avatar/'. $avatar;

    move_uploaded_file($arquivo, $destino);
?>