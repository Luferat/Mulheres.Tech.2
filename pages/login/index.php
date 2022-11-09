<?php

// Define o título desta página:
$page_title = "Login / Entrar";

// Define as variáveis do aplicativo:
$logged = false;
$error = $form_error = '';
$email = 'joca@silva.com';
$password = 'Senha123';

// Se o formulário foi enviado...
if (isset($_POST['send'])) :

    // Obtém o 'email' do formuláro e sanitiza:
    $email = filter_input(INPUT_POST, 'email', FILTER_SANITIZE_EMAIL);

    // Valida o campo 'email' que deve ser um e-mail válido:
    if (!filter_var($email, FILTER_VALIDATE_EMAIL))
        $error .= '<li>Seu e-mail está inválido.</li>';

    // Obtém a 'password' do formulário e sanitiza:
    $password = htmlspecialchars(trim($_POST['password']));

    // Valida o campo 'password' que deve seguir a regex:
    if (!preg_match("/{$rgpass}/", $password))
        $error .= '<li>Senha inválida.</li>';

    // Obtém tempo de vida do cookie → logged:
    if (isset($_POST['logged']))
        $logged = true;

    // Se ocorreram erros, ou seja $error não está vazia...
    if ($error != '') :

        // Mensagem de erro:
        $form_error = <<<HTML

<div class="form-error">
    <h3>Ooooops!</h3>
    <p>Ocorreram erros na tentativa de login:</p>
    <ul>{$error}</ul>
    <p>Por favor, verifique e tente novamente...</p>
</div>
 
HTML;

    // Se não ocorreram erros (ainda)...
    else :

        // Consulta o banco de dados:
        $sql = <<<SQL

SELECT * FROM users
WHERE email = '{$email}'
    AND password = SHA1('{$password}')
    AND ustatus = 'online'

SQL;

        // Executar o SQL:
        $res = $conn->query($sql);

        // Se não achou o usuário...
        if ($res->num_rows != 1) :

            // Mensagem de erro:
            $form_error = <<<HTML

<div class="form-error">
    <h3>Ooooops!</h3>
    <p>Ocorreram erros na tentativa de login:</p>
    <ul>
        <li>Usuário e/ou senha incorretos.</li>
    </ul>
    <p>Por favor, verifique e tente novamente...</p>
</div>
 
HTML;

        endif;

    endif;

endif;

//  Formulário de login:
$form_login = <<<HTML

<form method="post" action="/?login" id="formLogin">
    <input type="hidden" name="send" value="true">

    <p>Logue-se para ter acesso aos conteúdos restritos:</p>

    <p>
        <label for="email">E-mail:</label>
        <input type="email" name="email" id="email" value="{$email}" required>
    </p>

    <p>
        <label for="password">Senha:</label>
        <input type="password" name="password" id="password" autocomplete="off" value="{$password}" required pattern="{$rgpass}">
    </p>

    <p class="logged">
        <input type="checkbox" name="logged" id="logged" value="on">
        <label for="logged">Mantenha-me logado.</label>
    </p>

    <p>
        <button type="submit">Entrar</button>
    </p>

    <hr>

    <p class="loginlinks">
        <a href="/?signup">Cadastre-se</a>
        <a href="/?sendpass">Esqueci a senha</a>
    </p>

</form>

HTML;

// Definir o conteúdo desta página:
$page_content = <<<HTML

<article>
    <h2>Login / Entrar</h2>
    {$form_error}
    {$form_login}
</article>

<aside>
    <h3>Complemento</h3>
    <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit.</p>
</aside>

HTML;
