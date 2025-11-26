<?php
declare(strict_types=1);

class Conexao
{

    private static ?PDO $instance = null;

    public static function getInstance(): PDO
    {

        if (self::$instance === null) {
            try {
                self::$instance = new PDO(
                    "mysql:host=localhost;dbname=cadastro43TI;charset=utf8",
                    "root",
                    "",
                    [
                        PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION,
                        PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                        PDO::ATTR_EMULATE_PREPARES => false, // Performance & Security
                        PDO::ATTR_PERSISTENT => true // Persistent connection for performance
                    ]
                );

            } catch (PDOException $e) {
                // Em produção, logar o erro e não exibir
                throw new PDOException($e->getMessage(), (int) $e->getCode());
            }
        }

        return self::$instance;
    }
}
