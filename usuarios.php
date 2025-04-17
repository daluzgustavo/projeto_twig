<?php
require_once('twig_carregar.php');
require('inc/banco.php');
require_once('verifica_login.php');

$dados = $pdo->query('SELECT * FROM usuarios');

$user = $dados->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('usuarios.html', [
    'titulo' => 'Usuários',
    'usuarios' => $user,
]);

