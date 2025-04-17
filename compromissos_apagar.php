<?php

require('inc/banco.php');
require_once('verifica_login.php');

$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('DELETE FROM compromissos WHERE id = :id');

    $query->execute([
        ':id' => $id
    ]);
}

header('location:compromissos.php');