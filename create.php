<?php

// Importa arquivo de configuração do aplicativo:
require('config/config.php');

// Obtém dados do usuário:
$user = array(
    'nome' => 'Maria da Silva',
    'email' => 'maria@silva.com.br',
    'foto' => 'https://randomuser.me/api/portraits/women/34.jpg',
    'nascimento' => '10/04/2000',
    'quemsou' => 'Boleira, padeira, arrumadeira, confeiteira.',
    'tipo' => 'usuário',
    'senha' => 'senha123'
);

// Seleciona o "type" de usuário correto:
switch (mb_strtolower($user['tipo'])):

    case 'administrador':
        $user['type'] = 'admin';
        break;
    case 'autor':
        $user['type'] = 'author';
        break;
    case 'moderador':
        $user['type'] = 'moderator';
        break;
    case 'usuário':
        $user['type'] = 'user';
        break;
    default:
        die('ERRO! Tipo de usuário não reconhecido!!!');
        break;
endswitch;

$user['birth'] = br_to_sys($user['nascimento']);

// Query que insere dados no banco usando HEREDOC:
$sql = <<<SQL

INSERT INTO users (
    name,
    email,
    password, 
    photo,
    birth, 
    bio, 
    type
) VALUES (
    '{$user['nome']}',
    '{$user['email']}',
    SHA1('{$user['senha']}'),
    '{$user['foto']}',
    '{$user['birth']}',
    '{$user['quemsou']}',
    '{$user['type']}'
);

SQL;

//Executa a query.
$conn->query($sql);

// Feedback.
exit('Oba! Usuário inserido com sucesso...');
