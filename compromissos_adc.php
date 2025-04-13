require('verifica_login.php');
<?php

require('inc/banco.php');
require_once('twig_carregar.php');

require('verifica_login.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $titulo = $_POST['titulo'] ?? null;
    $date = $_POST['date'] ?? null;

    print_r($_POST);

    if ($titulo && $date) {
        $query = $pdo->prepare('INSERT INTO compromissos (titulo, date) VALUES (:titulo, :date)');

        $query->bindValue(':titulo', $titulo);
        $query->bindValue(':date', $date);
        $query->execute();
    }

    header('location: compromissos.php');
} else {
    echo $twig->render('form_compromissos.html', [
        'item' => [
            'titulo' => '',
            'date' => '',
        ],
    ]);

};
