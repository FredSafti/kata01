<?php

use App\Main;
use Symfony\Component\Dotenv\Dotenv;

require 'vendor/autoload.php';

(new Dotenv())->loadEnv(__DIR__ . '/.env');

$app = new Main(
    $_ENV['APP_DIVERGENCE'],
    $_ENV['BIENS_SOURCE'],
    $_ENV['BIENS_PATH']
);

$data = $app->getListeBiens();
$last = $data[array_key_last($data)]['id'];
echo '{data:' . json_encode($data) . ',lastId:' . $last . '}';
