

<?php

include('header.php');
include_once("../Model/muser.php");
include_once("../Model/mcomment.php");
$user = new Model_User();
$comment = new Model_Comment();
$allComment = $comment->getMyComment();

$allUser = $user->getUser($_SESSION['user_id']);
include_once("../View/edituser.html");
?>

