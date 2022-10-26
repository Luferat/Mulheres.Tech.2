<?php

// Importa as configurações do site:
require('includes/config.php');

// Lista de redes sociais no rodapé:
$fsocial = '<nav><h4>Redes sociais:</h4>';
for ($i = 0; $i < count($s); $i++) :

  // Adiciona cada rede social na lista:
  $fsocial .= <<<HTML

<a href="{$s[$i]['link']}" target="_blank" title="Acesse nosso {$s[$i]['name']}">
  <i class="fa-brands {$s[$i]['icon']} fa-fw"></i>
  <span>{$s[$i]['name']}</span>
</a>

HTML;

endfor;

// Conclui a lista de redes sociais do rodapé:
$fsocial .= '</nav>';

?>
<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8" />
  <link rel="icon" href="/img/favicon.jpg">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css" />
  <link rel="stylesheet" href="" id="pageCSS">
  <title><?php echo $c['sitename'] ?></title>
</head>

<body>
  <a id="top"></a>
  <div id="wrap">

    <header>
      <a href="/" title="Página inicial">
        <?php echo $c['sitelogo'] ?>
      </a>
      <h1>
        <?php echo $c['sitename'] ?>
        <small><?php echo $c['siteslogan'] ?></small>
      </h1>
    </header>

    <nav>
      <a href="/" title="Página inicial">
        <i class="fa-solid fa-house-chimney fa-fw"></i>
        <span>Início</span>
      </a>
      <a href="/?contacts" title="Faça contato" class="dropable">
        <i class="fa-solid fa-comments fa-fw"></i>
        <span>Contatos</span>
      </a>
      <a href="/?about" title="Sobre a gente" class="dropable">
        <i class="fa-solid fa-circle-info fa-fw"></i>
        <span>Sobre</span>
      </a>
      <a href="/?profile" title="Perfil de usuário" class="dropable">
        <i class="fa-regular fa-user fa-fw"></i>
        <span>Perfil</span>
      </a>
      <a href="/?menu" id="btnMenu" title="Abre/fecha menu">
        <i class="fa-solid fa-ellipsis-vertical fa-fw"></i>
      </a>
    </nav>

    <div id="dropable">
      <nav>
        <a href="/?profile" title="Perfil de usuário"><i class="fa-regular fa-user fa-fw"></i><span>Perfil</span></a>
        <hr>
        <a href="/?search" title="Procurar no site"><i class="fa-solid fa-magnifying-glass fa-fw"></i><span>Procurar</span></a>
        <hr>
        <a href="/?contacts" title="Faça contato"><i class="fa-solid fa-comments fa-fw"></i><span>Contatos</span></a>
        <a href="/?about" title="Sobre a gente..."><i class="fa-solid fa-circle-info fa-fw"></i><span>Sobre</span></a>
        <a href="/?site" title="Sobre o site..."><i class="fa-solid fa-globe fa-fw"></i><span>Sobre o site</span></a>
        <a href="/?team" title="Quem somos..."><i class="fa-solid fa-users fa-fw"></i><span>Quem somos</span></a>
        <a href="/?policies" title="Políticas de Privacidade"><i class="fa-solid fa-user-lock fa-fw"></i><span>Sua privacidade</span></a>
      </nav>
    </div>

    <main id="content"></main>

    <footer>

      <div id="fsup">
        <a href="/" title="Página inicial">
          <i class="fa-solid fa-house-chimney fa-fw"></i>
        </a>
        <div id="copy">&copy; 2022 <?php echo $c['sitename'] ?></div>
        <a href="#top" title="Topo da página">
          <i class="fa-solid fa-circle-up fa-fw"></i>
        </a>
      </div>

      <div id="finf">
        <?php
        // Exibe a lista de redes sociais:
        echo $fsocial;
        ?>
        <nav>
          <h4>Acesso rápido:</h4>
          <a href="/?contacts">
            <i class="fa-solid fa-comments fa-fw"></i>
            <span>Contatos</span>
          </a>
          <a href="/?about">
            <i class="fa-solid fa-circle-info fa-fw"></i>
            <span>Sobre</span>
          </a>
          <a href="/?policies">
            <i class="fa-solid fa-user-lock fa-fw"></i>
            <span>Sua privacidade</span>
          </a>
        </nav>
      </div>
    </footer>
    <span>&nbsp;</span>

  </div>

  <div id="acCookies">
    <div class="cookieBody">
      <div class="cookieBox">
        <div>
          Usamos cookies para lhe fornecer uma experiência de navegação melhor e mais segura.
          Não se preocupe, todos os seus dados pessoais estão protegidos.
        </div>
        <button id="accept">Entendi!</button>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>
  <script src="/script.js"></script>
</body>

</html>