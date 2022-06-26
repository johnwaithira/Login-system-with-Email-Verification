<?php
require_once "./PHPMailer/Exception.php";
require_once "./PHPMailer/SMTP.php";
require_once "./PHPMailer/PHPMailer.php";

use PHPMailer\PHPMailer\SMTP;
use PHPMailer\PHPMailer\PHPMailer;
use PHPMailer\PHPMailer\Exception;

class Mailer
{
    public static function email($params = [])
    {
        $mail = new PHPMailer(true);

        try
        {
            $mail->isSMTP();
            $mail->Host =  "smtp.office365.com"; # in my case am using microsoft account
            $mail->SMTPAuth = true;
            $mail->Username = "[ENTER EMAIL]";
            $mail->Password = "[ENTER YOUR PASSWORD]";
            $mail->SMTPSecure = "STARTTLS"; # For microsoft account
        }
        catch(Exception $e)
        {
            echo $mail->ErrorInfo;

        }
    }

}