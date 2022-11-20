<?php
require_once 'vendor/autoload.php';

$clientID = '63915264457-hjcpto8vmcse7s92b5u5j4371jfnecrj.apps.googleusercontent.com';
$clientSecret = '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';
$redirectUri = 'http://localhost/php/login-google.php';

$client = new Google_Client();
$client->setClientId($clientID);
$client->setClientSecret($clientSecret);
$client->setRedirectUri($redirectUri);
$client->addScope("email");
$client->addScope("profile");

$dbHost = 'Localhost:3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'loja';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName)
or die ("Não foi possível estabelecer uma conexão com localhost. Erro: ".mysqli_error());
?>