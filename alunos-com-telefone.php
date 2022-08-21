<?php

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$repository = new PdoStudentRepository($connection);
/** @var \Alura\Pdo\Domain\Model\Student[] $studentList */
$studentList = $repository->allStudents();

// echo $studentList[1]->phones()[0]->formattedPhone(); // O índice é o código no banco, não no array.
var_dump($studentList);
