<?php 
    $host = "localhost";
    $user = "sanjay_ch";
    $pass = "3vXt73bGW7mEcGnI";
    $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) 
    {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project2');
?>
               