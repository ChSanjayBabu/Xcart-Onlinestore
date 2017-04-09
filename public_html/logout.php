<?php

    // configuration
    require("../controllers/connect.php"); 

    // log out current user, if any
    logout();
    session_start();
    $_SESSION["msg"] = "You have logged out succesfully";
    redirect("index.php");
    exit(0);
?>


    