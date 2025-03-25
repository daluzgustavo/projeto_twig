<?php

require('twig_carregar.php');
require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

$horario = Carbon::now()->addDay();

echo $twig->render('horario.html', [
    'horario' => $horario,
]);