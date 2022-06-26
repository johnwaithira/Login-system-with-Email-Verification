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

        $body = 'Hello '. $params[''];

        try
        {
            $mail->isSMTP();
            $mail->Host =  "smtp.office365.com"; # in my case am using microsoft account
            $mail->SMTPAuth = true;
            $mail->Username = "[ENTER EMAIL]";
            $mail->Password = "[ENTER YOUR PASSWORD]";
            $mail->SMTPSecure = "STARTTLS"; # For microsoft account
            $mail->Port = 587; # this differs depending on the service provider
            $mail->setFrom('[EMAIL]', '[NAME]');
            $mail ->addAddress($params['email']);
            $mail ->addReplyTo('[EMAIL]', '[NAME]'); 
            $mail->isHTML(true);
            $mail ->Subject = $subject;
            $mail ->Body = $body;
            $mail ->send();

        }
        catch(Exception $e)
        {
            echo $mail->ErrorInfo;

        }
    }

}