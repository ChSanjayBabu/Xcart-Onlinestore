<!DOCTYPE html>
<html>
    <head>
        <title>
            Dashboard
        </title>
        <link rel="stylesheet" href="../public_html/css/store.css">
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
        <style type="text/css">
            body
            {
                background-image: url("../public_html/images/<?=$back_grd?>") ;
                -moz-background-size: cover;
                -webkit-background-size: cover;
                background-size: 1280px 700px;
                background-position: top center;
                background-repeat: no-repeat;
                background-attachment: fixed;
                
            }
            
        </style>
    </head>
    <?php
        session_start();
    ?>
    <body onload = "func()">

        <h1><?php
                    if($_SERVER['PHP_SELF'] == "/public_html/portfolio.php")
                    {
                        echo "Welcome,".$_SESSION["fname"];
                    }
                ?></h1><br>
        <a id = 'sell' style="color: #665851;text-decoration: none;font-weight: 900;font-size: 18px;padding-right: 20px;"href="../models/sell.php">sell item</a><br>