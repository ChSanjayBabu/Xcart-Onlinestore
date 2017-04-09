<?php 
    $host = "localhost";
    $user = "parth242";
    $pass = "3vXt73bGW7mEcGnI";
    $conn = mysqli_connect($host,$user,$pass);
    if (!$conn) 
    {
    die('Could not connect: ' . mysql_error());
    }
    $db = mysqli_select_db($conn,'project2');
?>
               