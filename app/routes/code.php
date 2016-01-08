<?php

$app->get('/:code', function($code) use ($app){
    echo $code;
});