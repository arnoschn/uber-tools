<?php
class Uber_ActiveRecord_Table_Factory
{
    public static function createType($type, PDO $pdo)
    {
        switch(strtolower($type)) {
            case 'mysql':
                return new Uber_ActiveRecord_Table_Mysql($pdo);
                break;
            default:
                throw new Uber_ActiveRecord_Exception(strtr('Unsupported table type %type',array('%type'=>$type)));
        }
    }
}
?>