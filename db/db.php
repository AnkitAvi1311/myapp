<?php

// class required for the connection
class Database {
    // requisites for the connection and connection exceptions
    private $conn;
    private $connect_error;
    private $error;

    // constructor function to make the connection to the server
    public function __construct($servername, $username, $password, $dbname=""){
        if(!empty($dbname)){
            $this->conn = mysqli_connect($servername, $username, $password,$dbname);
        }else{
            $this->conn = mysqli_connect($servername, $username, $password);
        }
        if(!$this->conn){
            $this->connect_error = mysqli_connect_error();
        }else{
            $this->connect_error = false;
        }
    }

    // getter method to retrieve the connect error and others error
    public function __get($name) {
        return $this->$name;
    }

    // making a query
    public function makeQuery($sql) {
        if(!mysqli_query($this->conn,$sql)){
            $this->error = mysqli_error($this->conn);
            return false;
        }else{
            return true;
        }
    }
}