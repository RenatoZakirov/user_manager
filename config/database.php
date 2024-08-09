<?php

require '../lib/rb.php';

// параметры подключения
$host = 'localhost';
$port = '5432';
$db = 'usermanager_db';
$user = 'postgres';
$pass = 'root';

// настройка подключения для redbean
R::setup("pgsql:host=$host;port=$port;dbname=$db", $user, $pass);

if (!R::testConnection()) {
    die('не удалось подключиться к БД...');
}
