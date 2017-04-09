<?php
    require("../views/header.php");
    if(isset($_SESSION["msg"]))
    {
        $msg = $_SESSION["msg"];
    }
    else
    {
        $msg = "";
    }
?>
        <a href="../models/store.php">Go to store</a><br>
        <a href="../public_html/logout.php">logout</a><br>
        <div>
            <?php
                echo $msg;
                $_SESSION["msg"] = "";
            ?>
        </div>

    </body>
</html>