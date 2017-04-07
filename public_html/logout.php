<?php

    // configuration
    require("../controllers/connect.php"); 

    // log out current user, if any
    logout();
    
    render("index.php",["msg" => "You have succesfully Logged out"])
?>


    