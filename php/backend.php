<?php
require_once "./db.php";
class Backend
{
    
    public function __construct()
    {
        $this->database =new Database();
    }
    public function check()
    {
        var_dump($this->database);
    }
}