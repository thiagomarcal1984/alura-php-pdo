<?php

// No php.ini, ative o PDO MySql: extension=pdo_mysql
$pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', 'root');
echo 'Conectei.';

// $pdo->exec("INSERT INTO phones (area_code, number, student_id) VALUES ('24', '99999-9999', 1),('21', '222222222', 1)");
// exit();
/*
INSERT INTO students (NAME, BIRTH_DATE) VALUES ('Vincius Dias', '1997-10-15');
INSERT INTO students (NAME, BIRTH_DATE) VALUES ('Patrícia Freitas', '1986-10-25');
INSERT INTO phones (area_code, number, student_id) VALUES ('24', '999999999', 1),('21', '222222222', 1);
*/
$createTableSql = '
    CREATE TABLE IF NOT EXISTS students (
        id INTEGER PRIMARY KEY AUTO_INCREMENT, 
        name VARCHAR(128), 
        birth_date DATE
    );

    CREATE TABLE IF NOT EXISTS phones (
        id INTEGER PRIMARY KEY AUTO_INCREMENT,
        area_code CHAR(2),
        number CHAR(9),
        student_id INTEGER,
        FOREIGN KEY(student_id) REFERENCES students(id)
    );
';

$pdo->exec($createTableSql);
