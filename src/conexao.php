<?php

// Estrutura padrão: $pdo = new PDO(connection_stsring, usuario, senha, array_de_parms_extra);
$pdo = new PDO('sqlite:banco.sqlite');
echo 'Conectei.';