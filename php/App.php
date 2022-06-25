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
    
    public static function user_data($email)
    {
        $statement = self::$db->conn->prepare("SELECT * FROM users where email = ?");
        $statement->execute([$email]);

        return $statement->fetch();
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
       if(!self::check($params['email']))
       {
            $cred = self::user_data($params['email']);
            // echo "<pre>";
            // var_dump($cred);
            // echo "</pre>";
           if($cred['password'] == $params['password'])
           {
                echo "Logged in successfully";
           }
           else
           {
            echo "Wrong password";
           }

        }
       else
       {
        echo 0;
       }
       
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
