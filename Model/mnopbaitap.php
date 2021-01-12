<?php

include_once("modelqlhs.php");
include_once ("dbconnect.php");

class Model_NopBaitap {

    public function __construct() {
        
    }

    public function createNopBaitap($_baitap_id, $_user_id, $_filename, $_ngaynop) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        $check = "SELECT * FROM nopbaitap WHERE user_id='$_user_id' AND baitap_id='$_baitap_id'";
        $results_check = mysqli_query($con, $check);
        $row = $results_check->fetch_array(MYSQLI_ASSOC);

        echo mysqli_num_rows($results_check);

        if ($con != "") {
            if (mysqli_num_rows($results_check) == 0) {
                $sql = "INSERT INTO nopbaitap(nopbaitap_id,user_id, baitap_id, filenopbaitap,ngaynop) VALUES (null, '$_user_id','$_baitap_id','$_filename','$_ngaynop')";
                $results = mysqli_query($con, $sql);
                return $results;
            } else {
                $nopbaitap_id = $row['nopbaitap_id'];
                $sql = "UPDATE nopbaitap SET filenopbaitap='$_filename',ngaynop='$_ngaynop' WHERE nopbaitap_id='$nopbaitap_id'";
                $results = mysqli_query($con, $sql);
                return $results;
            }
        }
    }

    public function getNopBaitap($_baitap_id) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        $check = "SELECT * FROM nopbaitap,user WHERE baitap_id='$_baitap_id' AND nopbaitap.user_id=user.user_id";
        $results_check = mysqli_query($con, $check);
        return $results_check;
    }

}

?>