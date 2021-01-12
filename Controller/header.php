<?php session_start();?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <title>QLHS</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>


        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
    </head>
    <body>
        <nav class="navbar navbar-inverse">
            <div class="container-fluid">
                <div class="navbar-header">
                    <a class="navbar-brand" href="http://localhost/qlhs">QLHS</a>
                </div>
                <ul class="nav navbar-nav">
                    <li class="active"><a href="#">Home</a></li>
                     <?php 
                     
                    if (isset($_SESSION['permission']))
                    {
                        
                        if ($_SESSION['permission']==1)
                        {


                        ?>
                    <li><a href="http://localhost/qlhs/Controller/quanlyhocsinh.php">Quan ly hoc sinh</a></li>
                    <li><a href="http://localhost/qlhs/Controller/quanlybaitap.php">Quan ly bai tap</a></li>
                    <li><a href="#">Challenge</a></li>
                <?php } else {
                    ?>
                    <li><a href="http://localhost/qlhs/Controller/quanlybaitap.php">Quan ly bai tap</a></li>
                    <li><a href="#">Challenge</a></li>
                    <?php
                }

            } ?>
                    <li><a href="http://localhost/qlhs/Controller/viewinfo.php">Xem thong tin</a></li>
                </ul>
                <ul class="nav navbar-nav navbar-right">
                    <?php 
                     
                    if (isset($_SESSION['permission']))
                    {
                        
                        if ($_SESSION['permission']==1)
                        {


                        ?>
                    <li><a>Giao vien, <?php echo $_SESSION['fullname']; ?></a></li>
                <?php } else {
                    ?>
                    <li><a>Hoc sinh, <?php echo $_SESSION['fullname']; ?></a></li>
                    <?php
                }

            } ?>
            
                    <?php 

                    if (isset($_SESSION['username']))
                        {
                            ?>
                            <li><a href="http://localhost/qlhs/Controller/logout.php"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
                            <?php

                        } else {
                            ?>
                            <li><a href="http://localhost/qlhs/Controller/login.php"><span class="glyphicon glyphicon-log-in"></span> Login</a></li>
                            <?php
                        }

                    ?>


                    
                    
                </ul>
            </div>
        </nav>
        <div class="container">

