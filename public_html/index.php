<!DOCTYPE html>
<html>
    <head>
        <title>
            index
        </title>
        <style>
            body  
            {
                background-image: url("images/background-pattern.jpg");
            }
        </style>
    </head>
    <body>
        <h4>
            <?php
                if(isset($msg))
                {
                    echo $msg;
                }
            ?>
        </h4>
        <a href="login_form.php">click here to sign in</a><br>
        <a href="../models/store.php">Go to store</a><br>
    </body>
</html>