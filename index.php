<?php

/**
 * Importa as configurações do site:
 * Referências:
 *  • https://www.w3schools.com/php/php_includes.asp
 **/
require('includes/config.php');

/**
 * Obtém e filtra o nome da página da URL:
 * Referências:
 *  • https://www.w3schools.com/jsref/jsref_trim_string.asp
 *  • https://www.php.net/manual/en/function.urldecode.php
 *  • https://www.w3schools.com/php/func_string_htmlentities.asp
 *  • https://www.w3schools.com/php/php_superglobals.asp
 *  • https://www.w3schools.com/php/php_superglobals_server.asp
 **/
$route = trim(htmlentities($_SERVER['QUERY_STRING']));

// Se não solicitou uma rota, usa a rota da página inicial:
if ($route == '') $route = 'home';

// Remove coisas depois da "/" caso exista:
$route = explode('/', $route)[0];

/**
 * Monta todos os caminhos dos arquivos da página em uma coleção:
 * Referências:
 *  • https://www.w3schools.com/php/php_arrays.asp
 *  • https://www.w3schools.com/php/func_array.asp
 **/
$page = array(
  'php' => "pages/{$route}/index.php",
  'css' => "pages/{$route}/index.css",
  'js' => "pages/{$route}/index.js",
);

/**
 * Verifica se a rota solicitada para o arquivo PHP existe:
 * Referências:
 *  • https://www.w3schools.com/php/func_filesystem_file_exists.asp
 **/
if (!file_exists($page['php'])) :

  // Se não existe, carrega, explicitamente, a rota da página 404:
  $page = array(
    'php' => "pages/404/index.php",
    'css' => "pages/404/index.css",
    'js' => "pages/404/index.js",
  );
endif;

// Carrega a página PHP solicitada pela rota:
require($page['php']);

// Carrega o CSS da página solicitada, somente se ele existe:
if (file_exists($page['css']))
  // Gera a tag que carrega o CSS da página:
  $page_css = "<link rel=\"stylesheet\" href=\"/{$page['css']}\">";

// Carrega o JavaScript da página solicitada, somente se ele existe:
if (file_exists($page['js']))
  // Gera a tag que carrega o JavaScript da página:
  $page_js = "<script src=\"/{$page['js']}\"></script>";

/**
 * Formata o título da página:
 * OBS: O título de cada página é definido no arquivo "index.php" da própria
 * página, na variável "$page_title".
 **/ 
if ($page_title == '')
  // Se não definiu um título, usa o slogan do site para compor o título:
  $title = "{$c['sitename']} {$c['titlesep']} {$c['siteslogan']}";
else
  // Se definiu um título, usa o título da página na composição do título:
  $title = "{$c['sitename']} {$c['titlesep']} {$page_title}";

// Inicializa a lista de redes sociais do rodapé:
$fsocial = '<nav><h4>Redes sociais:</h4>';

/**
 * Loop para obter cada rede social:
 * OBS: a lista de redes sociais está definida em "includes/config.php", na 
 * coleção "$s[]".
 * Referências:
 *  • https://www.w3schools.com/js/js_loop_for.asp
 *  • https://www.w3schools.com/php/func_array_count.asp
 **/ 
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
  <link rel="icon" href="<?php echo $c['sitefavicon'] ?>">
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <link rel="stylesheet" href="/style.css" />
  <?php
  // Carrega as folhas de estilo da página solicitada:
  echo $page_css;
  ?>
  <title><?php echo $title ?></title>
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

      <a href="/?login" title="Perfil de usuário" class="dropable">
      <i class="fa-solid fa-right-to-bracket fa-fw"></i>
        <span>Login</span>
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

    <main id="content">
      <?php
      // Exibe o conteúdo dinâmico da página:
      echo $page_content;
      ?>
    </main>

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
  <?php
  // Carrega o javaScript da página solicitada:
  echo $page_js;
  ?>
</body>

</html>