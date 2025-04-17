<?php
// index.php

// Carrega o carregador do Twig
require_once('twig_carregar.php');
require_once('verifica_login.php');

// Mostra o template na tela


echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
]);