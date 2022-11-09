<?php

// Se o usuário não está logado...
if (!isset($_COOKIE[$c['ucookie']]))

    // Redireciona para a página de login:
    header("Location: /?login");

// Obtém os dados atualizados do usuário do banco de dados:
$sql = <<<SQL

SELECT *,
    DATE_FORMAT(udate, '%d/%m/%Y às %H:%i') AS udatebr,
    DATE_FORMAT(last_login, '%d/%m/%Y às %H:%i') AS loginbr
FROM users
WHERE uid = '{$user['uid']}'
    AND ustatus = 'online';

SQL;

// Executa a query:
$res = $conn->query($sql);

// Se não achou usuário...
if ($res->num_rows != 1) :

    // Desloga usuário:
    setcookie($c['ucookie'], '', -1, '/');

    // Redireciona para a página de login:
    header("Location: /?login");

endif;

// Obtém dados do usuário:
$user = $res->fetch_assoc();

// Define o título desta página:
$page_title = "Perfil de {$user['name']}";

// Calcula a idade do usuário:
$age = agecalc($user['birth']);

// Definir o conteúdo desta página:
$page_content = <<<HTML

<article>
    <h2>{$page_title}</h2>
    
<div class="user-profile">

    <img src="{$user['photo']}" alt="{$user['name']}">
    <h3>{$user['name']}</h3>
    <h4>{$user['email']}</h4>
    <ul>
        <li>Idade: {$age} anos</li>
        <li>Cadastrado em {$user['udatebr']}</li>
        <li>Último login em {$user['loginbr']}</li>
    </ul>
    <div class="userbio">{$user['bio']}</div>

</div>

</article>

<aside>
    <h3>+Opções</h3>
    <a href="/?uedit"><i class="fa-solid fa-id-card fa-fw"></i><span>Editar perfil</span></a>
    <a href="/?upass"><i class="fa-solid fa-key fa-fw"></i><span>Trocar a senha</span></a>
    <a href="/?uphoto"><i class="fa-solid fa-user-pen fa-fw"></i><span>Trocar imagem</span></a>
    <hr>
    <a href="/?logout"><i class="fa-solid fa-right-from-bracket fa-fw"></i><span>Logout / Sair</span></a>
</aside>

HTML;
