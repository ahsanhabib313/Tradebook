<?php


//CONFIGURATION
$configuration = [
    'db' => [
        'driver' => 'mysql',
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'username' => $_ENV['DB_USERNAME'],
        'password' => $_ENV['DB_PASSWORD'],
        'database' => $_ENV['DB_DATABASE'],
        'charset' => 'utf8',
        'collection' => 'utf8_unicode_ci',
        'prefix' => ''
    ],
    'remotedb' => [
        'driver' => 'mysql',
        'host' => $_ENV['DB_HOST'],
        'port' => $_ENV['DB_PORT'],
        'username' => 'root',
        'password' => '',
        'database' => $_ENV['DB_DATABASE'],
        'charset' => 'utf8',
        'collection' => 'utf8_unicode_ci',
        'prefix' => ''
    ]
];

$capsule = new \Illuminate\Database\Capsule\Manager;
$capsule->addConnection($configuration['db']);
$capsule->addConnection($configuration['remotedb']);
$capsule->setAsGlobal();
$capsule->bootEloquent();
