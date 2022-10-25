<?php

// Importa configuração do aplicativo:
require('includes/config.php');

// Monta query de consulta para TODOS os registros:
$sql = <<<SQL

SELECT uid, name, email,
    -- Formata a data para nosso formato. Referências:
    -- https://www.w3schools.com/sql/func_mysql_date_format.asp
    DATE_FORMAT(udate, '%d/%m/%Y %H:%i:%s') as udatebr
FROM users 
-- Nunca obter usuários com ustatus = 'deleted'.
WHERE ustatus != 'deleted';

SQL;

// Executa a query e armazena resultado em $res:
$res = $conn->query($sql);

// Cria variável de saída com a tabela de usuários:
$userlist = <<<HTML

<h1>Usuários cadastrados</h1>

<table border="1">
    <tr>
        <th>ID</th>
        <th>Nome</th>
        <th>E-mail</th>
        <th>Cadastro</th>
        <th>Ações</th>
    <tr>

HTML;

// Loop que itera cada usuário:
while ($user = $res->fetch_assoc()) :

    // debug($user, false);

    // Concatena (.=) uma linha com dados do usuário na tabela:
    $userlist .= <<<HTML

<tr>
    <td>{$user['uid']}</td>
    <td>{$user['name']}</td>
    <td>{$user['email']}</td>
    <td>{$user['udatebr']}</td>
    <td>
        <a href="read.php?{$user['uid']}">Ver</a>
        <a href="update.php?{$user['uid']}">Editar</a>
        <a href="delete.php?{$user['uid']}">Apagar</a>
    </td>
</tr>

HTML;

// Fecha o loop:
endwhile;

// Fecha a variável de saída:
$userlist .= '</table>';

// Envia a variável de saída com os dados dos usuários tabelados:
echo $userlist;
