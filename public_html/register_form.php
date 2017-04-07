<!DOCTYPE html>
<html>
    <head>
        <title>register</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
        <script>/*global $*/
            function formvalid()
            {
                var x = document.getElementsByName("password")[0].value;
                var y = document.getElementsByName("confirm")[0].value;
                var len = x.length;
                console.log(len);
                var num = 0;
                var error = "";
                if (len < 6 || len > 30)
                {
                    error = error+"password must be between 6 to 30 characters<br>";
                    num++;
                }
                if (x != y)
                {
                    error = error+"password doen't match";
                    num++;
                }
                document.getElementById("error").innerHTML = error;
                if(num != 0)
                {
                    return false;
                }
                
            }
        </script>
    </head>
    <body>

        <form method="post" action = "../models/register.php" onsubmit="return formvalid()">
            <input type="email" placeholder="enter email" name="email" required><br/>
            <input type="text" placeholder="fname" name="fname" required><br/>
            <?php
                require("../controllers/connect.php");
                $colleges = mysqli_query($conn,"SELECT coll FROM colleges");
            ?>
            <select name="coll">
                    <option selected="selected" disabled="disabled">select college</option>
                <?php  foreach($colleges as $coll): ?>
                    <option value = "<?= $coll["coll"] ?>"><?= $coll["coll"]?></option>
                <?php endforeach ?>
            </select><br/>
            <input type ="password" placeholder ="enter password" name="password" required><br/>
            <input type ="password" placeholder ="retype password" name="confirm" required><br/>
            Gender<input type="radio" name="gender" value="male" required> Male
                  <input type="radio" name="gender" value="female" required> Female<br>
            <div id = "error">
                <?= $_SESSION["error"] ?>
            </div>
            <input type = "submit" value = "register"><br/>
        </form>
    </body>
</html>