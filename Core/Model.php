<?php
namespace Core;
use Core\Database;

class Model {

    private $_db, $_tables, $_modelName, $_softDelete = false, $_columnNames = [];
    public $id, $key;

    public function __construct($tables = null) {
        $this->_db = Database::getInstance();
        $this->_tables = $tables;
    }

    protected function select($params = []) {
        return $this->_db->select($this->_tables, $params);
    }

    protected function getCount() {
        return $this->_db->getCount();
    }

    protected function getRowCount($params = []) {
        return $this->_db->getRowCount($this->_tables, $params);
    }

    protected function selectFirst($params = []) {
        return $this->_db->selectFirst($this->_tables, $params);
    }

    protected function insert($fields) {
        $this->_tables = explode(" ", $this->_tables);
        $this->_tables = $this->_tables[0];
        return $this->_db->insert($this->_tables, $fields);
    }

    protected function update($key, $value, $fields) {
        $this->_tables = explode(" ", $this->_tables);
        $this->_tables = $this->_tables[0];
        return $this->_db->update($this->_tables, $key, $value, $fields);
    }

    protected function delete($key, $value) {
        $this->_tables = explode(" ", $this->_tables);
        $this->_tables = $this->_tables[0];
        return $this->_db->delete($this->_tables, $key, $value);
    }

    protected function getLastInsert() {
        return $this->_db->getLastID();
    }

}

 ?>
