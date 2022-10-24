<?php

// Configura o aplicativo:
require('config/config.php');

// Recebe e filtra o ID:
$id = intval($_SERVER['QUERY_STRING']);

// Se não passou um número, sai do programa.
if ($id == 0) die('Ooops! Acesso inválido...');

// Monta a query.
$sql = <<<SQL

SELECT * FROM users WHERE uid = '{$id}' AND ustatus != 'deleted';

SQL;

// Executa a query:
$res = $conn->query($sql);

// Se não retornou nada, exibe erro:
if ($res->num_rows == 0)
    exit('Oooops! Não achei nada...');

// Extrai dados do usuário encontrado:
$user = $res->fetch_assoc();

// Exclui a senha
unset($user['password']);

// Exibe os dados do usuário:
debug($user, false);

// Ferramentas:
echo <<<HTML

<a href="update.php?{$user['uid']}">Editar</a>
    &nbsp;
<a href="delete.php?{$user['uid']}">Apagar</a>

HTML;
