<?php

// Função de uso geral para DEBUG:
function debug($variable, $exit = true, $dump = false)
{
    echo '<pre>'; // Abre a tag HTML <pre>
    if ($dump) var_dump($variable); // Exibe o valor da variável, formatado para debug
    else print_r($variable);
    echo '</pre>'; // Fecha a tag </pre>
    if ($exit) die(); // Se $exit for 'true', interrompe o PHP
};

// Formata uma data DD/MM/AAAA HH:II:SS para AAAA-MM-DD HH:II:SS,
// ou DD/MM/AAAA para AAAA-MM-DD.
function br_to_sys($data_br)
{
    $dt_parts = explode(' ', $data_br);
    $parts = explode('/', $dt_parts[0]);
    $new_date = "{$parts[2]}-{$parts[1]}-{$parts[0]}";
    if(count($dt_parts) == 2) $new_date .= " {$dt_parts[1]}";
    return $new_date;
}
