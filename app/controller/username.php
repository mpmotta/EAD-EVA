<?php
mb_internal_encoding("UTF-8");

$nomeCompleto = $_POST['username'] ?? '';

$nomeMinusculo = mb_strtolower($nomeCompleto, 'UTF-8');

$mapaAcentos = [
    'á' => 'a', 'à' => 'a', 'ã' => 'a', 'â' => 'a', 'ä' => 'a',
    'é' => 'e', 'è' => 'e', 'ê' => 'e', 'ë' => 'e',
    'í' => 'i', 'ì' => 'i', 'î' => 'i', 'ï' => 'i',
    'ó' => 'o', 'ò' => 'o', 'õ' => 'o', 'ô' => 'o', 'ö' => 'o',
    'ú' => 'u', 'ù' => 'u', 'û' => 'u', 'ü' => 'u',
    'ç' => 'c',
];

$nomeSemAcentos = strtr($nomeMinusculo, $mapaAcentos);

$nomeLimpo = preg_replace('/[^a-z\s]/', '', $nomeSemAcentos);

$partesNome = explode(' ', $nomeLimpo);

$primeiroNome = $partesNome[0];
$ultimoNome = end($partesNome);

$username = $primeiroNome . '_' . $ultimoNome;