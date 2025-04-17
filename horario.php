<?php

require('twig_carregar.php');
require_once('vendor/autoload.php');
require_once('verifica_login.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

$horario_atual = Carbon::now();

$horario_amanha = Carbon::now()->addDay();

echo $twig->render('horario.html', [
    'horario' => $horario_atual,
    'horario_amanha' => $horario_amanha,
]);