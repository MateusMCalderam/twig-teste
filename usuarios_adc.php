<?php

require('inc/banco.php');
require_once('twig_carregar.php');

require('verifica_login.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['user'] ?? null;
    $password = $_POST['password'] ?? null;

    if ($user && $password) {
        $query = $pdo->prepare('INSERT INTO usuarios (user, password) VALUES (:user, :password)');

        $query->bindValue(':user', $user);
        $query->bindValue(':password', password_hash($password, PASSWORD_DEFAULT));
        $query->execute();
    }

    header('location: usuarios.php');
} else {
    echo $twig->render('form_usuarios.html', [
        'item' => [
            'user' => '',
            'password' => '',
        ],
    ]);

};
