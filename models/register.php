<?php
    require_once("../controllers/connect.php");
    $_SESSION["error"] = "";
    
    // if user reached page via GET (as by clicking a link or via redirect)
    if ($_SERVER["REQUEST_METHOD"] == "GET")
    {
        // to show login page
        render("../public_html/register_form.php",["conn" => $conn]);
    }

    // else if user reached page via POST (as by submitting a form via POST)
    else if ($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require_once("../controllers/connect.php");
        $stat = mysqli_query($conn,"INSERT  INTO details (email, fname, coll,  pass, gen)
                VALUES('".$_POST["email"]."','".$_POST["fname"]."','".$_POST["coll"]."','".$_POST["password"]."',
                '".$_POST["gender"]."')");
        mysqli_close($conn);
        if (!$stat)
        {
            $_SESSION["error"] = "User with this email already exists";
            render("register_form.php");
        }
        else
        {
            $_SESSION["email"] = $_POST["email"];
            $_SESSION["fname"] = $_POST["fname"];
            redirect('../public_html/portfolio.php');
            exit;
        }
    }

?>
