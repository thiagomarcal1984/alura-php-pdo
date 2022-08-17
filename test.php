<?php

require_once 'vendor/autoload.php';

use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;
use Alura\Pdo\Infrastructure\Repository\PdoStudentRepository;

$repository = new PdoStudentRepository(ConnectionCreator::createConnection());

echo !empty($repository->allStudents()) . PHP_EOL;

foreach ($repository->allStudents() as $student) {
    echo $student->name() . PHP_EOL;
}
