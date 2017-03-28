<?php
    session_start();
    
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // to show login page
        require("login_form.php");
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $num = 0;
        // validate submission
        if(empty($_POST["email"]))
        {
            //we can use $_SESSION["error"] to change to div in login_page so it displays error
            echo "You must provide your email<br>";
            $num++;
        }
        if(empty($_POST["password"]))
        {
            echo "You must provide your password";
            $num++;
        }
        if($num == 0)
        {

            require("connect.php");
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
                    header('Location: portfolio.php');
                    exit;
                }
                else
                {
                    echo "wrong password<br>";
                }
            }
    
            // else apologize
            else
            {
                echo "email doesn't exist<br>";
            }
        }
    }

?>
