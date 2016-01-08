<?php

use Slim\Slim;

ini_set('display_errors', 'On');

require '../vendor/autoload.php';

$app = new Slim([
    'config' => [
        'baseUrl' => 'http://localhost/html/URLShortenerAPI/public/'
    ]
        ]);


require 'database.php';

$app->get('/generate', function() {
    echo 'Generate';
});

