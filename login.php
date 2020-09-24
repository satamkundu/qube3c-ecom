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
			<form class="quabe-form">
						<p class="text-center heading-account"><strong>Sign in Qube3c Account</strong></p>
					
		             <div class="form-group"> 
		            	<input type="email" class="form-control" placeholder="Email adrress (required)" required> 
		            </div>
				    <div class="form-group pass_show"> 
		            	<input type="password" class="form-control" placeholder="Password (required)" required> 
		            </div>
		            <p class="text-right"><a href="#pass">Forget Password?</a> 
				    <div class="form-group mb-4">
				      	<input type="checkbox" id="signed-in" class="checkbox-custom" checked="checked">
				      	<label for="signed-in" class="label-check">Keep me <a href="#sign">Signed in</a><br><span class="pl-5">Uncheck if using public device</span></label>
				    </div>
					
		                
	                 <div class="form-group"> 
	            		<button class="form-control account-btn">Sign in</button>
	               </div>
            </form>
            <div class="already-account text-center mt-5">
            	<p>Don't have an account?</p>
            	  <div class="form-group"> 
            	<a href="account.php"><button class="form-control sign-in-btn">Create account</button></a>
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