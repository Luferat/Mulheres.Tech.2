<?php

// Importa as configurações do aplicativo:
require('includes/config.php');

// Obtém o ID a ser apagado da QUERY STRING:
$id = intval($_SERVER['QUERY_STRING']);

// Se não iformou um ID, encerra o programa:
if ($id == 0) die('Oooops! Algo errado não deu certo...');

// Query que apaga o registro:
$sql = <<<SQL

UPDATE users SET ustatus = 'deleted' WHERE uid = '{$id}';

SQL;

// Executa a query:
$conn->query($sql);

// Feedback
echo "Oba! Usuário apagado...";
