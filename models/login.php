<?php
    
    $_SESSION["error"] = "";
    require("../controllers/connect.php");
    // if user reached page via GET (as by clicking a link or via redirect)

    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // to show login page
        render("login_form.php");
    }
    
    // else if user reached page via POST (as by submitting a form via POST)
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
            // query database for user
            $result = mysqli_query($conn,"SELECT * FROM details WHERE email = '".$_POST["email"]."'");
            
            $Row = mysqli_fetch_array($result);
            // if we found user, check password
            if($Row != NULL)
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
                $_SESSION["error"] = "account doen't exist";
                render("login_form.php");
            }
    }
?>