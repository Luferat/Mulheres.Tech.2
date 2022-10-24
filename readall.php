<?php

require('config/config.php');

// Monta query de consulta para TODOs os registros:
$sql = <<<SQL

SELECT uid, name, email, 
    DATE_FORMAT(udate, '%d/%m/%Y %H:%i:%s') as udatebr
FROM users WHERE ustatus != 'deleted';

SQL;

// Executa a query e armazena resultado em $res:
$res = $conn->query($sql);

// Variável com a tabela de usuários:
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

endwhile;

$userlist .= '</table>';

echo $userlist;