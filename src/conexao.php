<?php

$caminhoBanco = __DIR__ . '/banco.sqlite'; 
// A documentação recomenda que o caminho absoluto seja enviado para a connection string.
// Estrutura padrão: $pdo = new PDO(connection_stsring, usuario, senha, array_de_parms_extra);
$pdo = new PDO('sqlite:' . $caminhoBanco);
echo 'Conectei.';