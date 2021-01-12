<?php

class Connection {

    public $host = "challege5athaint10.000webhostapp.com"; // Host name 
    public $username = "id15890420_root"; // Mysql username 
    public $password = "q%M[t~)(^et4|D4^"; // Mysql password 
    public $dbname = "id15890420_qlhs"; // Database name 

    public function checkConnection() {
// Connect to server and select databse.
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->dbname, "3308");

        if (!$con) {
            die('Connect Error (' . mysqli_connect_errno() . ') '
                    . mysqli_connect_error());
            return "";
        }

        //echo 'Success... ' . mysqli_get_host_info($con) . "\n";
        return $con;
    }

}

?>