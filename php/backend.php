<?php
namespace Waithira\Phpemailverification\php;
use Waithira\Phpemailverification\php\Database;
class Backend
{
    public Database $database;
    public function __construct()
    {
        $this->database =new Database();
    }
    public function check()
    {
        var_dump($this->database);
    }
}