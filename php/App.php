<?php
require_once __DIR__."/db.php";
class App
{
    public static Database $db;
    public function __construct()
    {
        self::$db = new Database();
    }
    public static function check()
    {
      var_dump( self::$db->conn);
    }
}