<!DOCTYPE html>

<!--
  Inicio do documento HTML5
  Para saber mais:
    • https://www.w3schools.com/html
-->
<html lang="pt-br">
<!-- Cabeçalho com metadados do documento -->

<head>
  <!-- Define a tabela de caracteres universal -->
  <meta charset="UTF-8" />

  <!-- Define o ícone de favoritos -->
  <link rel="icon" href="/img/favicon.jpg">

  <!-- Torna a página responsivo -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />

  <!-- Carrega folhas de estilo do aplicativo -->
  <link rel="stylesheet" href="/style.css" />

  <!-- Folhas de estilos de cada página serão carregadas aqui -->
  <link rel="stylesheet" href="" id="pageCSS">

  <!-- 
    Importa a biblioteca Font Awesome via CDN
    Para saber mais:
      • https://fontawesome.com/
  -->
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" />

  <!-- Título do documento -->
  <title>Mulheres.Tech</title>

</head>

<!-- 
  Corpo do documento (viewport)
  Para saber mais:
    • https://www.w3schools.com/css/css_rwd_viewport.asp
-->

<body>
  <!-- Âncora do início da página -->
  <a id="top"></a>

  <!-- 
    Container da página:
    Este elemento permite limitar o tamanho mínimo e máximo da página
    e também centraliza ela na tela.
  -->
  <div id="wrap">
    <!-- Cabeçalho da página -->
    <header>
      <!-- Logotipo clicável usando Font Awesome -->
      <a href="home" title="Página inicial">
        <i class="fa-solid fa-laptop-code fa-fw"></i>
      </a>

      <!-- Título e slogan do site / página -->
      <h1>
        Mulheres.Tech
        <small>Programadoras do Futuro</small>
      </h1>
    </header>

    <!--
      Menu principal:
        / → Raiz do aplicativo → Será carregada a "index.html";
        /contacts → Página com formulário e links de contato;
        /about → Sobre o site, autor e privacidade;
        /profile → Gestão do usuário (login, logou, perfil, ...).
    -->
    <nav>
      <!-- Link do item de menu para a página especificada -->
      <a href="home" title="Página inicial">
        <!-- Ícone do ítem usando Font Awesome -->
        <i class="fa-solid fa-house-chimney fa-fw"></i>
        <!-- Etiqueta (label) do item -->
        <span>Início</span>
      </a>

      <!-- 
        Outros itens do menu. 
        Tem a mesma estrutura do anterior. 
      -->

      <a href="contacts" title="Faça contato" class="dropable">
        <i class="fa-solid fa-comments fa-fw"></i>
        <span>Contatos</span>
      </a>

      <a href="about" title="Sobre a gente" class="dropable">
        <i class="fa-solid fa-circle-info fa-fw"></i>
        <span>Sobre</span>
      </a>

      <a href="profile" title="Perfil de usuário" class="dropable">
        <i class="fa-regular fa-user fa-fw"></i>
        <span>Perfil</span>
      </a>

      <!--
        Botão que controla o menu dropdown:
        Este botão só aparece em resoluções menores (mobile frist).
        Observe que 'href="menu"', para que seja identificado pelo JavaScript.
      -->
      <a href="menu" id="btnMenu" title="Abre/fecha menu">
        <i class="fa-solid fa-ellipsis-vertical fa-fw"></i>
      </a>
    </nav>

    <!-- Menu dropdown: Adicione itens ao menu aqui. -->
    <div id="dropable">
      <nav>
        <a href="profile" title="Perfil de usuário"><i class="fa-regular fa-user fa-fw"></i><span>Perfil</span></a>
        <!-- Separador -->
        <hr>
        <a href="search" title="Procurar no site"><i class="fa-solid fa-magnifying-glass fa-fw"></i><span>Procurar</span></a>
        <hr>
        <a href="contacts" title="Faça contato"><i class="fa-solid fa-comments fa-fw"></i><span>Contatos</span></a>
        <a href="about" title="Sobre a gente..."><i class="fa-solid fa-circle-info fa-fw"></i><span>Sobre</span></a>
        <a href="site" title="Sobre o site..."><i class="fa-solid fa-globe fa-fw"></i><span>Sobre o site</span></a>
        <a href="team" title="Quem somos..."><i class="fa-solid fa-users fa-fw"></i><span>Quem somos</span></a>
        <a href="policies" title="Políticas de Privacidade"><i class="fa-solid fa-user-lock fa-fw"></i><span>Sua privacidade</span></a>
      </nav>
    </div>

    <!-- 
      Bloco do conteúdo.
      Este bloco terá um conteúdo diferente para cada página acessada.
    -->
    <main id="content"></main>

    <!-- Rodapé -->
    <footer>
      <!-- Bloco superior do rodapé -->
      <div id="fsup">
        <!-- Link para a raiz do aplicativo (página inicial) -->
        <a href="home" title="Página inicial">
          <i class="fa-solid fa-house-chimney fa-fw"></i>
        </a>

        <!-- Licença do aplicativo -->
        <div id="copy">&copy; 2022 Mulheres.Tech</div>

        <!-- Link para o topo desta página -->
        <a href="#top" title="Topo da página">
          <i class="fa-solid fa-circle-up fa-fw"></i>
        </a>
      </div>

      <!-- Bloco inferior do rodapé -->
      <div id="finf">
        <!-- Menu de redes sociais -->
        <nav>
          <h4>Redes sociais:</h4>
          <a href="https://facebook.com/Mulheres.Tech" target="_blank" title="Acesse nosso Facebook">
            <i class="fa-brands fa-square-facebook fa-fw"></i>
            <span>Facebook</span>
          </a>
          <a href="https://youtube.com/Mulheres.Tech" target="_blank" title="Nosso canal no Youtube">
            <i class="fa-brands fa-square-youtube fa-fw"></i>
            <span>Youtube</span>
          </a>
          <a href="https://github.com/Mulheres.Tech" target="_blank" title="Nossa página no GitHub">
            <i class="fa-brands fa-square-github fa-fw"></i>
            <span>GitHub</span>
          </a>
        </nav>

        <!-- Menu de links internos -->
        <nav>
          <h4>Acesso rápido:</h4>
          <a href="contacts">
            <i class="fa-solid fa-comments fa-fw"></i>
            <span>Contatos</span>
          </a>
          <a href="about">
            <i class="fa-solid fa-circle-info fa-fw"></i>
            <span>Sobre</span>
          </a>
          <a href="policies">
            <i class="fa-solid fa-user-lock fa-fw"></i>
            <span>Sua privacidade</span>
          </a>
        </nav>
      </div>
    </footer>

    <!-- Rack para exibir margem inferior do footer sem usar "overflow: auto" -->
    <span>&nbsp;</span>

    <!-- Fecha o wrap -->
  </div>

  <!-- Mensagem sobre o uso de cookies -->
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

  <!--
    Importa a biblioteca JavaScript "jQuery" via CDN
    Para saber mais:
      • https://jquery.com/
      • https://www.w3schools.com/jquery/
  -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js"></script>

  <!-- Inclui o JavaScript do aplicativo, que depende de "jQuery" -->
  <script src="/script.js"></script>
</body>

</html>