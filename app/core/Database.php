<?php


class Database
{
    private $host = DBHOST,
            $user = DBUSER,
            $pass = DBPASS,
            $dbname = DBNAME;
    private $dbh, $stmt;
    public function __construct()
    {
        $option = [
            PDO::ATTR_PERSISTENT => true,
            PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION
        ];
        $dsn = "mysql:host=". $this->host .";dbname=". $this->dbname;
        
        try {
            $this->dbh = new PDO($dsn, $this->user, $this->pass, $option);
        } catch (PDOException $e) {
            die($e->getMessage());
        }
    }

    public function query($query)
    {
        $this->stmt = $this->dbh->prepare($query);
    }

    public function bind($param, $value, $type = null)
    {
        if (is_null($type)) {
            switch (true) {
                case (is_int($value)) :
                    $type = PDO::PARAM_INT;
                    break;
                case (is_bool($value)) :
                    $type = PDO::PARAM_BOOL;
                    break;
                case (is_null($value)) :
                    $type = PDO::PARAM_NULL;
                    break;
                default :
                    $type = PDO::PARAM_STR;
            }

            $this->stmt->bindValue($param, $value, $type);
        }
    }

    public function getAll()
    {
        $this->stmt->execute();
        return $this->stmt->fetchAll(PDO::FETCH_ASSOC);
    }

    public function get()
    {
        $this->stmt->execute();
        return $this->stmt->fetch(PDO::FETCH_ASSOC);
    }

    public function getRow()
    {
        $this->stmt->execute();
        return $this->stmt->rowCount();
    }

   
}
