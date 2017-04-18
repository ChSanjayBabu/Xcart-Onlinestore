<?php    
    $host = "localhost";
    $user = "sanjay_ch";
    $pass = "3vXt73bGW7mEcGnI";    
    
    // requirementsiololl
    require("helpers.php");
    
    // enable sessions
    session_start();
    
    // require authentication for all pages except /login.php, /logout.php, and /register.php
    if (!in_array($_SERVER["PHP_SELF"], ["/models/login.php", "/public_html/logout.php",
            "/models/register.php","/models/store.php"]))
    {
        if (empty($_SESSION["email"]))
        {
            logout();
            redirect("login.php");
        }
    }

    $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) 
    {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project2');
?>