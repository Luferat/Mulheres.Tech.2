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
    'tipo' => 'usuária',
    'senha' => 'senha123'
);

echo '<pre>';
print_r($user);
echo '</pre>';

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
    '',
    '',
    '',
    '',
    '',
    '',
    ''
);

SQL;
