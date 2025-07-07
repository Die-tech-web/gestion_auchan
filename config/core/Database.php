<?php

namespace App\Config\Core;

use PDO;
use PDOException;
use Dotenv\Dotenv;

class Database
{
    private static ?PDO $pdo = null;

    public static function getConnection(): PDO
    {
        if (self::$pdo === null) {
            // Charger le fichier .env une seule fois
            if (!isset($_ENV['DB_HOST'])) {
                $dotenv = \Dotenv\Dotenv::createImmutable(dirname(__DIR__, 2));
                  $dotenv->load();
            }

            $host = $_ENV['DB_HOST'];
            $port = $_ENV['DB_PORT'];
            $dbname = $_ENV['DB_DATABASE'];
            $user = $_ENV['DB_USERNAME'];
            $pass = $_ENV['DB_PASSWORD'];
            $dsn = "pgsql:host=$host;port=$port;dbname=$dbname";

            try {
                self::$pdo = new PDO($dsn, $user, $pass, [
                    PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
                ]);
            } catch (PDOException $e) {
                die("Erreur de connexion : " . $e->getMessage());
            }
        }

        return self::$pdo;
    }
}
