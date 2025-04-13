<?php

require('inc/banco.php');

require('verifica_login.php');

$id = $_GET['id'] ?? null;

if ($id) {
    $query = $pdo->prepare('DELETE FROM usuarios WHERE id = :id');
    $query->execute([":id" => $id]);
}

header('location: usuarios.php');
