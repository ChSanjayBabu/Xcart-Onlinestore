<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <style type="text/css">
            body
            {
                background-image: url("../public_html/images/<?=$back_grd?>") ;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                background-size: cover;
                background-position: top center !important;
                background-repeat: no-repeat !important;
                background-attachment: fixed;
            }
            
        </style>
    </head>
    <?php
        session_start();
    ?>
    <body>

        <h1>Welcome,<?= $_SESSION["fname"] ?></h1><br>
        <a href="sell.php">sell item</a><br>