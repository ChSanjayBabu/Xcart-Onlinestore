<?php
    session_start();
    $_SESSION["error"] = "";
    unset($_SESSION["msg"]);
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        require("connect.php");
        $target = "images/".basename($_FILES['image']['name']);
        $img = $_FILES['image']['name'];
        move_uploaded_file($_FILES['image']['tmp_name'],$target);
        $Coll = mysqli_query($conn,"SELECT coll FROM details WHERE email = '".$_SESSION["email"]."'");
        $coll = mysqli_fetch_array($Coll);

        $err = mysqli_query($conn,"INSERT INTO `items`(`cat`, `title`, `describe`, `cont_info`, `choice`, `price`, `img`, `coll`)
            VALUES('".$_POST["category"]."','".$_POST["title"]."','".$_POST["desc"]."',
            '".$_POST["contact"]."','".$_POST["choice"]."','".$_POST["price"]."','$img',
            '".$coll["coll"]."')");
        $_SESSION["msg"] = "Your item details have been successfully posted<br>please visit store to view details";
        header('Location:portfolio.php');
        exit;
        
    }
    else
    {
        require("sell_form.php");
    }
?>