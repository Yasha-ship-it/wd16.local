<?php

require_once 'vendor/autoload.php';

use App\User;

/*$user = new User();
var_dump($user->findById(4));*/

/*$post_data = [
    'q' => 'test'
];

$ch = curl_init();
curl_setopt($ch, CURLOPT_URL, "https://www.google.com/");
curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);
curl_setopt($ch, CURLOPT_POST, 1);
curl_setopt($ch, CURLOPT_POSTFIELDS, http_build_query($post_data));
curl_setopt($ch, CURLOPT_POST, 1);

$result = curl_exec($ch);*/

$client = new \GuzzleHttp\Client();
$response = $client->request('GET', 'https://www.google.com/');

echo '<pre>';
var_dump($response);
echo '</pre>';
die();