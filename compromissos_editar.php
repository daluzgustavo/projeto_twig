<?php
# compras_editar.php
require_once('twig_carregar.php');
require('inc/banco.php');

if ($_SERVER['REQUEST_METHOD'] == 'GET') {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $titulo = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
        $titulo->execute([':id' => $id]);
        $compromissos = $titulo->fetch();

        echo $twig->render('compromissos_editar.html', [
            'titulo' => 'Compromissos',
            'compromissos' => $compromissos,
        ]);
    }
}
else {
    $edit = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, date = :data WHERE id = :id');
    $edit->execute([
        ':titulo' => $_POST['titulo'],
        ':data' => $_POST['date'],
        ':id' => $_POST['id'],
    ]);
    header('location:compromissos.php');
}