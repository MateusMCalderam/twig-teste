<?php

require('inc/banco.php');

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
