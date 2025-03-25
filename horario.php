<?php

use Carbon\Carbon; 
require('twig_carregar.php');

date_default_timezone_set('America/Sao_Paulo');

$date_today = Carbon::now();
$date_tomorrow = Carbon::now()->addDay();

echo $twig->render('horario.html', [
    'titulo' => "Horário",
    'date_today' => Carbon::parse($date_today)->format('d/m/Y'),
    'date_tomorrow' =>  Carbon::parse($date_tomorrow)->format('d/m/Y')
]);
