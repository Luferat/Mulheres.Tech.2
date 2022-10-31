<?php

// PHP em UTF-8:
header('Content-Type: text/html; charset=utf-8');

// Fuso horário de Brasília:
date_default_timezone_set('America/Sao_Paulo');

// Inicializa variáveis do aplicativo:
$page_title = $page_content = '';

// Configurações de acesso ao banco de dados:
$hostname = 'localhost';
$username = 'root';
$password = '';
$database = 'mulherestech';

// Conexão com o banco de dados:
$conn = new mysqli($hostname, $username, $password, $database);

// Seta transações com MySQL/MariaDB para UTF-8:
$conn->query("SET NAMES 'utf8'");
$conn->query('SET character_set_connection=utf8');
$conn->query('SET character_set_client=utf8');
$conn->query('SET character_set_results=utf8');

// Seta dias da semana e meses do MySQL/MariaDB para "português do Brasil":
$conn->query('SET GLOBAL lc_time_names = pt_BR');
$conn->query('SET lc_time_names = pt_BR');

// Função de uso geral para DEBUG:
function debug($variable, $exit = true, $dump = false)
{
    echo '<pre>';
    if ($dump) var_dump($variable);
    else print_r($variable);
    echo '</pre>';
    if ($exit) die();
};

/**
 * Converte uma data para outro formato:
 * Exemplos:
 *      dt_convert('2022-10-31');
 *      dt_convert('2022-10-31', 'd/m/Y');
 *      dt_convert('31-10-2022', 'Y-m-d');
 *      dt_convert('31/10/2022 12:34:59', 'Y-m-d H:i');
 */
function dt_convert($date, $format = 'Y-m-d H:i:s')
{
    $date = str_replace('/', '-', $date);
    $d = date_create($date);
    return date_format($d, $format);
}
