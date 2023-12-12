<?php

class Connection
{
    private  $host = "localhost:3306";
    private  $db = "projet";
    private  $login = "root";
    private  $password = "";

    public function conn()
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
