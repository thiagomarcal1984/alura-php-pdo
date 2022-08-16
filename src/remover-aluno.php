<?php

$databasePath = __DIR__ . '/banco.sqlite'; 
$pdo = new PDO('sqlite:' . $databasePath);

$preparedStatement = $pdo->prepare('DELETE FROM students WHERE id = ?;');
$preparedStatement->bindValue(1, 2, PDO::PARAM_INT);
var_dump($preparedStatement->execute());

// É possível aprovetar o mesmo $preparedStatement para repetir sua execução.
$preparedStatement->bindValue(1, 5, PDO::PARAM_INT); 
var_dump($preparedStatement->execute());