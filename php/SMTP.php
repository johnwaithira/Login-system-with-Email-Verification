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

        }
        catch(Exception $e)
        {

        }
    }

}