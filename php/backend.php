<?php
namespace Waithira\Phpemailverification\php;
use Waithira\Phpemailverification\php\Database;
class Backend
{
    public Database $database;
    public function __construct(Database $database)
    {
        $this->database = $database;
    }
    public static function check()
    {
        
    }
}