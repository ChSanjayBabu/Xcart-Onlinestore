<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <title>Register</title>
        <script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>    	
    	<!-- Google Fonts -->
    	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    
    	<link rel="stylesheet" href="../public_html/css/style_register.css">
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
                    num = num +1;
                }
                if (x != y)
                {
                    error = error+"password doen't match<br>";
                    num = num +1;
                }
                if(document.getElementsByName("coll")[0].value == "select college")
                {
                    error = error+"please select college";
                    num = num + 1;
                }
                document.getElementById("error").innerHTML = error;
                
                if(num !== 0)
                {
                    return false;
                }
                
            }
        </script>
    </head>
    <body>

        <form method="post" action = "../models/register.php" onsubmit="return formvalid()">
            <div class="container">
        		<div class="top">
        			<h1 id="title" class="hidden">Xcart</h1>
        		</div>
        		<div class="login-box animated fadeInUp">
        			<div class="box-header">
        				<h3>Register</h3>
        			</div>
                <input type="email" placeholder="enter email" name="email" required><br/>
                <input type="text" placeholder="fname" name="fname" required><br/>
                <?php
                    require("../controllers/config.php");
                    $colleges = mysqli_query($conn,"SELECT coll FROM colleges");
                ?>
                <select name="coll">
                        <option selected="selected" disabled="disabled">select college</option>
                    <?php  foreach($colleges as $coll): ?>
                        <option value = "<?= $coll["coll"] ?>"><?= $coll["coll"]?></option>
                    <?php endforeach ?>
                </select><br/>
                <input type ="password" placeholder ="enter password" name="password" required><br/>
                <input type ="password" placeholder ="retype password" name="confirm"required ><br/>
                Gender<input type="radio" name="gender" value="male" required> Male
                      <input type="radio" name="gender" value="female" required> Female<br>
                <div id = "error">
                    <?= $_SESSION["error"] ?>
                </div>
            	<div id = "sub">
    			    <button  type="submit">Register</button>
    			</div>
        </form>
    </body>
</html>