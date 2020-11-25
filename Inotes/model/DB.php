<?php

namespace Model;

class DB
{
    protected $dsn;
    protected $userName;
    protected $password;

    public function __construct()
    {
        $this->dsn = 'mysql:host=127.0.0.1;dbname=inotes';
        $this->userName = 'root';
        $this->password = "123456";
    }

    public function connect()
    {
        $conn = null;

        try {
            $conn = new \PDO($this->dsn , $this->userName , $this->password);
        } catch (\PDOException $e) {
            return $e->getMessage();
        }
        return $conn;
    }
}