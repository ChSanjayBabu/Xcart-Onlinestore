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
        <a href="logout.php">logout</a><br>
        <div>
            <?= $msg ?>
        </div>

    </body>
</html>