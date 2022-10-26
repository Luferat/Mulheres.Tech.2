<?php

// Define o título desta página:
$page_title = "Erro 404";

// Definir o conteúdo desta página:
$page_content = <<<HTML

<article>
    <h2>Oooops!</h2>
    <img src="/img/erro404.jpg" alt="Erro 404">
    <p>O conteúdo que você está tentando acessar não está disponível ou não existe!</p>
</article>

<aside>

    <h3>+ Links</h3>
    <nav class="links">

        <a href="\" title="Página inicial">
            <i class="fa-solid fa-house-chimney fa-fw"></i>
            <span>Início</span>
        </a>

        <a href="\?contacts" title="Faça contato">
            <i class="fa-solid fa-comments fa-fw"></i>
            <span>Contatos</span>
        </a>

        <a href="\?about" title="Sobre a gente">
            <i class="fa-solid fa-circle-info fa-fw"></i>
            <span>Sobre</span>
        </a>

        <a href="\?policies">
            <i class="fa-solid fa-user-lock fa-fw"></i>
            <span>Sua privacidade</span>
        </a>
    </nav>

    <h3>Artigos recentes</h3>

</aside>

HTML;
