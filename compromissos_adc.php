<?php

require('inc/banco.php');
require_once('verifica_login.php');

$titulo = $_POST['titulo'] ?? null;
$data = $_POST['date'] ?? null;

if ($titulo) {

    $query = $pdo->prepare('INSERT INTO compromissos (titulo, date) VALUES (:titulo, :data)');

    $query->execute([
        'titulo' => $titulo,
        'data' => $data
    ]);
}

header('location:compromissos.php');