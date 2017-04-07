<!DOCTYPE html>
<html>
    <head>
        <title>login</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <?php 
            session_start();
        ?>
        <script>/*global $*/
            function formvalid()
            {
                var num = 0;
                document.getElementById("error").innerHTML = "";
                var x = "";
                if(document.getElementsByName("email")[0].value == "")
                {
                    x = x+"You must provide your email<br>";
                    document.getElementById("error").innerHTML = x;
                    num++;
                }
                if(document.getElementsByName("password")[0].value == "")
                {
                    x = x+"password mustn't be empty<br>";
                    document.getElementById("error").innerHTML = x;
                    num++;
                }
                if(num != 0)
                {
                    return false;
                }
            }
        </script>
    </head>
    <body>

        <form method="post" action = "../models/login.php" onsubmit="return formvalid()">
            <input type="email" placeholder="enter email" name="email"><br/>
            <input type ="password" placeholder ="enter password" name="password"><br/>
            <div id = "error">
                <?= $_SESSION["error"] ?>
            </div>
            <input type = "submit" value = "login"> or <a href="../models/register.php">register</a><br>
        </form>
    </body>
</html>