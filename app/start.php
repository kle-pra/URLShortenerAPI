<?php

use Slim\Slim;
use site\model\Link;

ini_set('display_errors', 'On');

require '../vendor/autoload.php';

$app = new Slim();

$app->config=[
        'baseUrl' => 'http://localhost/html/URLShortenerAPI/public'
    ];

require 'database.php';
require 'routes.php';



