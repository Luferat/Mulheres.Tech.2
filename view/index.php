<?php

// Importa o arquivo de configuração:
require($_SERVER['DOCUMENT_ROOT'] . '/inc/_config.php');

/***********************************************
 * Todo o código PHP desta página começa aqui! *
 ***********************************************/

// Obtém o ID da URL:
$id = intval($_SERVER['QUERY_STRING']);

// Verifica se o ID é igual a 0
if ($id == 0)
    // Se for, carrega página 404:
    header('Location: /404/');

// Escreve o SQL que obtém o artigo:
$sql = <<<SQL

SELECT *,
DATE_FORMAT(adate, '%d de %M de %Y às %H:%i') AS adatebr
FROM articles
WHERE aid = '{$id}'
    AND astatus = 'online'
    AND adate <= NOW()

SQL;
$res = $conn->query($sql);

// Verifica se o artigo existe:
if ($res->num_rows != 1)
    // Se não existe, carrega página 404.
    header('Location: /404/');

// Extrai os dados do artigo:
$art = $res->fetch_assoc();

// Formata o artigo para exibição:
$page_content .= <<<HTML

<h3>{$art['title']}</h3>
<span>{$art['adatebr']}</span>
{$art['content']}

HTML;

// Define o título da página como título do artigo:
$page_title = $art['title'];

/************************************************
 * Todo o código PHP desta página termina aqui! *
 ************************************************/

// Importa cabeçalho do tema:
require($_SERVER['DOCUMENT_ROOT'] . '/inc/_header.php');

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
require($_SERVER['DOCUMENT_ROOT'] . '/inc/_footer.php');
?>