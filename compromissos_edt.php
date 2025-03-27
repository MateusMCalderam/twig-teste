<?php


require_once('twig_carregar.php');
require('inc/banco.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $titulo = $_POST['titulo'] ?? null;
    $date = $_POST['date'] ?? null;
    $id = $_POST['id'] ?? null;
    
    if ($titulo && $id && $date) {
        $query = $pdo->prepare('UPDATE compromissos SET titulo = :titulo, date = :date WHERE id = :id');
        
        $query->execute([
            "id" => $id,
            "titulo" => $titulo,
            "date" => $date
        ]);
    }   
    
    header('location: compromissos.php');
} else {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $query = $pdo->prepare('SELECT * FROM compromissos WHERE id = :id');
        $query->execute([":id" => $id]);
        $item = $query->fetch();
        
        echo $twig->render('form_compromissos.html', [
            'item' => $item,
        ]);
    }
};




