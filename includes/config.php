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

// Seta transações com MySQL/MariaDB para UTF-8:
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// Seta dias da semana e meses do MySQL/MariaDB para "português do Brasil":
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

// Insere as funções do aplicativo:
require('functions.php');
