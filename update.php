<?php

// Importa configuração do aplicativo:
require('includes/config.php');

// Recebe o Id da "query string" e filtra:
$id = intval($_SERVER['QUERY_STRING']);

// Se não passou um número, sai do programa:
if ($id == 0) die('Ooops! Acesso inválido...');

// Se o formulário foi enviado...
if (isset($_POST['send'])) :

    debug($_POST, false);

    // Query que atualiza os dados:
    $sql = <<<SQL

UPDATE users SET
   name = '{$_POST['name']}',
   email = '{$_POST['email']}',
   photo = '{$_POST['photo']}',
   birth = '{$_POST['birth']}',
   bio = '{$_POST['bio']}',
   type = '{$_POST['type']}'
WHERE uid = '{$id}';

SQL;

    $conn->query($sql);

    die('Oba! Usuário atualizado com sucesso...');

else :

    // Monta a query:
    $sql = <<<SQL

SELECT * FROM users 
WHERE uid = '{$id}' 
    -- Nunca obter usuários com ustatus = 'deleted'.
    AND ustatus != 'deleted';

SQL;

    // Executa a query e armazena resultados em $res:
    $res = $conn->query($sql);

    // Se não retornou nada ($res está vazia), exibe erro e sai:
    if ($res->num_rows != 1)
        exit('Oooops! Não achei nada...');

    // Extrai dados do usuário encontrado:
    $user = $res->fetch_assoc();

    // Exclui a senha da listagem obtida:
    unset($user['password']);
    // unset($user['ustatus']);

    // Exibe os dados do usuário:
    // debug($user, false);

    // Monta SELECT do type:
    $type = '<select name="type">';
    $options = array('admin', 'author', 'moderator', 'user');

    // debug($options);

    for ($i = 0; $i < count($options); $i++) :
        if ($options[$i] == $user['type'])
            $type .= "<option value=\"{$options[$i]}\" selected>{$options[$i]}</option>\n";
        else
            $type .= "<option value=\"{$options[$i]}\">{$options[$i]}</option>\n";

    endfor;

    $type .= '</select>';

    // Exibe ferramentas adicionais:
    echo <<<HTML

<p>Altere somente o que precisa ser alterado.</p>

<form method="post" action="{$_SERVER['PHP_SELF']}?{$id}">
<input type="hidden" name="send" value="on">
Nome: <input type="text" name="name" value="{$user['name']}"><br>
E-mail: <input type="text" name="email" value="{$user['email']}"><br>
Foto: <input type="text" name="photo" value="{$user['photo']}"><br>
Nascimento: <input type="text" name="birth" value="{$user['birth']}"><br>
Biografia: <input type="text" name="bio" value="{$user['bio']}"><br>
Tipo: {$type}<br>
<button type="submit">Salvar</button>

</form>

HTML;

endif;
