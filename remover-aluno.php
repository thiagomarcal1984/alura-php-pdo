<?php

require_once 'vendor/autoload.php';
use Alura\Pdo\Infrastructure\Persistence\ConnectionCreator;

$pdo = ConnectionCreator::createConnection();

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($preparedStatement->execute());

// É possível aprovetar o mesmo $preparedStatement para repetir sua execução.
$preparedStatement->bindValue(1, 5, PDO::PARAM_INT); 
var_dump($preparedStatement->execute());