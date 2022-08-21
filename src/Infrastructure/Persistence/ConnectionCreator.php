<?php

namespace Alura\Pdo\Infrastructure\Persistence;

use PDO;

class ConnectionCreator {
    public static function createConnection(): PDO
    {
        $databasePath = __DIR__ . '/../../../banco.sqlite'; 
        // $pdo = new PDO('sqlite:' . $databasePath);
        // $pdo = new PDO('mysql:host=localhost;dbname=banco', 'root', 'root');
        $pdo = new PDO('pgsql:host=localhost;port=5432;dbname=banco', 'root', 'root');

        // Força o lançamento de exceções quando ocorre algum problema com o database.
        $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $pdo->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);

        return $pdo;
    }    
}
