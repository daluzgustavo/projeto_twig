<?php

require_once('twig_carregar.php');
require('inc/banco.php');

$id = $GET['id'] ?? null;

$query = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
    
    // $query->bindValue(':id', $id);

    $query->execute(['id' => $id]);
    
    $item = $query->fetch();

    echo $twig->render('editar.html', [
        'item' => $item,
    ]);


