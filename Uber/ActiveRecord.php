<?php

class Uber_ActiveRecord implements ArrayAccess
{

    private $_rawAttributes = array();

    private $_parsedAttributes = array();

    public $tableName = null;

    public $dbType = null;

    /**
     * @var Uber_ActiveRecord_Table_Abstract
     */
    protected $_table;
    
    /**
     * @var Uber_Event_Dispatcher
     */
    protected $_eventDispatcher;
    /**
     * 
     *
     * @var PDO
     */
    protected $_pdo;

    
    public function save()
    {
    
    }

    public function find($conditions)
    {
    
    }

    public function update($conditions)
    {
    
    }

    public function destroy()
    {
    
    }

    public function delete($conditions)
    {
    
    }

    
    /**
     * Gets values from $this->_rawAttributes
     * and parses datatypes just-in-time instead of parsing
     * all data while retrieving it
     *
     */
    public function get($name)
    {
        if (! $this->_table->columnExists($name)) {
            throw new Uber_ActiveRecord_Exception(strtr('Column %name does not exist in table %table', array('%name' => $name , '%table' => $this->getTableName())));
        }
        if (isset($this->_rawAttributes[$name])) {
            $this->_eventDispatcher->triggerEvent(new Uber_ActiveRecord_Event(),$this->_rawAttributes[$name]);
        }
        return null;
    }

    /**
     * Sets values into $this->_parsedAttributes
     * 
     *
     */
    public function set($name, $value)
    {
    
    }

    /**
     * INTERNALS
     */
    /**
     * 
     * @throws Uber_ActiveRecord_Exception
     */
    public final function __construct()
    {
        try {
            $this->_initPdo();
        } catch (PDOException $pdoException) {
            throw new Uber_ActiveRecord_Exception(strtr('PDO Connection failed with error: %error', array('%error' => $pdoException->getMessage())));
        }
        $this->_initTable();
        $this->_initEvents();
    }

    /**
     * 
     * @throws PDOException
     * @throws Uber_ActiveRecord_Exception
     */
    private function _initPdo()
    {
        $dsn = $this->_getDsn();
        $dbUsername = $this->_getDbUsername();
        $dbPassword = $this->_getDbPassword();
        $this->_pdo = new PDO($dsn, $dbUsername, $dbPassword);
    }

    /**
     * @throws Uber_ActiveRecord_Exception
     *
     */
    protected function _initTable()
    {
        $this->_table = Uber_ActiveRecord_Table_Factory::createType($this->_getDbType(), $this->_pdo);
    }
    
    protected function _initEvents()
    {
        $this->_eventDispatcher=Uber_Event_Dispatcher::getInstance();
    }

    protected function _getDsn()
    {
        if (empty($this->dsn)) {
            throw new Uber_ActiveRecord_Exception(strtr('No dsn set for table %table', array('%table' => $this->getTableName())));
        }
        return $this->dsn;
    }

    protected function _getDbType()
    {
        if (! isset($this->dbType)) {
            throw new Uber_ActiveRecord_Exception(strtr('No dbType set for table %table', array('%table' => $this->getTableName())));
        }
        return $this->dbType;
    }

    protected function _getDbUsername()
    {
        if (! isset($this->dbUsername)) {
            throw new Uber_ActiveRecord_Exception(strtr('No username set for table %table', array('%table' => $this->getTableName())));
        }
        return $this->dbUsername;
    }

    protected function _getDbPassword()
    {
        if (! isset($this->dbPassword)) {
            throw new Uber_ActiveRecord_Exception(strtr('No password set for table %table', array('%table' => $this->getTableName())));
        }
        return $this->dbPassword;
    }
    
    /**
     * @return Uber_ActiveRecord_Table_Abstract
     */
    public function &getTable()
    {
        return $this->_table;
    }

    public function getTableName()
    {
        if (empty($this->tableName)) {
            throw new Uber_ActiveRecord_Exception(strtr('No tableName set for Uber_ActiveRecord %model', array('%model' => __CLASS__)));
        }
        return $this->tableName;
    }

    /**
     * ArrayAccess to column definitions
     * 
     * Uber_ActiveRecord['name'] = 'Max Mustermann';
     * Uber_ActiveRecord->save();
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