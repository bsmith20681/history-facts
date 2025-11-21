<?php

class Database
{
    private $connection; //intializing the variable here so it's not block scoped

    public function __construct()
    {
        $host = 'localhost';
        $port = '3306';
        $db   = 'history_facts';

        //TODO: create an acutal user later
        $user = 'root';
        $pass = '';
        $charset = 'utf8mb4';

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
