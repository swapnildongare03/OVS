<?php

class DB{
    private $servername = "localhost";
    private $username = "root";
    private $password = "";
    private $dbname ="ovs";
    private $conn = null;

    public function __construct()
    {
        $this->conn = new mysqli($this->servername, $this->username, $this->password,$this->dbname);

    }

   
}
