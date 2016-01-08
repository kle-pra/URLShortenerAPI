<?php

use Slim\Slim;
use site\model\Link;

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


$app->get('/', function(){
    $link=Link::where('url','http://duckduckgo.com')->first();
    var_dump($link);
});

