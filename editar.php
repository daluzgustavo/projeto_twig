<?php

require('inc/banco.php');

$item = $_POST['item'] ?? null;
$id = $_POST['id'] ?? null;

if($item){
    $query = $pdo->prepare('UPDATE compras SET item = :it,  WHERE id = :id');
    
    $query->bindValue(':it', $item);
    $query->bindValue(':id', $id);

    $query->execute();

    // header('location: compras.php');
}