<?php

use Illuminate\Database\Capsule\Manager as Capsule;

$conexion = new Capsule;

$conexion->addConnection([
    'driver'     => 'mysql',
    'host'       => 'localhost',
    'database'   => 'test',
    'username'   => 'root',
    'password'   => '',
    'charset'    => 'utf8',
    'collation'  => 'utf8_unicode_ci',
    'prefix'     => ''
]);

$conexion->bootEloquent();

