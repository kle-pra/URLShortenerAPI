<?php

$app->get('/', function() use ($app){
    echo 'Pass in a short URL to get a full URL.';
});