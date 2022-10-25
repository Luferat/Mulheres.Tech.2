/**
 * JavaScript do aplicativo
 * Depende de "jQuery" (https://jquery.com/)
 *
 * OBS1: Este é o aplicativo principal, para que o tema (template) do site
 * opere. Posteriormente, quando necessário, cada página (conteúdo) terá seu
 * próprio JavaScript, assim, somente o JavaScript necessário será carregado.
 * 
 * OBS1: Todas as funções que iniciam com um cifrão ($) fazem parte da 
 * biblioteca jQuery, ou seja, não são do JavaScript "puro" (vanilla).
 *
 * Para saber mais:
 *   • https://www.w3schools.com/js/
 *   • https://www.w3schools.com/jsref/
 *   • https://www.w3schools.com/jquery/
 */

/**
 * runApp() → Aplicativo principal
 * Este aplicativo é executado pela última linha deste código.
 */
function runApp() {

  // Carrega a página inicial do site quando este iniciar:
  // loadPage('home');

  /**
   * jQuery → Quando houver click em um elemento <a>, execute o aplicativo 
   * "routerLink":
   **/
  $('#btnMenu').click(toggleMenu);

  // Prepara o menu dropdown para exibição correta conforme a largura da tela:
  resize();

  // Se a largura da tela mudar durante a execução, reajusta o menu dropdown:
  $(window).resize(resize);

  // COOKIE → Verifica se o cookie sobre cookies existe...
  if (getCookie('cookieAccept') != '') {

    // COOKIE → Se existe, oculta mensagem de cookie:
    $('#acCookies').hide();

    // COOKIE → Se não...
  } else {

    // COOKIE → Se não existe, mostra a mensagem de cookie:
    $('#acCookies').show();
  }

  // COOKIE → Monitora clique no botão de aceitar cookies:
  $(document).on('click', '#accept', function () {

    // COOKIE → Cria o cookie aceitando a mesagem sobre cookies:
    setCookie('cookieAccept', 'accept', 365);

    // COOKIE → Ocultar a mensagem de cookie:
    $('#acCookies').hide();
  });

}

/**
 * resize() → Aplicativo que ajusta o menu dropdown conforme a resolução 
 * (width) da viewport. Temos em "index.html" 3 elementos a serem controlados:
 *     • Os itens do menu normal, com a classe ".dropable";
 *     • O botão que controla o menu, com id "#btnMenu";
 *     • O menu dropdown em sí, com o id "#dropable".
 */
// Ajusta o menu dropdown:
function resize() {

  // jQuery → Oculta o menu:
  $('#dropable').hide('fast');

  // Se a largura da tela é maior que 574px...
  if (window.innerWidth > 574) {

    // jQuery → Oculta o botão do menu:
    $('#btnMenu').hide(0);

    // jQuery → Mostra o menu normal:
    $('.dropable').show(0);

    // Se não...
  } else {

    // jQuery → Oculta o menu normal:
    $('.dropable').hide(0);

    // jQuery → Mostra o botão do menu:
    $('#btnMenu').show(0);

  }
}

/**
 * toggleMenu() → Aplicativo que controla a exibição do menu dropdown.
 */
function toggleMenu() {

  // jQuery → Se o menu está visível...
  if ($('#dropable').is(":visible")) {

    // Chama a função que oculta o menu:
    hideMenu();

    // Se não...
  } else {

    // Chama a função que mostra o menu:
    showMenu();
  }

  return false;
}

/**
 * hideMenu() → Aplicativo que oculta o menu dropdown e também aplica o efeito
 * de animação no ícone do botão de menu. A classe "fa-rotate-90" que gira o 
 * ícone, faz parte da biblioteca "Font Awesome". Referências:
 *     https://fontawesome.com/docs/web/style/rotate
 */
function hideMenu() {

  // jQuery → Oculta o menu:
  $('#dropable').hide('fast');

  // jQuery → Remove rotação do ícone do botão do menu:
  $('#btnMenu i').removeClass('fa-rotate-90');
}

/**
 * showMenu() → Aplicativo que mostra o menu dropdown e também aplica o efeito
 * de animação no ícone do botão de menu. 
 */
function showMenu() {

  // jQuery → Mostra o menu:
  $('#dropable').show('fast');

  // jQuery → Rotaciona o ícone do botão do menu:
  $('#btnMenu i').addClass('fa-rotate-90');
}

/**
 * setCookie() → Cria cookies:
 */
function setCookie(cname, cvalue, exdays) {
  const d = new Date();
  d.setTime(d.getTime() + (exdays * 24 * 60 * 60 * 1000));
  let expires = "expires=" + d.toUTCString();
  document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

/**
 * getCookie() → Lê o valor de um cookie:
 */
function getCookie(cname) {
  let name = cname + "=";
  let decodedCookie = decodeURIComponent(document.cookie);
  let ca = decodedCookie.split(';');
  for (let i = 0; i < ca.length; i++) {
    let c = ca[i];
    while (c.charAt(0) == ' ') {
      c = c.substring(1);
    }
    if (c.indexOf(name) == 0) {
      return c.substring(name.length, c.length);
    }
  }
  return "";
}

/**
 * Menu de navegação complementar da seção "Sobre...", em HTML.
 * 
 * Como temos várias páginas nessa seção, não é necessário ficar repetindo o
 * trecho de código abaixo para mostrar o menu em cada página, basta exibir o 
 * valor da variável "aboutMenu" no elemento desejado.
 */
var aboutMenu = `
<a href="site"><i class="fa-solid fa-globe fa-fw"></i><span>Sobre o site</span></a>
<a href="team"><i class="fa-solid fa-users fa-fw"></i><span>Quem somos</span></a>
<a href="policies"><i class="fa-solid fa-user-lock fa-fw"></i><span>Sua privacidade</span></a>
<a href="contacts"><i class="fa-solid fa-comments fa-fw"></i><span>Contatos</span></a>
`;

// jQuery → Executa aplicativo "runApp" quando o documento estiver pronto:
$(document).ready(runApp);
