

<?php

include('header.php');
include_once("../Model/mcomment.php");
include_once("../Model/muser.php");
$comment = new Model_Comment();
$user = new Model_User();
//echo $_POST['comment'];
if (isset($_POST['comment'])) {

    $updateComment = $comment->updateComment($_POST['uid'], $_POST['comment']);
    $allUser = $user->getAllUser();
    include_once("../View/quanlyuser.html");
} elseif (isset($_GET['uid'])) {
    $allUser = $user->getUser($_GET['uid']);
    $comment = $comment->getComment($_GET['uid']);
    include_once("../View/viewinfo.html");
} elseif (isset($_SESSION['username'])) {
    $allUser = $user->getAllUser();
    include_once("../View/quanlyuser.html");
}

include("footer.php");

