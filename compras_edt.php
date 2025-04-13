<?php


require_once('twig_carregar.php');
require('inc/banco.php');

require('verifica_login.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $item = $_POST['item'] ?? null;
    $id = $_POST['id'] ?? null;
    
    if ($item && $id) {
        $query = $pdo->prepare('UPDATE compras SET id = :id, item = :item WHERE id = :id');
        
        $query->execute([
            "id" => $id,
            "item" => $item
        ]);
    }   
    
    header('location: compras.php');
} else {
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
};




