<?php

use app\class\User;

spl_autoload_register(function ($class) {
    include $class . '.php';
});
session_start();

$email = htmlspecialchars($_POST['email']);
$password = htmlspecialchars($_POST['password']);

$connect = "mysql:host=MySQL-8.2;dbname=wd-16";
$user = "root";
$pass = "";

$pdo = new PDO($connect, $user, $pass);


$sql = "SELECT * FROM user WHERE " . User::FIELD_EMAIL . " = :email";
$stmt = $pdo->prepare($sql);
$stmt->execute([
    'email' => $email
]);

try {
    $user = $stmt->fetch(PDO::FETCH_ASSOC);
    ////
    if (password_verify($password, $user['password'])) {
        $_SESSION['auth'] = true;
        $_SESSION['id'] = $user['id'];
        header('Location: /app/');
    } else {
        echo '<pre>';
        var_dump($password);
        var_dump($user['password']);
        var_dump(password_verify($password, $user['password']));
        echo "Wrong password";
    }
} catch (Exception $e) {
    if ($e->getCode() == 23000) {
        echo 'email already exists';
        echo '<a href="/app/registration/">Go Back</a>';
    }
}