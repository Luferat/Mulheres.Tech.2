<?php

// Importa o arquivo de configuração:
require($_SERVER['DOCUMENT_ROOT'] . '/inc/_config.php');

/***********************************************
 * Todo o código PHP desta página começa aqui! *
 ***********************************************/

// Define o título da página:
$page_title = 'Erro 404';

/************************************************
 * Todo o código PHP desta página termina aqui! *
 ************************************************/

// Importa cabeçalho do tema:
require($_SERVER['DOCUMENT_ROOT'] . '/inc/_header.php');

/********************************************************
 * Todo o conteúdo VISUAL da página (HTML) começa aqui! *
 ********************************************************/
?>

<h2>Oooops!</h2>
<p>O conteúdo que você está tentando acessar não está disponível ou não existe...</p>

<?php
/*********************************************************
 * Todo o conteúdo VISUAL da página (HTML) termina aqui! *
 *********************************************************/

// Importa rodapé do tema:
require($_SERVER['DOCUMENT_ROOT'] . '/inc/_footer.php');
?>