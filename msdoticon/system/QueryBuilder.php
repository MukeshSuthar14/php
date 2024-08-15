<?php

class QueryBuilder {

    private $lastQuery = "";
    private $connection = null;
    private $query = "";
    private $select = "";
    private $from = "";
    private $where = "";
    private $groupBy = "";
    private $orderBy = "";

    public function __construct(){
        if (DB_CONNECTION) $this->connect(DB_DRIVER);   
    }

    public function connect($driver) {
        if ($driver == "mysql") {
            try { 
                $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS, DB_NAME); 
            }
            catch(mysqli_sql_exception $e) {
                $this->connection = new mysqli(DB_HOST, DB_USER, DB_PASS);
                mysqli_query($this->connection, "CREATE DATABASE " . DB_NAME . ";");
                $this->connection->select_db(DB_NAME);
            }
        } else if ($driver == "sqllite") {
            $this->connection = new SQLite3(DB_NAME, SQLITE3_OPEN_CREATE, ENCRYTION_KEY);
        }
    }

    public function select($coloum = []){
        if(is_array($coloum)){
            $this->select = (!empty($coloum) ? implode(', ',$coloum) : '*');
        } else if(is_string($coloum)) {
            $this->select = (!empty($coloum) ? $coloum : '*');
        }
        return $this;
    }

    public function table($tableName){
        $this->from = $tableName;
        return $this;
    }

    public function get($tableName = '', $coloum = [], $where = [], $like = []){

        if(empty($tableName)){
            $result = $this->connection->query($this->query);
            $this->lastQuery = $this->query;
            $this->query = '';
            if( !empty($result) ){
                return mysqli_fetch_all($result, MYSQLI_ASSOC);
            }
        }

        $this->query = 'SELECT '.(!empty($coloum)?implode(', ',$coloum):'*');
        $this->query .= 'FROM '.$tableName;
        if(!empty($where)){
            foreach($where as $key => $value){
                if(false){

                } else {
                    $this->query .= ' '.$key.' = "'.$value.'",';
                }
            }
        }
        $this->query = rtrim($this->query, ',');
        $result = $this->connection->query($this->query);
        $this->lastQuery = $this->query;
        $this->query = '';
        if( !empty($result) ){
            return mysqli_fetch_all($result, MYSQLI_ASSOC);
        }
    }

    public function onlyOne($tableName = '', $coloum = [], $where = [], $like = []){

        if(empty($tableName)){
            $result = $this->connection->query($this->query);
            $this->lastQuery = $this->query;
            $this->query = '';
            if( !empty($result) ){
                return mysqli_fetch_assoc($result);
            }
        }

        $this->query = 'SELECT '.(!empty($coloum)?implode(', ',$coloum):'*');
        $this->query .= ' FROM '.$tableName;
        if(!empty($where)){
            $this->query .= ' WHERE ';
            foreach($where as $key => $value){
                if(false){

                } else {
                    $this->query .= ' '.$key.' = "'.$value.'",';
                }
            }
        }
        $this->query = rtrim($this->query, ',');
        $result = $this->connection->query($this->query);
        $this->lastQuery = $this->query;
        $this->query = '';
        if( !empty($result) ){
            return mysqli_fetch_assoc($result);
        }
    }

    public function lastQuery(){
        echo $this->lastQuery;
    }

    public function query(){
        echo $this->query;
    }

}