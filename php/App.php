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
    // user_id	username	firstname	secondname	email	password	created_at
    public static function create($params = [])
    {
        foreach($params as $key => $val)
        {
            $$key = htmlspecialchars($val);
        }      

        if(self::check($params['email']))
        {
            $user_id = bin2hex(random_bytes(4));
            $username = strtolower(
                str_replace(
                    ' ', 
                    '', 
                    ($params['firstname'].$params['firstname']
                )
            ));
            $create = self::$db->conn->prepare("INSERT INTO users (user_id, username, firstname, secondname, email, password) 
            VALUES (?, ?, ?, ?, ?, ?)
            ");
        }
        else
        {
            echo "b";
        }
    }
}
