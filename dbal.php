<?php

require __DIR__.'/vendor/autoload.php';

$config = new \Doctrine\DBAL\Configuration();

$connectionParams = [
    'dbname'    => 'pokemon',
    'user'      => 'root',
    'password'  => 'root',
    'host'      => 'localhost',
    'driver'    => 'pdo_mysql',
];

$conn = \Doctrine\DBAL\DriverManager::getConnection($connectionParams, $config);

var_dump($conn->errorInfo());