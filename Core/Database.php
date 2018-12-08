<?php
namespace Core;
use PDO;

class Database{
    private static $_instance = null;
    private $_conn, $_query, $_error = false, $_result, $_count = 0, $_lastInsertID = null;

    private function __construct() {
        try{
            $this->_conn = new PDO('mysql:host=' . DB_HOST . ';dbname=' . DB_NAME, DB_USER, DB_PASS);
            $this->_conn->exec("set names utf8");
        }catch(PDOException $e) {
            die($e->getMessage());
        }
    }

    public static function getInstance() {
        if(!isset(self::$_instance)) {
            self::$_instance = new Database();
        }
        return self::$_instance;
    }

    public function run($sql, $params = []) {
        $this->_error = false;
        if($this->_query = $this->_conn->prepare($sql)){
            $x = 1;
            if(count($params)) {
                foreach($params as $param) {
                    $this->_query->bindValue($x, $param);
                    $x++;
                }
            }

            if($this->_query->execute()) {
                $this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
                $this->_lastInsertID = $this->_conn->lastInsertId();
            }else{
                $this->_error = true;
            }
        }

        return $this;

    }

    public function _read($tables, $params) {
        $sql = "SELECT ";
        if(array_key_exists("select", $params)) {
            $sql .= $params['select'] ." ";
        }else{
            $sql .= "* ";
        }

        $sql .= "FROM " . $tables ." ";

        if(array_key_exists("where", $params)) {
            $sql .= "WHERE " .  $params["where"] ." ";
        }

        if(array_key_exists("order", $params)) {
            $sql .="ORDER BY " . $params["order"] ." ";
        }

        if(array_key_exists("limit", $params)) {
            $sql .="LIMIT " . $params["limit"] ." ";
        }

        $sql = trim($sql);

        if(DEBUG_DATABASE) {
            dnd($sql);
        }

        if($this->_query = $this->_conn->prepare($sql)) {
            if($this->_query->execute()) {
                $this->_result = $this->_query->fetchAll(PDO::FETCH_ASSOC);
                $this->_count = $this->_query->rowCount();
                return true;
            }
            return false;
        }
        return false;
    }

    public function selectFirst($tables, $params = []) {
        if($this->_read($tables, $params)) {
            return $this->getFirst();
        }
        return false;
    }

    public function select($tables, $params = []) {

        if($this->_read($tables, $params)) {
            return $this->getResults();
        }
        return false;
    }

    public function insert($table, $fields = []) {
        $fieldString = "";
        $valueString = "";
        $values = [];

        foreach($fields as $field => $value) {
            $fieldString .= $field . ",";
            $valueString .= "?,";
            array_push($values, $value);
        }

        $fieldString = rtrim($fieldString, ",");
        $valueString = rtrim($valueString, ",");

        $sql = "INSERT INTO {$table} ({$fieldString}) VALUES ({$valueString})";

        if(DEBUG_DATABASE) {
            dnd($sql);
        }

        if(!$this->run($sql, $values)->getError()) {
            return true;
        }
        return false;
    }

    public function update($table, $key, $id, $fields) {
        $fieldString = "";
        $values = [];
        foreach($fields as $field => $value) {
            $fieldString .= " " . $field . " = ?,";
            array_push($values, $value);
        }

        $fieldString = trim($fieldString);
        $fieldString = rtrim($fieldString, ",");

        $sql = "UPDATE {$table} SET {$fieldString} WHERE {$key} = {$id}";

        if(!$this->run($sql, $values)->getError()) {
            return true;
        }
        return false;
    }

    public function delete($table, $key, $id) {
        $sql = "DELETE FROM {$table} WHERE {$key} = {$id}";
        if(!$this->run($sql)->getError()) {
            return true;
        }
        return false;
    }

    public function getResults() {
        return $this->_result;
    }

    public function getFirst() {
        return (!empty($this->_result)) ? $this->_result[0] : [];
    }

    public function getCount() {
        return $this->_count;
    }

    public function getRowCount($tables, $params) {
        $sql = "SELECT COUNT(*) FROM {$tables}";
        if(array_key_exists("where", $params)) {
            $where = $params['where'];
            $sql .= " WHERE $where";
        }

        $result = $this->_conn->prepare($sql);
        $result->execute();
        return $result->fetchColumn();
    }

    public function getLastID() {
        return $this->_lastInsertID;
    }

    public function getColumns($table) {
        return $this->run("SHOW COLUMNS FROM {$table}")->getResults();
    }

    public function getError() {
         return $this->_error;
    }
}

 ?>
