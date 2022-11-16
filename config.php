<?php
$dbHost = 'Localhost:3306';
$dbUsername = 'root';
$dbPassword = '';
$dbName = 'loja';

$conexao = new mysqli($dbHost,$dbUsername,$dbPassword,$dbName)
or die ("Não foi possível estabelecer uma conexão com localhost. Erro: ".mysql_error());
?>