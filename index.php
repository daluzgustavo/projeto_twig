<?php
// index.php

// Carrega o carregador do Twig
require_once('twig_carregar.php');

// Mostra o template na tela
session_start();



if(isset($_SESSION['login']) && $_SESSION['isLogged']){
    echo $twig->render('index.html', [
        'fruta' => 'Abacaxi',
    ]);
}else{
    echo $twig->render('login.html', [
        'titulo' => 'Login'
    ]);
}