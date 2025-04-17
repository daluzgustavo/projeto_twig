<?php

require_once('vendor/autoload.php');
require_once('verifica_login.php');
date_default_timezone_set('America/Sao_Paulo');


use Carbon\Carbon;

echo Carbon::now() . '<br>';

echo Carbon::now()->addDay() . '<br>';

echo Carbon::now()->subWeek() . '<br>';

echo 'Próximas Olimpíadas ' . Carbon::createFromDate(2024)->addYears(4)->year . '<br>';

echo 'Sua idade é: ' . Carbon::createFromDate(2008, 1, 21)->age . '<br>';

if(Carbon::now()->isWeekend()){
    echo 'Festa!!!';
} else {
    echo 'Aula :(';
}

echo '<br>';

$nascimento = Carbon::createFromDate(2008, 1, 21);
echo 'Diferença de data ' . Carbon::now()->diff($nascimento);