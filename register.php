<?php
    // for using $_SESSION["error"]
    session_start();
    $_SESSION["error"] = "";
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // to show login page
        require("register_form.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require("connect.php");
        $stat = mysqli_query($conn,"INSERT  INTO details (email, fname, coll,  pass, gen)
                VALUES('".$_POST["email"]."','".$_POST["fname"]."','".$_POST["coll"]."','".$_POST["password"]."',
                '".$_POST["gender"]."')");
        if (!$stat)
        {
            $_SESSION["error"] = "User with this email already exists";
            require("register_form.php");
        }
        else
        {
            $_SESSION["email"] = $_POST["email"];
            header('Location: portfolio.php');
            exit;
        }
    }

?>
