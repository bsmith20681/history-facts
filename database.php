<?php

class Database
{
    private $connection; //intializing the variable here so it's not block scoped

    public function __construct()
    {
        $host = getenv('DB_HOST') ?: 'localhost';
        $port = getenv('DB_NAME') ?: '3306';
        $db   = getenv('DB_NAME') ?: 'history_facts';
        $user = getenv('DB_USER') ?: 'root';
        $pass = getenv('DB_PASS') ?: '';
        $charset = 'utf8mb4';

        //TODO: create an acutal user later
        $dsn = "mysql:host=$host;port=$port;dbname=$db;charset=$charset;";

        try {
            $this->connection = new PDO($dsn, $user, $pass, [
                //review this in more detail later. Not sure on exact meaning of each one of these
                PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
                PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
                PDO::ATTR_EMULATE_PREPARES   => false,
            ]);
        } catch (PDOException $e) {
            die('Database connection failed.');
        }
    }

    public function query($sql, $params = [])
    {
        $statement = $this->connection->prepare($sql);
        $statement->execute($params);

        return $statement;
    }
}

$db = new Database();
