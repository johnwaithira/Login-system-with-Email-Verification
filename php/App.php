<?php
require_once __DIR__."/db.php";
session_start();
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
                    ($params['firstname'].$params['lastname']
                )
            ));
            $create = self::$db->conn->prepare(
                "INSERT INTO users (
                    user_id, username, firstname, secondname, email, password
                    ) 
            VALUES (?, ?, ?, ?, ?, ?)
            ");

            if($create->execute(
                [
                    $user_id,
                    $username,
                    $params['firstname'],
                    $params['lastname'],
                    $params['email'],
                    $params['password']

                    ]
                )
            )
            {
                echo true;
            }
            else
            {
                echo "Acc not Created";
            }
        }
        else
        {
            echo "Email already taken";
        }
    }

    public static function login($params = [])
    {
        var_dump(self::check($params['email']));

    }

    public static function session()
    {
        if(!isset($_SESSION['loggedin']))
        {
            header('Location: ./login.php');
        }
    }

    public static function user()
    {
        if(isset($_SESSION['loggedin']))
        {
            echo $_SESSION['loggedin'];
        }
    }

}
