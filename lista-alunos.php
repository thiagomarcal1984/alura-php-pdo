<?php

use Alura\Pdo\Domain\Model\Student;

require_once 'vendor/autoload.php';
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

$pdo = ConnectionCreator::createConnection();

// $statement = $pdo->query("SELECT * FROM students;");
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

$repository = new PdoStudentRepository($pdo);
$studentList = $repository->allStudents();
var_dump($studentList);
