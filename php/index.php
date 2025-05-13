<?php
require_once '/ORM/User.php';
require_once '/ORM/Products.php';

$user = new User();
$products = new Products();
echo '<pre>';
//var_dump($user->all());
//var_dump($products->all());

var_dump($user->findById(4));
var_dump($products->findById(2));

/*var_dump($user->create([
    'email' => 'test123@test.com',
    'password' => '1423',
    'name' => 'test',
]));
var_dump($products->create([
    'name' => 'test',
    'price' => 312,
    'bonus' => 123,
    'description' => 'test',
]));*/
echo '</pre>';
die();