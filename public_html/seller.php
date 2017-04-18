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
				<div class="text">Seller details</div>
				<div class="logsign">
					<b><a class="header-signup" href="../models/store.php">Visit Store</a></b>
				</div>
			</div>
			<?php
			    $details = mysqli_query($conn,"SELECT * FROM items where img = '".$_GET["img"]."'");
			    $detail = mysqli_fetch_array($details);
			    if($detail["choice"] == "donate")
			    {
			        $price ="free of cost";
			    }
			    else
			    {
			        $price = $detail['price'];
			    }
			?>
            <div style="color : #FFFFFF;text-align:left;padding :6px">
                <img style="padding :6px"width="250" height="250" src = "../public_html/uploads/<?= $detail['img'] ?>"/><br/>
                <h3 style="display:inline;">Title : </h3> <?= $detail['title'] ?><br/>
                <h3 style="display:inline;">Seller : </h3 ><?= $detail['fname'] ?><br/>
                <h3 style="display:inline;">From : </h3 ><?= $detail['coll'] ?><br/>
                <h3 style="display:inline;">Price : </h3 ><?= $price ?><br/>
                <h3 style="display:inline;">Item descripton : </h3 ><?= $detail['describe'] ?><br/>
                <h3 style="display:inline;">Contact details : </h3 ><?= $detail['cont_info'] ?><br/>
                
            </div>
		</body>
	</html>
	