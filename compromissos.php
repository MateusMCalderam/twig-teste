<?php

use Carbon\Carbon; 

require_once('twig_carregar.php');
require('inc/banco.php');

require('verifica_login.php');

$ordem = $_GET['ordem'] ?? null;
if (isset($ordem) && $ordem == 'desc') {
    $query = $pdo->query('SELECT * FROM compromissos ORDER BY id DESC');
} else {
    $query = $pdo->query('SELECT * FROM compromissos');
}
  
$comp = $query->fetchAll(PDO::FETCH_ASSOC);



foreach ($comp as &$item) {
    $date = Carbon::createFromFormat('Y-m-d', $item['date'], 'America/Sao_Paulo');  

    $item['date'] = $date->format('d/m/Y');  
    $item['isWeekend'] = $date->isWeekend();    
}

echo $twig->render('compromissos.html', [
    'titulo' => 'Compromissos',
    'dados' => $comp  
]);