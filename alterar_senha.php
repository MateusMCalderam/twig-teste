<?php

require('inc/banco.php');
require_once('twig_carregar.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {

    if (session_status() == PHP_SESSION_NONE) {
        session_start();    
    }

    $actual_password = $_POST['password'] ?? null;
    $new_password = $_POST['new_password'] ?? null;
    $repeat_password = $_POST['repeat_password'] ?? null;
    $userId = $_SESSION['usuario']['id'] ?? null;

    if (!$actual_password || !$new_password || !$repeat_password) {
        echo $twig->render('alterar_senha.html', [
            "error" => "Campo não informado"
        ]);
        exit;
    }

    if ($repeat_password != $new_password) {
        echo $twig->render('alterar_senha.html', [
            "error" => "A repetição da senha é diferente da senha informada"
        ]);
        exit;
    }

    if ($actual_password == $new_password) {
        echo $twig->render('alterar_senha.html', [
            "error" => "A nova senha é igual senha antiga"
        ]);
        exit;
    }

    $query = $pdo->prepare("SELECT * FROM usuarios WHERE id = :userId");
    $query->execute([
        ":userId" => $userId
    ]);

    $data = $query->fetch();

    print_r($data);

    if (!$data || !password_verify($actual_password, $data['password'])) {
        echo $twig->render('alterar_senha.html', [
            "error" => "Senha atual inválida"
        ]);
        exit;
    }

    $query = $pdo->prepare("UPDATE usuarios SET password = :password WHERE id = :userId");
    $query->execute([
        ":userId" => $userId,
        ":password" => password_hash($new_password, PASSWORD_DEFAULT) 
    ]);

    header('location: compromissos.php');
} else {
    echo $twig->render('alterar_senha.html', []);
};
