<?php
use Carbon\Carbon; 

require_once('vendor/autoload.php');
date_default_timezone_set('America/Sao_Paulo');

echo 'Agora:';
echo '<br>';

echo Carbon::now();

echo '<br><br>';
echo 'Agora +1 dia::';
echo '<br>';

echo Carbon::now()->addDay();

echo '<br><br>';
echo 'Menos uma semana:';
echo '<br>';

echo Carbon::now()->subWeek();

echo '<br><br>';
echo 'Próximas Olímpiada:';
echo '<br>';

echo Carbon::createFromDate(2024)->addYears(4)->year;

echo '<br><br>';
echo 'Sua idade é:';
echo '<br>';

echo Carbon::createFromDate(2007, 6, 28)->age;

echo '<br><br>';
echo 'É final de semana?';
echo '<br>';

if (Carbon::now()->isWeekend()) {
    echo "Sim";
} else {    
    echo "Não";
}

echo '<br><br>';
echo 'É final de semana daqui +4 dias?';
echo '<br>';

if (Carbon::now()->addDays(4)->isWeekend()) {
    echo "Sim";
} else {    
    echo "Não";
}

echo '<br><br>';
echo 'Diferença entre data (28/06/2007) e agora:';
echo '<br>';

$nascimento = Carbon::createFromDate(2007, 6, 28);

echo Carbon::now()->diff($nascimento);
