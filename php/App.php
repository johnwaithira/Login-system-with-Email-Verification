<?php
require_once __DIR__."/db.php";
require_once __DIR__."/SMTP.php";
session_start();
class App
{
    public static Database $db;
    public static Mailer $mailer;

    public function __construct()
    {
        self::$db = new Database();
    }

    public static function header()
    {
        echo '
        <!DOCTYPE html>
        <html lang="en">
        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <link rel="stylesheet" href="http://127.0.0.1/shoetailor/ke/css/style.css">
        </head>
        <body>
        ';
    }

    public static function otp($params =[])
    {

        $query = self::$db->conn->prepare("SELECT * FROM userotp where user_id = ?");
        $query->execute([$params['user_id']]);

        $otp = rand(100000, 999999);

        if($query->rowCount() < 1)
        {
            $statement = self::$db->conn->prepare(
            "INSERT INTO userotp (user_id, otp)
             VALUES (?, ?)");
             $statement->execute([$params['user_id'], $otp]);
        }
        else
        {
            $statement = self::$db->conn->prepare(
                "UPDATE userotp set otp = ? where user_id = ?"
            );
            $statement->execute([$params['user_id'], $otp]);
        }
        $data = [
            'otp' => $otp,
            'username' => $params['username'], 
            'email' => $params['email'] 
        ];
       
        if(Mailer::email($data))
        {
            header('Location: ./login.php');
        }
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
                $data = [
                    'username' => $username,
                    'user_id' => $user_id,
                    'email' => $params['email']
                ];
               self::otp($data);
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
            
           if($cred['password'] == $params['password'])
           {
                $_SESSION['loggedin'] = $cred['username'];
                $_SESSION['user'] = $cred['user_id'];
                header('Location: ./index.php');
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

    public static function details()
    {
        $statement = self::$db->conn->prepare("SELECT * FROM users where user_id = ?");
        $statement->execute([$_SESSION['user']]);
        $data = $statement->fetch();

        if($data['verified'] == 0)
        {
            $status = "not verified";
        }
        else{
            $status = "not verified .<a href='./verify.php?email='". $data['email']."''>Verify</a>";
        }
        $details = '
           <div class="p-t-20">
                <p class="p-5-0"><strong>Email</strong> :'. $data['email'] .'</p>
                <p class="p-5-0"><strong>Status</strong> :'. $status .'</p>
           </div>
        ';
        echo $details;
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

    public static function logout()
    {
        session_destroy();
        header('Location: ./login.php');
    }

}
