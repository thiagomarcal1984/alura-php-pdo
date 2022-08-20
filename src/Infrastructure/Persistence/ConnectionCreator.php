<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator {
    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite'; 
        $pdo = new PDO('sqlite:' . $databasePath);
        // Força o lançamento de exceções quando ocorre algum problema com o database.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        return $pdo;
    }    
}
