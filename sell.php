<?php
    session_start();
    if(isset($_POST["submit"]))
    {
        require("connect.php");
        $target = "images/".basename($_FILE['image']['name']);
        $name = $_FILE['image']['name'];
        move_uploaded_file($_FILE['image']['temp_name'],$target);
        
        $coll = mysqli_query($conn,"SELECT from details(coll) WHERE email = '".$_SESSION["email"]."'");
        mysqli_query($conn,"INSERT INTO items(cat, title, describe, cont_info, choice, price, img, coll)
            VALUES('".$_POST["category"]."','".$_POST["title"]."','".$_POST["desc"]."',
            '".$_POST["contact"]."','".$_POST["choice"]."','".$_POST["price"]."','".$name."',
            '".$coll["coll"]."')");
        
            
    }
?>