<?php
class Database
{
    private $host, $username, $password, $database;
    public $connection;

    function __construct($host, $username, $password, $database)
    {
        $this->host = $host;
        $this->username = $username;
        $this->password = $password;
        $this->database = $database;

        $this->connection = new mysqli($this->host, $this->username, $this->password, $this->database) or die($this->connection->error);
        if (!$this->connection) {
            return false;
        } else {
            return true;
        }
    }
}
