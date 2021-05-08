<?php

//инициализация подключений к базе данных

$dblocation = "127.0.0.1";
$dbname = 'myshop';
$dbuser = 'root';
$dbpass = '';

//соединение к базе данных

$db = mysqli_connect($dblocation, $dbuser, $dbpass);

if (!$db) {
    echo 'Error';
    exit();
}

//Кодировка по умолчанию
mysqli_set_charset($db, 'utf8');

if (!mysqli_select_db($db, $dbname)) {
    echo "Ошибка доступа к базе данных: {$dbname}";
    exit();
}
