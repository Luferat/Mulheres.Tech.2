<?php

// Importa o arquivo de configuração:
require('config.php');

/***********************************************
 * Todo o código PHP desta página começa aqui! *
 ***********************************************/

// Define o título da página:
$page_title = 'Slogan do site.';

// query para obter todos os artigos do site:
$sql = "

SELECT aid, title, thumbnail, resume
FROM articles
    WHERE astatus = 'online'
    AND adate <= NOW()
ORDER by adate DESC

";

// Executa query e armazena em '$res':
$res = $conn->query($sql);

// Se não existem artigos...
if ($res->num_rows == 0) :

    // Exibe mensagem para o usuário:
    $page_content .= "<p>Ooooops! Nenhum artigo encontrado...";

// Se achou os artigos...
else :

    while ($art = $res->fetch_assoc()) :

$page_content .= <<<HTML

<p>---------------------------------------</p>
<img src="{$art['thumbnail']}" alt="{$art['title']}">
<h3><a href="view.php?{$art['aid']}">{$art['title']}</a></h3>
<p>{$art['resume']}</p>

HTML;

endwhile;

endif;

/************************************************
 * Todo o código PHP desta página termina aqui! *
 ************************************************/

// Importa cabeçalho do tema:
require('header.php');

/********************************************************
 * Todo o conteúdo VISUAL da página (HTML) começa aqui! *
 ********************************************************/
?>

<h2>Artigos Recentes</h2>
<?php echo $page_content ?>

<?php
/*********************************************************
 * Todo o conteúdo VISUAL da página (HTML) termina aqui! *
 *********************************************************/

// Importa rodapé do tema:
require('footer.php');
?>