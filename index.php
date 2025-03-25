<?php

require_once('twig_carregar.php');

echo $twig->render('index.html', [
    'titulo' => 'Home',
    'fruta' => 'Abacaxi',
    'items' => ['teste1', 'teste1', 'teste1']
]);