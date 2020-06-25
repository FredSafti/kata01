<?php

use App\Main;
use Symfony\Component\Dotenv\Dotenv;

require 'vendor/autoload.php';

(new Dotenv())->load(__DIR__ . '/.env', __DIR__ . '/.env.local');

$app = new Main(
    $_ENV['APP_DIVERGENCE'],
    $_ENV['BIENS_SOURCE'],
    $_ENV['BIENS_PATH']
);

$data = $app->getListeBiens();
$first = $data[0]['id'];
echo '{data:' . json_encode($data) . ',firstId:' . $first . '}';
