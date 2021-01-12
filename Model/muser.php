<?php

include_once("modelqlhs.php");
include_once ("dbconnect.php");

class Model_User {

    public function __construct() {
        
    }

    public function checkUser($u_username, $u_password) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM user WHERE username='$u_username' and password='$u_password'";

            $results = mysqli_query($con, $sql);

            if ($results->num_rows > 0) {
                $row = $results->fetch_assoc();
                $this->storeSession($row["user_id"],$row["username"],$row["fullname"],$row["email"],$row["phone"],$row["permission"]);
                return $row["permission"];
            } else {
                return "";
            }
        }
    }
    
    public function getAllUser() {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM user";

            $results = mysqli_query($con, $sql);
            
            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }

        public function getUser($_user_id) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM user WHERE user_id='$_user_id'";

            $results = mysqli_query($con, $sql);
            
            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }
    
    public function updateUser($_user_id,$_username, $_fullname, $_password, $_email, $_phone, $_comment) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "UPDATE user SET fullname='$_fullname', password='$_password', username='$_username', email='$_email', phone='$_phone', comment='$_comment' WHERE user_id='$_user_id'";

            $results = mysqli_query($con, $sql);

            return $results;
        }
    }

    public function storeSession($_user_id,$_username, $_fullname, $_email, $_phone,$_permission) {
        $_SESSION['user_id'] = $_user_id;
        $_SESSION['username'] = $_username;
        $_SESSION['fullname'] = $_fullname;
        $_SESSION['email'] = $_email;
        $_SESSION['phone'] = $_phone;
        $_SESSION['permission'] = $_permission;
    }

    public function delSession() {
        unset($_SESSION['user_id']);
        unset($_SESSION['username']);
        unset($_SESSION['fullname']);
        unset($_SESSION['email']);
        unset($_SESSION['phone']); 
        unset($_SESSION['permission']);
    }

}

?>