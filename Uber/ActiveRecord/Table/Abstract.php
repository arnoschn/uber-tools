<?php

abstract class Uber_ActiveRecord_Table_Abstract implements Uber_ActiveRecord_Table_Interface, Serializable, ArrayAccess
{
    /**
     * @var PDO
     */
    protected $_pdo;
    
    public final function __construct(PDO $pdo)
    {
        $this->_pdo = $pdo;
    }
    /**
     * ArrayAccess to column definitions
     * 
     * Uber_ActiveRecord->table['id']['type'] = 'integer';
     * Uber_ActiveRecord->table->save();
     */
    public function offsetSet($offset, $value)
    {
    
    }

    public function offsetExists($offset)
    {
    
    }

    public function offsetUnset($offset)
    {
    
    }

    public function offsetGet($offset)
    {
    
    }
}
?>