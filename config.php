<?php

// Configura PHP para UTF-8:
header('Content-Type: text/html; charset=utf-8');

// Define o fuso horário para "horário de Brasília":
date_default_timezone_set('America/Sao_Paulo');

// Dados de conexão com MySQL no XAMPP:
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mulherestech';

// Conexão com o MySQL e banco de dados:
$conn = new mysqli($hostname, $username, $password, $database);

// TESTE → Lendo dados do db:
$sql = "SELECT aid, title, resume, thumbnail FROM articles";

// Executa a query:
$res = $conn->query($sql);

// Loop para receber cada registro:
while ($art = $res->fetch_assoc()) {

    print_r ($art);
}
