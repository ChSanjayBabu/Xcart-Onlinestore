<?php
    
    $_SESSION["error"] = "";
    require("../controllers/connect.php");
    // if user reached page via GET (as by clicking a link or via redirect)
    if(isset($_SESSION["stat"]))
    {
        if($_SESSION["stat"] == "logged")
        {
             redirect('../public_html/portfolio.php');
             exit(0);
        }
    }
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // to show login page
        render("login_form.php");
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require_once("../controllers/connect.php");
            if($_POST["status"] == "logged")
            {
                $_SESSION["stat"] = "logged";
            }
            else
            {
                $_SESSION["stat"] = "";
            }
            $num = "";
            $mail = "";
            if(is_numeric($_POST["mail_ph"]))
            {
                $num = $_POST["mail_ph"];
            }
            else
            {
                $mail = $_POST["mail_ph"];
            }
            // query database for user
            if($num == "")
            {
                $result = mysqli_query($conn,"SELECT * FROM details WHERE email = '".$mail."'");
            }
            else
            {
                $result = mysqli_query($conn,"SELECT * FROM details WHERE ph_no = '".$num."'");
            }
            
            $Row = mysqli_fetch_array($result);
            // if we found user, check password
            if($Row !== NULL)
            {
                // compare hash of user's input against hash that's in database
                if ($_POST["password"] == $Row["pass"])
                {
                    // remember that user's now logged in by storing user's ID in session
                    $_SESSION["email"] = $Row["email"];
                    $_SESSION["fname"] = $Row["fname"];
                    redirect('../public_html/portfolio.php');
                    exit(0);
                }
                else
                {
                    $_SESSION["error"] = "wrong password<br>";
                    render("login_form.php");
                    
                }
            }
            else
            {
                $_SESSION["error"] = "account doen't exist".$_POST["mail_ph"].$_POST["password"].$mail.$num;
                render("login_form.php");
            }
    }
?>