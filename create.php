<?php

/**
 * create.php
 * Este é um aplicativo de testes.
 * Insere dados na tabela "users" do banco de dados.
 **/ 

// Importa arquivo de configuração do aplicativo:
require('includes/config.php');

// Obtém dados do usuário (isso poderia vir do formulário, por exemplo):
$user = array(
    'nome' => 'Maria da Silva',
    'email' => 'maria@silva.com.br',
    'foto' => 'https://randomuser.me/api/portraits/women/34.jpg',
    'nascimento' => '10/04/2000',
    'quemsou' => 'Boleira, padeira, arrumadeira, confeiteira.',
    'tipo' => 'Usuário',
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

// Converte a data para o formato system date, usando a função br_to_sys().
$user['birth'] = br_to_sys($user['nascimento']);

// Query que insere dados no banco (usando HEREDOC):
$sql = <<<SQL

INSERT INTO users (
    -- Ordem dos campos a serem inseridos.
    name,
    email,
    password,
    photo,
    birth,
    bio, 
    type
) VALUES (
    -- Dados a serem inseridos, na mesma ordem dos campos.
    '{$user['nome']}',
    '{$user['email']}',
    SHA1('{$user['senha']}'), -- Senha criptografada.
    '{$user['foto']}',
    '{$user['birth']}',
    '{$user['quemsou']}',
    '{$user['type']}'
);

SQL;

//Executa a query:
$conn->query($sql);

// Feedback:
echo ('Oba! Usuário inserido com sucesso...');
