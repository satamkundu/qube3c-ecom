<?php session_start(); ?>
<!DOCTYPE html>
<html>
<head>
	<title>Login Qube3c</title>
	<meta charset="utf-8">
	<?php include_once 'includes/top.php'; ?>
</head>
<body>
	<?php include_once 'includes/header.php'; ?>
	<div class="page px-lg-5 py-5">
		<div class="container">
			<div class="row">
				<div class="col-sm-12 col-lg-4 col-md-12"></div>
				<div class="col-sm-12 col-lg-4 col-md-12">
					<form class="quabe-form" action="login.php" method="POST">
						<p class="text-center heading-account"><strong>Sign in Qube3c Account</strong></p>
					
						<div class="form-group"> 
							<input type="email" name="c_email" class="form-control" placeholder="Email adrress (required)" required> 
						</div>
						<div class="form-group pass_show"> 
							<input type="password" name="c_pass" class="form-control" placeholder="Password (required)" required> 
						</div>
						<p class="text-right"><a href="#pass">Forget Password?</a> 
						<!-- <div class="form-group mb-4">
							<input type="checkbox" id="signed-in" class="checkbox-custom" checked="checked">
							<label for="signed-in" class="label-check">Keep me <a href="#sign">Signed in</a><br><span class="pl-5">Uncheck if using public device</span></label>
						</div> -->
						<div class="form-group"> 
						<button class="form-control account-btn" name="login">Sign in</button>
					</div>
					</form>
					<div class="already-account text-center mt-5">
						<p>Don't have an account?</p>
						<div class="form-group"> 
						<a href="account.php"><button class="form-control sign-in-btn">Create account</button></a>
					</div>
					</div>
				</div>
			</div>
		</div>
	</div>
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>
<?php
if(isset($_POST['login'])){
	include_once 'functions/functions_1.php';
	include_once 'includes/db.php';
	$customer_email = $_POST['c_email'];
	$customer_pass = $_POST['c_pass'];
	$select_customer = "select * from customers where customer_email='$customer_email' AND customer_pass='$customer_pass'";
	$run_customer = mysqli_query($con,$select_customer);
	$get_ip = getRealUserIp();
	$check_customer = mysqli_num_rows($run_customer);
	$select_cart = "select * from cart where ip_add='$get_ip'";
	$run_cart = mysqli_query($con,$select_cart);
	$check_cart = mysqli_num_rows($run_cart);
	if($check_customer==0){
		echo "<script>alert('password or email is wrong')</script>";
	exit();
	}
	if($check_customer==1 AND $check_cart==0){
		$_SESSION['customer_email']=$customer_email;
		echo "<script>alert('You are Logged In')</script>";
		echo "<script>window.open('my_account.php?my_orders','_self')</script>";
	}
	else {
		$_SESSION['customer_email']=$customer_email;
		echo "<script>alert('You are Logged In')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	} 
}
?>