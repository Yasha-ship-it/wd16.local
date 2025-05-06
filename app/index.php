<?php

use app\class\User;

spl_autoload_register(function ($class) {
    include $class . '.php';
});
session_start();
if (empty($_SESSION['auth'])) {
    echo '<a href="/app/login/">Кнопка войти</a>';
} else {
    $connect = "mysql:host=MySQL-8.2;dbname=wd-16";
    $user = "root";
    $pass = "";

    $pdo = new PDO($connect, $user, $pass);


    $sql = "SELECT * FROM user WHERE id = :id";
    $stmt = $pdo->prepare($sql);
    $stmt->execute([
        'id' => $_SESSION['id']
    ]);
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    echo $user['name'] . ' ' . $user[User::FIELD_EMAIL];
}
echo '<br>';
echo 'Header AUTH';
echo '<br>';
echo '<br>';
echo '<br>';
echo '<br>';
echo 'Home Page';