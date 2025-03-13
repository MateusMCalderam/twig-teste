<?php

require_once('twig_carregar.php');

echo $twig->render('index.html', [
    'fruta' => 'Abacaxi',
    'items' => ['teste1', 'teste1', 'teste1']
]);