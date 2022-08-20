<?php

$caminhoBanco = __DIR__ . '/banco.sqlite'; 
// A documentação recomenda que o caminho absoluto seja enviado para a connection string.
// Estrutura padrão: $pdo = new PDO(connection_stsring, usuario, senha, array_de_parms_extra);
$pdo = new PDO('sqlite:' . $caminhoBanco);
echo 'Conectei.';

// $pdo->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('24', '99999-9999', 1),('21', '222222222', 1)");
// exit();

$createTableSql = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY, 
        name TEXT, 
        birth_date TEXT
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY,
        area_code TEXT,
        number TEXT,
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students(id)
    );
';

$pdo->exec($createTableSql);
