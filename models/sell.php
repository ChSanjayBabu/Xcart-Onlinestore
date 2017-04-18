<?php
    require("../controllers/connect.php");
    $_SESSION["error"] = "";
    if($_SERVER["REQUEST_METHOD"] == "POST")
    {
        $target = "../public_html/uploads/".basename($_FILES['img']['name']);
        $img = $_FILES['img']['name'];
        move_uploaded_file($_FILES['img']['tmp_name'],$target);
        $Coll = mysqli_query($conn,"SELECT coll FROM details WHERE email = '".$_SESSION["email"]."'");
        $coll = mysqli_fetch_array($Coll);

        $err = mysqli_query($conn,"INSERT INTO `items`(`cat`, `title`, `describe`, `cont_info`, `choice`, `price`, `img`, `coll`,`fname`)
            VALUES('".$_POST["category"]."','".$_POST["title"]."','".$_POST["desc"]."',
            '".$_POST["contact"]."','".$_POST["choice"]."','".$_POST["price"]."','$img',
            '".$coll["coll"]."','".$_SESSION["fname"]."')");
        mysqli_close;
        $_SESSION["msg"] = "Your item details have been successfully posted<br>please visit store to view details";
        redirect('../public_html/portfolio.php');
        exit;
        
    }
    else
    {
        render("sell_form.php");
    }
?>