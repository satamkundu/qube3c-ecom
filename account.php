<!DOCTYPE html>
<html>
<head>
	<title>Create Account</title>
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
					<form class="quabe-form" action="account.php" method="post">
						<p class="text-center heading-account">Create your <strong>Qube3c</strong> Account</p>
						<!-- <p class="required-field" style="color: red;">* required field</p> -->
						<div class="form-group"> 
							<input type="text" class="form-control"  name="c_name" placeholder="Enter Name" required> 
						</div>						
						<div class="form-group"> 
							<input type="email" class="form-control" name="c_email" placeholder="Email" required> 
						</div>
						<div class="form-group pass_show"> 							
							<input type="password" class="form-control" id="pass" name="c_pass" placeholder="Create a password" required> 
							<p id="pass_type"></p>
						</div> 
						<!-- <div class="form-group pass_show"> 
							<input type="password" class="form-control" id="con_pass" placeholder="Confirm password" required> 
						</div>  -->
						<!-- <div class="form-group mb-4">
							<input type="checkbox" id="signed-in" class="checkbox-custom" checked="checked">
							<label for="signed-in" class="label-check">Keep me <a href="#sign">Signed in</a><br><span class="pl-5">Uncheck if using public device</span></label>
						</div> -->
						<!-- <div class="form-group">
							<input type="checkbox" id="offer-special" class="checkbox-custom" checked="checked">
							<label for="offer-special" class="label-check">Email About rollbacks,special pricing,hot new<br><span class="pl-5"> items, gift and others</span></label>
						</div>
							<p>By Clicking Create Account, you aknowledge you have read and agreed our <a href="#term">Terms of use</a> and <a href="#policy">Privacy Policy</a>.</p> -->
						<div class="form-group"> 
							<button class="form-control account-btn" name="register">Create account</button>
						</div>
					</form>
					<div class="already-account text-center mt-5">
						<p>Already have an account?</p>
						<div class="form-group"> 
						<a href="login.php"><button class="form-control sign-in-btn">Sign in</button></a>
					</div>
					</div>
				</div>
				<div class="col-sm-12 col-lg-4 col-md-12"></div>
			</div>
		</div>
	</div>
	
	<?php include_once 'includes/footer.php'; ?>
</body>
</html>

<script>
$(document).ready(function(){
	$("#pass").keyup(function(){
		check_pass();
	});
});

function check_pass() {
	var val=document.getElementById("pass").value;
	var no=0;

	if(val!=""){
		// If the password length is less than or equal to 6
		if(val.length<=6)no=1;

		// If the password length is greater than 6 and contain any lowercase alphabet or any number or any special character
		if(val.length>6 && (val.match(/[a-z]/) || val.match(/\d+/) || val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)))no=2;

		// If the password length is greater than 6 and contain alphabet,number,special character respectively
		if(val.length>6 && ((val.match(/[a-z]/) && val.match(/\d+/)) || (val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/)) || (val.match(/[a-z]/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))))no=3;

		// If the password length is greater than 6 and must contain alphabets,numbers and special characters
		if(val.length>6 && val.match(/[a-z]/) && val.match(/\d+/) && val.match(/.[!,@,#,$,%,^,&,*,?,_,~,-,(,)]/))no=4;

  		if(no==1){
			document.getElementById("pass_type").style.color="red";
			document.getElementById("pass_type").innerHTML="Very Weak";
  		}

		if(no==2){
			document.getElementById("pass_type").style.color="#F5BCA9";
			document.getElementById("pass_type").innerHTML="Weak";
		}

		if(no==3){
			document.getElementById("pass_type").style.color="#FF8000";
			document.getElementById("pass_type").innerHTML="Good";
		}

		if(no==4){
			document.getElementById("pass_type").style.color="#00FF40";
			document.getElementById("pass_type").innerHTML="Strong";
		}
 	}else{
		document.getElementById("pass_type").innerHTML="";
 	}
}
</script>

<?php
if(isset($_POST['register'])){		
	include_once 'functions/functions.php';
	$c_name = $_POST['c_name'];
	$c_email = $_POST['c_email'];
	$c_pass = $_POST['c_pass'];
	$c_ip = getRealUserIp();	
	$get_email = "select * from customers where customer_email='$c_email'";
	$run_email = mysqli_query($con,$get_email);
	$check_email = mysqli_num_rows($run_email);

	if($check_email == 1){
		echo "<script>alert('This email is already registered, try another one')</script>";
		exit();
	}

	$customer_confirm_code = mt_rand();
	$subject = "Email Confirmation Message";
	$from = "no-reply@qube3c.com";
	$message = "
	<h2>
	Email Confirmation By staging.qube3c.com $c_name
	</h2>
	<a href='https://staging.qube3c.com/confirm_email.php?$customer_confirm_code'>
	Click Here To Confirm Email
	</a>
	";
	$headers = "From: $from \r\n";
	$headers .= "Content-type: text/html\r\n";
	mail($c_email,$subject,$message,$headers);
	$insert_customer = "insert into customers (customer_name,customer_email,customer_pass,customer_ip,customer_confirm_code) values ('$c_name','$c_email','$c_pass','$c_ip','$customer_confirm_code')";
	$run_customer = mysqli_query($con,$insert_customer);
	$sel_cart = "select * from cart where ip_add='$c_ip'";
	$run_cart = mysqli_query($con,$sel_cart);
	$check_cart = mysqli_num_rows($run_cart);

	if($check_cart>0){
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You have been Registered Successfully')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}else{
		$_SESSION['customer_email']=$c_email;
		echo "<script>alert('You have been Registered Successfully')</script>";
		echo "<script>window.open('index.php','_self')</script>";
	}	
}
?>