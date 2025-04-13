<?php

use Carbon\Carbon; 

require_once('twig_carregar.php');
require('inc/banco.php');

require('verifica_login.php');

$query = $pdo->query('SELECT * FROM usuarios');
  
$users = $query->fetchAll(PDO::FETCH_ASSOC);

echo $twig->render('usuarios.html', [
    'titulo' => 'Usuários',
    'dados' => $users
]);