<?php

class DB {
    private $host = 'localhost';
    private $user = 'root';
    private $pass = '';
    public function connect($db) {
        return mysqli_connect($this->host, $this->user, $this->pass, $db);
    }
}

$db = new DB;
$db_con = $db->connect('todo_db');
?>