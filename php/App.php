<?php
require_once __DIR__."/db.php";
class App
{
    public static Database $db;
    public function __construct()
    {
        self::$db = new Database();
    }
    public static function check($email)
    {
       $statement = self::$db->conn->prepare("SELECT * FROM users where email = ?");
        $statement->execute([$email]);

       if($statement->rowCount() < 1)
       {
         return true;
       }
       else
       {
        return false;
       }
    }

    public static function create($params = [])
    {
        
    }
}

