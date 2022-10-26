<?php

// Obtém o ID do artigo da URL:
$parts = explode('/', $_SERVER['QUERY_STRING']);

// Se não solicitou um id, exibe página 404:
if(!isset($parts[1])) header('Location: /?404');
   
// Obtém o ID:
$id = intval($parts[1]);
if($id == 0) header('Location: /?404');

// Query que obtém o artigo completo:
$sql = <<<SQL

SELECT *,
DATE_FORMAT(adate, '%d/%m/%Y às %H:%i') AS adatebr 
FROM articles
INNER JOIN users ON author = uid
WHERE aid = '{$id}'
    AND astatus = 'online'
    AND adate <= NOW();

SQL;

// Executa a query:
$res = $conn->query($sql);

// Se artigo não existe, exibe a 404:
if($res->num_rows != 1) header('Location: /?404');

// Monta o artigo para exibição:
$art = $res->fetch_assoc();

// Define o título desta página:
$page_title = $art['title'];

// Monta a view do autor e data de publicação:
$authordate = "<span>Por {$art['name']}</span><span>em {$art['adatebr']}</span>";

// Definir o conteúdo desta página:
$page_content = <<<HTML

<article>
    <h2>{$art['title']}</h2>
    <div class="authordate">{$authordate}</div>
    {$art['content']}
</article>

<aside>
    <h3>Complemento</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
</aside>

HTML;