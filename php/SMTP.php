<?php
require_once __DIR__."/PHPMailer/Exception.php";
require_once __DIR__."/PHPMailer/SMTP.php";
require_once __DIR__."/PHPMailer/PHPMailer.php";

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public function __construct()
    {
        
    }
    public static function email($params = [])
    {
        
        $link = "http://localhost:3000/verify.php?email=?".$params['email']."&otp=". $params['otp'];
        
        $mail = new PHPMailer(true);
        $subject = "OTP Verification code";
        $body = 'Hello '. $params['username'].',<br>'.
                'Your otp code is ' . $params['otp'].
                '<br> <a href="'.$link.'"> Verify</a>'
                ;


        try
        {
            $mail->isSMTP();
            $mail->Host =  "smtp.office365.com"; # in my case am using microsoft account
            $mail->SMTPAuth = true;
            $mail->Username = "SENDER EMAIL";
            $mail->Password = "SENDER EMAIL PASSWORD";
            $mail->SMTPSecure = "STARTTLS"; # For microsoft account
            $mail->Port = 587; # this differs depending on the service provider
            $mail->setFrom('some_coder_ke@outlook.com', 'Developer');
            $mail ->addAddress($params['email']);
            $mail ->addReplyTo('some_coder_ke@outlook.com', 'Developer'); 
            $mail->isHTML(true);
            $mail ->Subject = $subject;
            $mail ->Body = $body;
            $mail ->send();

            return true;

        }
        catch(Exception $e)
        {
            echo "<pre>";
            var_dump($e);
            echo "</pre>";

        }
    }

}
