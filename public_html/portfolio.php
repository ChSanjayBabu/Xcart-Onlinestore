<?php
    session_start();
    if(isset($_SESSION["msg"]))
    {
        $msg = $_SESSION["msg"];
    }
    else
    {
        $msg = "";
    }
?>
<!DOCTYPE html>
	<html>
	    <?php require("../controllers/config.php"); ?>
		<head>
			<title>Seller</title>
			<link href="css/index.css" rel="stylesheet" type="text/css"/>
		</head> 
		<body>
			<div class="header-wrapper">
				<div class="header-icon"><img src="images/Shopping-Cart.jpg" style="width:70px; height:60px;"/></div>
				<div class="text">Welcome <?= $_SESSION["fname"] ?></div>
				<div class="logsign">
					<b><a class="header-login" href="../models/sell.php">Sell Items</a></b>
					<i><span class="text-gray">or</span></i>
					<b><a class="header-signup" href="../models/store.php">Visit Store</a></b>
				</div>
			</div>
						<div class="msg">
				 <h2>
		            <?php
                        echo $msg;
                        $_SESSION["msg"] = "";
                    ?>
	             </h2>
				<div>
	
					<p class="para">Bored of the used items? upload on Xcart and gather money for your new product</p>
				</div>
				<div class="decor">
                 ================================================================
				</div>
			</div>
		</body>
	</html>
	