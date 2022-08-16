<?php

use Alura\Pdo\Domain\Model\Student;

require_once '../vendor/autoload.php';

$databasePath = __DIR__ . '/banco.sqlite'; 
$pdo = new PDO('sqlite:' . $databasePath);

$statement = $pdo->query("SELECT * FROM students;");
/* Exemplo com fetchColumn (pega apenas a coluna da próxima linha).
var_dump($statement->fetchColumn(1));
exit();
*/
/* Exemplo com fetch (pega uma linha por vez)
while ($studentData = $statement->fetch(PDO::FETCH_ASSOC)) {
    $student = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );

    echo $student->age() . PHP_EOL;
}
exit();
*/
$studentDataList = $statement->fetchAll(PDO::FETCH_ASSOC);
foreach($studentDataList as $studentData) {
    $studentList[] = new Student(
        $studentData['id'],
        $studentData['name'],
        new DateTimeImmutable($studentData['birth_date'])
    );
}

var_dump($studentList);
