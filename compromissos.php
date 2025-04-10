<?php

require_once('twig_carregar.php');
require('inc/banco.php');
require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

use Carbon\Carbon;

$ordem = $_GET['ordem'] ?? 'mais_proximo';

if ($ordem == 'mais_proximo'){
    $dados = $pdo->query('SELECT * FROM compromissos  WHERE NOW() <= date ORDER BY date ASC');
    
    $compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

    foreach($compromissos as &$compromisso){
        $data = Carbon::parse($compromisso['date']);
        $final_de_semana = Carbon::createFromDate($data)->isWeekend();
        $compromisso['final_de_semana'] =  $final_de_semana;
    }

} else if ($ordem == 'mais_distante'){
    $dados = $pdo->query('SELECT * FROM compromissos WHERE NOW() <= date ORDER BY date DESC ');
    
    $compromissos = $dados->fetchAll(PDO::FETCH_ASSOC);

    foreach($compromissos as &$compromisso){
        $data = Carbon::parse($compromisso['date']);
        $final_de_semana = Carbon::createFromDate($data)->isWeekend();
        $compromisso['final_de_semana'] =  $final_de_semana;
    }
}

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'compromissos' => $compromissos,
]);

