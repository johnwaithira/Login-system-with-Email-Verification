<?php
namespace Waithira\Phpemailverification\php;

class Database
{
    public $dsn = "mysql:host=localhost; dbname=phploginsystem";
    public $user = "root";
    public $pass = "1234";

    private $conn = null;
    public function __construct()
    {
        try
        {
            $this->conn = new PDO($this->dsn, $this->user, $this->pass);
            $this->conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $this->conn->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
            echo "Connected";

        }
        catch(Exception $e)
        {
            echo "<pre>";
            var_dump($e);
            echo "</pre>";

        }
    }

}

