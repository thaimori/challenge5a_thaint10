

<?php

include('header.php');
include_once("../Model/muser.php");
$user = new Model_User();
$allUser = $user->getUser($_SESSION['user_id']);
include_once("../View/edituser.html");
?>

