<?php

// Importa configuração do aplicativo:
require('includes/config.php');

// Recebe o Id da "query string" e filtra:
$id = intval($_SERVER['QUERY_STRING']);

// Se não passou um número, sai do programa:
if ($id == 0) die('Ooops! Acesso inválido...');

// Monta a query:
$sql = <<<SQL

SELECT * FROM users 
WHERE uid = '{$id}' 
    -- Nunca obter usuários com ustatus = 'deleted'.
    AND ustatus != 'deleted';

SQL;

// Executa a query e armazena resultados em $res:
$res = $conn->query($sql);

// Se não retornou nada ($res está vazia), exibe erro e sai:
if ($res->num_rows != 1)
    exit('Oooops! Não achei nada...');

// Extrai dados do usuário encontrado:
$user = $res->fetch_assoc();

// Exclui a senha da listagem obtida:
unset($user['password']);
// unset($user['ustatus']);

// Exibe os dados do usuário:
debug($user, false);

// Exibe ferramentas adicionais:
echo <<<HTML

<a href="update.php?{$user['uid']}">Editar</a>
&nbsp;
<a href="delete.php?{$user['uid']}">Apagar</a>

HTML;
