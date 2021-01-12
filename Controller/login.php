<?php

include('header.php');
include_once("../Model/muser.php");

//1. Declaration

class Login {

    public function invoke() {

        if (isset($_POST['uname']) AND isset($_POST['psw'])) {
            $user = new Model_User();
            $permission = $user->checkUser($_POST['uname'], $_POST['psw']);

            if ($permission != "") {
                echo $_SESSION['username'];

                if ($permission == 1) {
                    echo 'giao vien';
                    header('Location: ../index.php');
                } elseif ($permission == 0) {
                    echo 'sinh vien';
                    header('Location: ../index.php');
                }
            } else {
                echo 'dang nhap that bai';
            }
        } elseif (isset($_POST['uname']) or isset($_POST['psw'])) {
            printf($_POST['uname']);
            printf($_POST['psw']);
            echo 'Nhap day du thong tin';
        } else {
            include_once("../View/login.html");
        }
    }

}

;


//////////////////////////////////////
//2. Process

$login = new Login();
$login->invoke();
include('footer.php');
