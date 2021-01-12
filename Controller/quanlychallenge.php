

<?php

include('header.php');
include_once("../Model/mchallenge.php");
$challenge = new Model_Challenge();


if (isset($_POST['submitUpbai'])) {
    $target_dir = "../uploads/challenge/";
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
            $goiy = $_POST['goiy'];
            $challenge->createChallenge($goiy, $target_file);

            include_once("../View/quanlychallenge.html");
        } else {
            echo "Loi khong the upload.";
        }
    }
} elseif (isset($_POST['dapan'])) {
    $dapan = "../uploads/challenge/" . $_POST['dapan'] . ".txt";
    //echo $dapan;
    $allChallenge = $challenge->getFile($_POST['challenge_id']);
    if ($allChallenge != "") {
        while ($row = $allChallenge->fetch_assoc()) {
            if ($row['tenfilechallenge'] == $dapan) {
                echo 'dung roi';
                $fh = fopen($dapan, 'r');
                while ($line = fgets($fh)) {
                    echo($line);
                }
                fclose($fh);
            } else {
                echo 'Khong dung';
            };
        }
    }
} else {

    $allChallenge = $challenge->getAllChallenge();
    include_once("../View/quanlychallenge.html");
}
?>

