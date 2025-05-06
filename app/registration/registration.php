<?php

use app\class\User;

spl_autoload_register(function ($class) {
    include $class . '.php';
});
session_start();

$email = htmlspecialchars($_POST['email']);
$password = password_hash(htmlspecialchars($_POST['password']), PASSWORD_BCRYPT);
$name = htmlspecialchars($_POST['name']);

$connect = "mysql:host=MySQL-8.2;dbname=wd-16";
$user = "root";
$pass = "";

$pdo = new PDO($connect, $user, $pass);


$sql = "INSERT INTO user (`" . User::FIELD_EMAIL . "`, `password`, `name`) VALUES (:email, :pass, :name);";
$stmt = $pdo->prepare($sql);

try {
    $stmt->execute([
        'email' => $email,
        'pass' => $password,
        'name' => $name
    ]);
    ////
    $_SESSION['auth'] = true;
    $_SESSION['id'] = $pdo->lastInsertId();
} catch (Exception $e) {
    if ($e->getCode() == 23000) {
        echo 'email already exists';
        echo '<a href="/app/registration/">Go Back</a>';
    }
}


die();