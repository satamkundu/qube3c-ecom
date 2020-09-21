<?php
    session_start();
    include("includes/db.php");
    // if(!isset($_SESSION['admin_email'])){
    //     echo "<script>window.open('seller-panel.php','_self')</script>";
    // }else{
?>

<!DOCTYPE html>
<html>
	<head>
		<title>Seller Panel Qube3c</title>
		<meta charset="utf-8">
	  	<meta name="viewport" content="width=device-width, initial-scale=1">
	  	<style type="text/css">
	  		@import url(https://fonts.googleapis.com/css?family=Roboto:300);
			.login-page {
			  width: 360px;
			  padding: 8% 0 0;
			  margin: auto;
			}
			.form {
			  position: relative;
			  z-index: 1;
			  background: #FFFFFF;
			  max-width: 360px;
			  margin: 0 auto 100px;
			  padding: 45px;
			  text-align: center;
			  box-shadow: 0 0 20px 0 rgba(0, 0, 0, 0.2), 0 5px 5px 0 rgba(0, 0, 0, 0.24);
			}
			.form input {
			  font-family: "Roboto", sans-serif;
			  outline: 0;
			  background: #f2f2f2;
			  width: 100%;
			  border: 0;
			  margin: 0 0 15px;
			  padding: 15px;
			  box-sizing: border-box;
			  font-size: 14px;
			}
			.form button {
			  font-family: "Roboto", sans-serif;
			  text-transform: uppercase;
			  outline: 0;
			  background: #4CAF50;
			  width: 100%;
			  border: 0;
			  padding: 15px;
			  color: #FFFFFF;
			  font-size: 14px;
			  -webkit-transition: all 0.3 ease;
			  transition: all 0.3 ease;
			  cursor: pointer;
			}
			.form button:hover,.form button:active,.form button:focus {
			  background: #43A047;
			}
			.form .message {
			  margin: 15px 0 0;
			  color: #b3b3b3;
			  font-size: 12px;
			}
			.form .message a {
			  color: #4CAF50;
			  text-decoration: none;
			}
			.form .register-form {
			  display: none;
			}
			.container {
			  position: relative;
			  z-index: 1;
			  max-width: 300px;
			  margin: 0 auto;
			}
			.container:before, .container:after {
			  content: "";
			  display: block;
			  clear: both;
			}
			.container .info {
			  margin: 50px auto;
			  text-align: center;
			}
			.container .info h1 {
			  margin: 0 0 15px;
			  padding: 0;
			  font-size: 36px;
			  font-weight: 300;
			  color: #1a1a1a;
			}
			.container .info span {
			  color: #4d4d4d;
			  font-size: 12px;
			}
			.container .info span a {
			  color: #000000;
			  text-decoration: none;
			}
			.container .info span .fa {
			  color: #EF3B3A;
			}
			body {
			  background: #76b852; /* fallback for old browsers */
			  background: -webkit-linear-gradient(right, #76b852, #8DC26F);
			  background: -moz-linear-gradient(right, #76b852, #8DC26F);
			  background: -o-linear-gradient(right, #76b852, #8DC26F);
			  background: linear-gradient(to left, #76b852, #8DC26F);
			  font-family: "Roboto", sans-serif;
			  -webkit-font-smoothing: antialiased;
			  -moz-osx-font-smoothing: grayscale;      
			}
	  	</style>
		<script src="js/jquery.min.js"></script>
		<script type="text/javascript">
			$('.message a').click(function(){
			   $('form').animate({height: "toggle", opacity: "toggle"}, "slow");
			});
		</script>
	</head>
	<body>
		<div class="login-page">
		  <div class="form">		    
		    <form class="login-form" action="" method="post">
		    	<p style="font-size: 2rem;">Seller Panel</p>
				<input type="text" name="admin_email" placeholder="Email"/>
				<input type="password" name="admin_pass" placeholder="password"/>
				<button type="submit" name="admin_login">login</button>		      
		    </form>
		  </div>
		</div>		
	</body>
</html>
<?php //} ?>
<?php
	if(isset($_POST['admin_login'])){
	    $admin_email = mysqli_real_escape_string($con,$_POST['admin_email']);
	    $admin_pass = mysqli_real_escape_string($con,$_POST['admin_pass']);
	    $get_admin = "select * from admins where admin_email='$admin_email' AND admin_pass='$admin_pass'";
	    $run_admin = mysqli_query($con,$get_admin);
	    $count = mysqli_num_rows($run_admin);
	    if($count==1){
	    	$row = mysqli_fetch_assoc($run_admin);
	        $_SESSION['admin_email']=$admin_email;
			$_SESSION['user_type'] = $row['admin_type'];
			$_SESSION['admin_qube_id'] = $row['admin_id'];
	        if($row['admin_type'] == "2")
	            echo "<script>alert('You are Logged in into Seller panel')</script>";
	        else
	            echo "<script>alert('You are Logged in into admin panel')</script>";
	        echo "<script>window.open('admin_area/index.php?dashboard','_self')</script>";
	    }else {
	        echo "<script>alert('Email or Password is Wrong')</script>";
	    }
	}
?>