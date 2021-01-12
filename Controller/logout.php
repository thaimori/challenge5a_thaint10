<?php

include('header.php');
include_once("../Model/muser.php");

$user = new Model_User();
$user->delSession();
header('Location: ../index.php');
include('footer.php');
