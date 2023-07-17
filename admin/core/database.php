<?php
class Database
{
    public $host = "localhost";
    public $username = "root";
    public $password = "";
    public $dbname = "hachitechsolution";
    public $conn;
    public function __construct()
    {
        $this->connectDB();
    }
    function connectDB()
    {
        $this->conn = new mysqli($this->host, $this->username, $this->password, $this->dbname);
        if ($this->conn->connect_error) {
            die("Connection error" . $this->conn->connect_error);
        }

    }
    function GetAll($table)
    {
        $query = "SELECT * FROM " . $table . " ";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        return $list;
    }
    public function Get($table, $where)
    {
        $condition = "";
        $list = array();
        foreach ($where as $key => $val) {
            $condition .= $key . "='" . $val . "' AND ";
        }
        $condition = substr($condition, 0, -5);

        $query = "SELECT * FROM " . $table . " WHERE " . $condition . " ";
        $result = mysqli_query($this->conn, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $list[] = $row;
        }
        return $list;
    }

    function View($table)
    {
        $query = "SELECT * FROM " . $table . "";
        $result = mysqli_query($this->conn, $query);
        $list = array();
        while ($data = mysqli_fetch_array($result)) {
            $list[] = $data;
        }
        return $list;
    }

    function Insert($table, $fields)
    {
        $insert = "INSERT INTO " . $table . "(" . implode(",", array_keys($fields)) . ") 
                    VALUES('" . implode("','", array_values($fields)) . "')";
        $result = mysqli_query($this->conn, $insert);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }
    function Update($table, $fields, $where)
    {
        $keys = "";
        $condition = "";
        foreach ($fields as $key => $val) {
            $keys .= $key . "= '" . $val . "', ";
        }
        $keys = substr($keys, 0, -2);

        foreach ($where as $key => $val) {
            $condition .= $key . "= '" . $val . "' AND ";
        }
        $condition = substr($condition, 0, -5);
        $update = "UPDATE " . $table . " SET " . $keys . " WHERE " . $condition . " ";
        $result = mysqli_query($this->conn, $update);
        if ($result) {
            return true;
        } else {
            return false;
        }
    }

    function Delete($table, $where)
    {
        $condition = "";
        foreach ($where as $key => $val) {
            $condition .= $key . "= '" . $val . "' AND ";
        }
        $condition = substr($condition, 0, -5);

        $delete = "DELETE FROM " . $table . " WHERE " . $condition . " ";
        $result = mysqli_query($this->conn, $delete);
        if ($result) {
            return true;
        } else {
            return false;
        }

    }

}
?>