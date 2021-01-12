<?php

include_once("modelqlhs.php");
include_once ("dbconnect.php");

class Model_Comment {

    public function __construct() {
        
    }

    public function updateComment($u_user_id, $u_comment) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {

            $sql = "SELECT * FROM comment WHERE user_id_1='" . $_SESSION["user_id"] . "' and user_id_2='$u_user_id'";
            $results = mysqli_query($con, $sql);
            $n_row = mysqli_num_rows($results);

            $row = $results->fetch_array(MYSQLI_ASSOC);

            if (mysqli_num_rows($results) == 0) {

                $sql = "INSERT INTO comment(comment_id,user_id_1, user_id_2,comment) VALUES (null, '" . $_SESSION["user_id"] . "','$u_user_id','$u_comment')";
                $result = mysqli_query($con, $sql);
                return $result;
            } else {

                $comment_id = $row['comment_id'];
                $sql = "UPDATE comment SET comment = '$u_comment' WHERE comment_id='$comment_id'";
                $result = mysqli_query($con, $sql);
                return $result;
            }
        }
    }

    public function getMyComment() {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM comment,user WHERE user_id_2=" . $_SESSION["user_id"] . " AND comment.user_id_1=user.user_id";
            //echo $sql;
            $results = mysqli_query($con, $sql);

            if ($results->num_rows > 0) {
                return $results;
            } else {
                return "";
            }
        }
    }

    public function getComment($u_user_id) {
        $dbConnection = new Connection();
        $con = $dbConnection->checkConnection();
        if ($con != "") {
            $sql = "SELECT * FROM comment WHERE user_id_2='$u_user_id' AND user_id_1=" . $_SESSION["user_id"];

            $results = mysqli_query($con, $sql);

            $row = $results->fetch_array(MYSQLI_ASSOC);

            if ($results->num_rows > 0) {
                return $row["comment"];
            } else {
                return "";
            }
        }
    }

}

?>