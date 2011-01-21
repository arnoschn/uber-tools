<?php

interface Uber_ActiveRecord_Table_Interface
{
    public function addColumn($name, $type, $signed = null, $length = false, $defaultValue = 'NULL', $canBeNull = true, $isPrimaryKey = false, $extras = '');
    
    public function removeColumn($name);
    
    public function modifyColumn($name, $type, $signed = null, $length = false, $defaultValue = 'NULL', $canBeNull = true, $isPrimaryKey = false, $extras = '');
    
    public function drop();
    
    public function dropIfExists();
    
    public function create();
    
    public function createIfNotExists();
    
    public function exists();
    
    public function columnExists();
    
    public function hasChanges();
    
    public function save();
    
    public function getPhpValueFor($column,$rawValue);
    
    public function getDbValueFor($column,$phpValue);
    
    public function getColumnNames();
    
    public function joinTableFooWithBar($joinMethod, $fooTable,$barTable,$fooAlias,$barAlias,$joinConditions=array());
    
}
?>