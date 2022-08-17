<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$student = new Student(
    null, 
    "Patrícia Freitas",
    new DateTimeImmutable('1986-10-25')
);

$sqlInsert = "INSERT INTO students (name, birth_date) VALUES (:name, :birth_date);";
$statement = $pdo->prepare($sqlInsert);
$name = $student->name();
$statement->bindParam(':name', $name);
$statement->bindValue(':birth_date', $student->birthDate()->format('Y-m-d'));

$name = 'Novo nome'; // O método bindParam vai usar esta string ao invés do nome no objeto $student.

if ($statement->execute()){
    echo "Aluno incluído.";
}
