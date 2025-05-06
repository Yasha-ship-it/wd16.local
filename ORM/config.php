<?php
$connect = "mysql:host=MySQL-8.2;dbname=wd-16";
$user = "root";
$pass = "";

try {
    $pdo = new PDO($connect, $user, $pass);
} catch (PDOException $e) {
    //sms - критичный случай нет подключения к БД
    die('404');
}
return $pdo;

