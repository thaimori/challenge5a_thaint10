

<?php

include('header.php');
include_once("../Model/muser.php");
$user = new Model_User();
//echo $_POST['comment'];
if (isset($_POST['fname']) AND isset($_POST['psw']) AND isset($_POST['psw2']) AND isset($_POST['uname'])) {
    if ($_POST['psw2'] == $_POST['psw']) {

        $updateUser = $user->updateUser($_POST['uid'], $_POST['uname'], $_POST['fname'], $_POST['psw'], $_POST['email'], $_POST['phone'], $_POST['comment']);
        if ($updateUser != 0) {
            $allUser = $user->getAllUser();
            
            include_once("../View/quanlyhocsinh.html");
        }
    } else {
        echo "password khong trung nhau";
    }
} elseif (isset($_GET['uid'])) {
    $allUser = $user->getUser($_GET['uid']);
    include_once("../View/edituser.html");
} elseif (isset($_SESSION['username'])) {
    $allUser = $user->getAllUser();
    include_once("../View/quanlyhocsinh.html");
}

include("footer.php");

