<?php

include_once("modelqlhs.php");
include_once ("dbconnect.php");

class Model_Baitap {

    public function __construct() {
        
    }

    public function getAllBaitap() {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM baitap";

            $results = mysqli_query($con, $sql);
            
            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }
    
    public function getAllBaitap_Nopbai() {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM baitap JOIN nopbaitap ON baitap.baitap_id = nopbaitap.baitap_id";
            //echo $sql;

            $results = mysqli_query($con, $sql);
            
            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }
    
    public function updateUser($_user_id,$_username, $_fullname, $_password, $_email, $_phone) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "UPDATE user SET fullname='$_fullname', password='$_password', username='$_username', email='$_email', phone='$_phone' WHERE user_id='$_user_id'";

            $results = mysqli_query($con, $sql);

            return $results;
        }
    }

    public function createBaitap($_tenbaitap,$_user_id,$_filename,$_ngaytao) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        
        if ($con != "") {
            $sql = "INSERT INTO baitap(baitap_id,tenbaitap,user_id,filename,ngaytao) VALUES (null,'$_filename','$_user_id','$_tenbaitap','$_ngaytao')";

            $results = mysqli_query($con, $sql);

            return $results;
        }
    }

}



?>