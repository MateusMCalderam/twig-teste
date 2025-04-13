<?php

require_once('vendor/autoload.php');

if (session_status() == PHP_SESSION_NONE) {
    session_start();    
}

$loader = new \Twig\Loader\FilesystemLoader('./templates');

$twig = new \Twig\Environment($loader);
$twig->addGlobal('session', $_SESSION);
