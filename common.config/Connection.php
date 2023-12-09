<?php

class Connection
{
    private string $host = "localhost:3306";
    private string $db = "projet";
    private string $login = "root";
    private string $password = "";

    public function conn(): PDO|string
    {
        $bddconn='';
        try
        {
            $bddconn = new PDO('mysql:host='.$this->host.';dbname='.$this->db, $this->login, $this->password);
        }
        catch(PDOException $e)
        {
            echo "Connection failed " . $e->getMessage();
        }
        return $bddconn;
    }

}
