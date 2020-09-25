<!DOCTYPE html>
<html>
	<head>
		<title>Checkout</title>
		<meta charset="utf-8">
		<?php include_once 'includes/top.php'; ?>	
	</head>
	<body>
		<?php include_once 'includes/header.php'; ?>
		<?php
			if(!isset($_SESSION['customer_email'])){
				include("login.php");
			}else{
				//include("payment_options.php");
			}
		?>
		<?php include_once 'includes/footer.php'; ?>
	</body>
	</html>