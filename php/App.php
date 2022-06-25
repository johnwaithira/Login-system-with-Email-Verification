<?php
require_once __DIR__."/db.php";
class App
{
    public Database $db;
    public function __construct()
    {
        $this->db = new Database();
    }
    public function check()
    {
      var_dump( $this->db);
    }
}