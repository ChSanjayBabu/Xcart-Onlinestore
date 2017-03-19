<?php
    // for using $_SESSION["error"]
    session_start();
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // to show login page
        require("login_form.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        // validate submission
        if (empty($_POST["email"]))
        {
            //we can use $_SESSION["error"] to change to div in login_page so it displays error
            $_SESSION["error"] = "You must provide your username.";
            require("login_form.php");
        }
        else if (empty($_POST["password"]))
        {
            $_SESSION["error"] ="You must provide your password";
            require("login_form.php");
        }
        else
        {
            require("connect.php");
            // query database for user
            $rows = mysqli_query($conn,"SELECT * FROM project2 WHERE email = '{$_POST["email"]}'");
    
            // if we found user, check password
            if (count($rows) == 1)
            {
                // first (and only) row
                $row = $rows[0];
    
                // compare hash of user's input against hash that's in database
                if ($_POST["password"] == $row["pass"])
                {
                    // remember that user's now logged in by storing user's ID in session
                    $_SESSION["email"] = $row["email"];
    
                    // redirect to portfolio
                    header("Location: portfolio.php");
                    exit;
                }
            }
    
            // else apologize
            else
            {
                $_SESSION["error"] = "Invalid username and/or password.";
                require("login_form.php");
            }
        }
    }

?>
