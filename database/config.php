<?php

$sgbd     = 'mysql:';
$dbname   = 'dbname=php74;';
$dbHost   = '127.0.0.1';
$dbUser   = 'root';
$dbPasswd = 'toor';
$dbOptions = [
    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
    PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_OBJ
];

$pdo = new PDO("{$sgbd}{$dbname}{$dbHost}", "{$dbUser}", "{$dbPasswd}", $dbOptions);