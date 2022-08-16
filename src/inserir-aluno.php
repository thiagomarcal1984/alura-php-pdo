<?php

use Alura\Pdo\Domain\Model\Student;

require_once '../vendor/autoload.php';

// A duplicação do código de conexão.php não é boa prática.
$databasePath = __DIR__ . '/banco.sqlite'; 
$pdo = new PDO('sqlite:' . $databasePath);

$student = new Student(
    null, 
    "'Vinícius Dias', ''); DROP TABLE students; -- Dias", // SQL Injection.
    new DateTimeImmutable('1997-10-15')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (?, ?);";
$statement = $pdo->prepare($sqlInsert);
$statement->bindValue(1, $student->name());
$statement->bindValue(2, $student->birthDate()->format('Y-m-d'));

if ($statement->execute()){
    echo "Aluno incluído.";
}
