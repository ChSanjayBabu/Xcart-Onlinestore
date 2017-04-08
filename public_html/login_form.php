<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
    	<title>Log In</title>
    	
    	<!-- Google Fonts -->
    	<link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700|Lato:400,100,300,700,900' rel='stylesheet' type='text/css'>
    
    	<link rel="stylesheet" href="../public_html/css/style.css">
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

    <form action = "../models/login.php" method = "post" onsubmit="return formvalid()">
    	<div class="container">
    		<div class="top">
    			<h1 id="title" class="hidden">Xcart</h1>
    		</div>
    		<div class="login-box animated fadeInUp">
    			<div class="box-header">
    				<h2>Log In</h2>
    			</div>
    			<label for="email">EMAIL</label>
    			<br/>
    			<input type="email"  name="email">
    			<br/>
    			<div id = "error_user" type="hidden"></div>
    			<label for="password">PASSWORD</label>
    			<br/>
    			<input type="password" name="password">
    			<br/>
    			<div id = "error">
                    <?php
                        echo $_SESSION["error"];
                        $_SESSION["error"] = "";
                        unset($_SESSION["error"]);
                    ?>
            	</div>
    			<button type="submit">Log In</button> or  <a href="../models/register.php"> register</a>
    		</div>
    	</div>
    </form>
    </body>
</html>