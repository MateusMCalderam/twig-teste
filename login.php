<?php

require('inc/banco.php');
require_once('twig_carregar.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();    
    }

    $user = $_POST['user'] ?? null;
    $password = $_POST['password'] ?? null;

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE user = :login");
    $query->execute([
        ":login" => $user
    ]);

    $data = $query->fetch();

    if (!$data || !password_verify($password, $data['password'])) {
        echo $twig->render('login.html', [
            "error" => "Usuário e/ou Senha inválidos"
        ]);
        exit;
    }

    $_SESSION['usuario'] = $_POST['user'];

    header('location: compromissos.php');
} else {
    echo $twig->render('login.html', []);
};
