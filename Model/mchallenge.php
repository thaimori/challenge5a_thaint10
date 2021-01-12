<?php

include_once("modelqlhs.php");
include_once ("dbconnect.php");

class Model_Challenge {

    public function __construct() {
        
    }

    public function getAllChallenge() {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM challege";

            $results = mysqli_query($con, $sql);

            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }

    public function getFile($_challenge_id) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            //$sql = "SELECT * FROM baitap,nopbaitap WHERE baitap.baitap_id=nopbaitap.baitap_id AND nopbaitap.user_id=".$_SESSION['user_id'];
            $sql = "SELECT * FROM challege WHERE challenge_id=".$_challenge_id;

            //echo $sql;

            $results = mysqli_query($con, $sql);

            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }
    public function createChallenge($_goiy, $_filename) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();

        if ($con != "") {
            $sql = "INSERT INTO challege(challenge_id,tenfilechallenge,goiy) VALUES (null,'$_filename','$_goiy')";
            //echo $sql;

            $results = mysqli_query($con, $sql);

            return $results;
        }
    }

}

?>