<!DOCTYPE html>
	<html>
		<head>
			<title>Xcart</title>
			<link href="css/index.css" rel="stylesheet" type="text/css"/>
		</head> 
		<body>
			<div class="header-wrapper">
				<div class="header-icon"><img src="images/Shopping-Cart.jpg" style="width:70px; height:60px;"/></div>
				<div class="text">Welcome to Xcart (... a smart startup)</div>
				<div class="logsign">
					<b><a class="header-login" href="../models/login.php">Log In</a></b>
					<i><span class="text-gray">or</span></i>
					<b><a class="header-signup" href="../models/store.php">Visit Store</a></b>
				</div>
			</div>
			<div class="msg">
						 <h2>
							<?php
									session_start();
				                    echo $_SESSION["msg"];
				                    unset($_SESSION["msg"]);
			                ?>
			             </h2>
						<div>
							<h1 class="head">Built for Students</h1>
							<p class="para">An ecommerce platform aiming at introducing college students to the world of ecommerce. Put things up for bidding, buy stuff from other students. As simple as that !</p>
						</div>
						<div class="decor">
                         ==========================================================================================================
						</div>
			</div>
		</body>
	</html>
	