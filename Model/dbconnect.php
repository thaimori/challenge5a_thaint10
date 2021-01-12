<?php

class Connection {

    public $host = "localhost"; // Host name 
    public $username = "root"; // Mysql username 
    public $password = ""; // Mysql password 
    public $dbname = "qlhs"; // Database name 
    
    
    public function checkConnection() {
// Connect to server and select databse.
        $con = mysqli_connect($this->host, $this->username, $this->password, $this->dbname, "3306");

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