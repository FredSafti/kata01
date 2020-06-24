<?php

use App\Main;

require 'vendor/autoload.php';

$app = new Main('megAgence');
$data = $app->getListeBiens();
$last = $data[array_key_last($data)][0];
echo '{data:' . json_encode($data) . ',lastId:' . $last . '}';
