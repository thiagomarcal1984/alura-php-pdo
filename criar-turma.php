<?php

use Alura\Pdo\Domain\Model\Student;
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

require_once 'vendor/autoload.php';

$connection = ConnectionCreator::createConnection();
$studentRepository = new PdoStudentRepository($connection);

// Realizo processos de definição da turma.
$connection->beginTransaction();
$aStudent = new Student(
    null,
    'Nico Steppat', 
    new DateTimeImmutable('1985-05-01')
);
$studentRepository->save($aStudent);

$anotherStudent = new Student(
    null,
    'Sérgio Lopes', 
    new DateTimeImmutable('1985-05-01')
);
$studentRepository->save($anotherStudent);

$connection->commit();
