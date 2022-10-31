<?php

// Importa o arquivo de configuração:
require('config.php');

/***********************************************
 * Todo o código PHP desta página começa aqui! *
 ***********************************************/

// 1) Obtém o ID da URL:
$id = intval($_SERVER['QUERY_STRING']);

// 2) Verifica se o ID é igual a 0
if ($id == 0)
    // 2.1) Se for, carrega página "404.php".
    header('Location: 404.php');

// 3) Escreve o SQL que obtém o artigo:
$sql = <<<SQL

SELECT *,
DATE_FORMAT(adate, '%d de %M de %Y às %H:%i') AS adatebr
FROM articles
WHERE aid = '{$id}'
    AND astatus = 'online'
    AND adate <= NOW()

SQL;
$res = $conn->query($sql);

// 4) Verifica se o artigo existe:
if ($res->num_rows != 1)
    // 4.1) Se não existe, carrega página "404.php".
    header('Location: 404.php');

// 5) Extrai os dados do artigo:
$art = $res->fetch_assoc();

// 6) Formata o artigo para exibição:
$page_content .= <<<HTML

<h3>{$art['title']}</h3>
<span>{$art['adatebr']}</span>
{$art['content']}

HTML;

// 7) Define o título da página como título do artigo:

/************************************************
 * Todo o código PHP desta página termina aqui! *
 ************************************************/

// Importa cabeçalho do tema:
require('header.php');

/********************************************************
 * Todo o conteúdo VISUAL da página (HTML) começa aqui! *
 ********************************************************/
?>

<?php echo $page_content ?>

<?php
/*********************************************************
 * Todo o conteúdo VISUAL da página (HTML) termina aqui! *
 *********************************************************/

// Importa rodapé do tema:
require('footer.php');
?>