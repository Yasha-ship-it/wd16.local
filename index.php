<?php
require_once 'vendor/autoload.php';
use Yasha\User;
$user = new User();
var_dump($user->findById(4));