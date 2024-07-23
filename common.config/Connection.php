<?php

class Connection
{
    private  $host = 'sql308.infinityfree.com';
    private  $db = 'if0_36959414_projet';
    private  $login = 'if0_36959414';
    private  $password = 'lc4sdnuMRNeU';

   

    public function conn()
    {
        $bddconn = '';
        try {
            $bddconn = new PDO('mysql:host=' . $this->host . ';dbname=' . $this->db, $this->login, $this->password);
        } catch (PDOException $e) {
            echo "Connection failed " . $e->getMessage();
        }
        return $bddconn;
    }
    public function test_input($data)
    {
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
}
