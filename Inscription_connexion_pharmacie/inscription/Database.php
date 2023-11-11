<?php


class Database
{
    private $host = "localhost";
    private $username = "root";
    private $password = "";
    private $database = "pharmacie";
    public $connection;

    public function __construct()
    {
        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database);
        if ($this->connection->connect_error) {
            die("Erreur de connexion: " . $this->connection->connect_error);
        }
    }
}



