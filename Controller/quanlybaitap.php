

<?php
include('header.php');
include_once("../Model/mbaitap.php");
include_once("../Model/mnopbaitap.php");
$baitap = new Model_Baitap();
$nopbaitap = new Model_NopBaiTap();


if (isset($_POST['submitUpbai'])) {
    $target_dir = "../uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);
    $nopbaiOk = 1;
    $imageFileType = strtolower(pathinfo($target_file, PATHINFO_EXTENSION));

// Check if file already exists
    if (file_exists($target_file)) {
        echo "File da ton tai.";
        $nopbaiOk = 0;
    }

    if ($_FILES["fileToUpload"]["size"] > 500000) {
        echo "File qua to";
        $nopbaiOk = 0;
    }

    if ($imageFileType != "pdf") {
        echo "Upload dinh dang pdf";
        $nopbaiOk = 0;
    }

    if ($nopbaiOk == 0) {
        echo "Loi khong the upload";
    } else {
        if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
            echo "Bai tap " . htmlspecialchars(basename($_FILES["fileToUpload"]["name"])) . " da duoc upload.";
            $ngaytao = date("h:i:sa"). " ".date("Y.m.d");
            $tenbaitap = $_POST['tenbaitap'];
            $baitap->createBaitap($tenbaitap,$_SESSION['user_id'],$target_file,$ngaytao);
            $allBaitap = $baitap->getAllBaitap();
            include_once("../View/quanlybaitap.html");
        } else {
            echo "Loi khong the upload.";
        }
    }
} elseif (isset($_POST['submitNopbai'])) {
    echo $_FILES["filenop"]["error"];
    $target_dir2 = "../uploads/nopbai/";
    $target_file2 = $target_dir2 . basename($_FILES["filenop"]["name"]);
    echo $target_file2;
    $nopbaiOk = 1;
    $imageFileType2 = strtolower(pathinfo($target_file2, PATHINFO_EXTENSION));

// Check if file already exists
    if (file_exists($target_file2)) {
        echo "File da ton tai 2.";
        $nopbaiOk = 0;
    }

    if ($_FILES["filenop"]["size"] > 500000) {
        echo "File qua to";
        $nopbaiOk = 0;
    }

    if ($imageFileType2 != "pdf") {
        echo "Upload dinh dang pdf 2";
        $nopbaiOk = 0;
    }

    if ($nopbaiOk == 0) {
        echo "Loi khong the upload";
    } else {
        if (move_uploaded_file($_FILES["filenop"]["tmp_name"], $target_file2)) {
            echo "Nop bai tap " . htmlspecialchars(basename($_FILES["filenop"]["name"])) . " thanh cong.";
            $ngaynop = date("h:i:sa"). " ".date("Y.m.d");
            $baitap_id = $_POST['user_id'];
            echo $baitap_id;
            $nopbaitap->createNopBaitap($_SESSION['user_id'],$baitap_id, $target_file2,$ngaynop);
            //$allBaitap = $baitap->getAllBaitap();
            //include_once("../View/quanlybaitap.html");
        } else {
            echo "Loi khong the upload 2.";
        }
    }
} else {
    $allBaitap = $baitap->getAllBaitap();
    $allNopBaitap = $baitap->getAllBaitap_Nopbai();
    include_once("../View/quanlybaitap.html");
}
?>

