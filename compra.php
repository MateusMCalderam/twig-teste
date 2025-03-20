<?php

require_once('twig_carregar.php');
require('inc/banco.php');


$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('SELECT * FROM compras WHERE id = :id');
    $query->execute([":id" => $id]);
    $item = $query->fetch();

    print_r($item);
    
    echo $twig->render('form_compras.html', [
        'item' => $item,
    ]);

}
