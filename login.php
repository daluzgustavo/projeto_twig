<?php

require_once('twig_carregar.php');
require('inc/banco.php');

session_start();

if($_SERVER['REQUEST_METHOD'] == 'POST'){
    $user = $_POST['user'] ?? null;
    $senha = $_POST['senha'] ?? null;

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE user = :login");
    $query->execute([
        ":login" => $user
    ]);

    $data = $query->fetch();

    if (!$data || !password_verify($senha, $data['password'])) {
        echo $twig->render('login.html', [
            "error" => "Usuário e/ou Senha inválidos"
        ]);
        exit;
    }

    $_SESSION['usuario'] = $user;

    header('location:index.php');
}else{
    echo $twig->render('login.html', [
        'titulo' => 'Login',
    ]);
}

