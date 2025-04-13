<?php


require_once('twig_carregar.php');
require('inc/banco.php');

require('verifica_login.php');
    
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    $user = $_POST['user'] ?? null;
    $password = $_POST['password'] ?? null;
    $id = $_POST['id'] ?? null;
    
    if ($user && $id) {
        $query = 'UPDATE usuarios SET user = :user WHERE id = :id';
        $binds = [
            "id" => $id,
            "user" => $user
        ];   

        if ($password) {
            $query = 'UPDATE usuarios SET user = :user, password = :password WHERE id = :id';
            $binds['password'] = password_hash($password, PASSWORD_DEFAULT);
        }

        $queryPDO = $pdo->prepare($query);
        $queryPDO->execute($binds);   
    }   
    
    header('location: usuarios.php');
} else {
    $id = $_GET['id'] ?? null;

    if ($id) {
        $query = $pdo->prepare('SELECT * FROM usuarios WHERE id = :id');
        $query->execute([":id" => $id]);
        $user = $query->fetch();
        
        echo $twig->render('form_usuarios.html', [
            'user' => $user,
        ]);
    }
};




