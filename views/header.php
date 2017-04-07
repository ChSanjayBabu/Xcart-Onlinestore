<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <style>
            body  
            {
                background-image: url("../images/<?= $back_grd?>");
            }
        
        </style>        
    </head>
    <?php
        session_start();
    ?>
    <body>
        <h1>Welcome,<?= $_SESSION["fname"] ?></h1><br>
        <a href="sell.php">sell item</a><br>