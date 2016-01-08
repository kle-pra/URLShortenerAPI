<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$capsule = new Capsule();

$capsule->addConnection([
    'driver'=>'mysql',
    'host'=>'127.0.0.1',
    'database'=>'shorty',
    'username'=>'root',
    'password'=>'password',
    'charset'=>'utf8',
    'collation'=>'utf8_unicode_ci',
    'prefix'=>''
    ]);

$capsule->bootEloquent();
        