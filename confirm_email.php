<?php
include("includes/db.php");
include("includes/top.php");
include("includes/header.php");
if(isset($_GET[$customer_confirm_code])){
    $update_customer = "update customers set customer_confirm_code='' where customer_confirm_code='$customer_confirm_code'";
    $run_confirm = mysqli_query($con,$update_customer);
    if(mysqli_num_rows($con,$run_confirm)){    
    // echo "<script>alert('Your Email Has Been Confirmed')</script>";
    // echo "<script>window.open('my_account.php?my_orders','_self')</script>";
    ?>
    <div class="container text-center">
        <div class="row">
            <div class="col-md-12 text-success">
                <h2>Your Email Has Been Confirmed</h2>                
            </div>
        </div>
    </div
<?php
    }
}
if(isset($_GET['send_email'])){
    $c_email=$_GET['send_email'];
    $subject = "Email Confirmation Message";
    $from = "no-reply@qube3c.com";
    $message = "
    <h2>
    Email Confirmation By staging.qube3c.com $c_name
    </h2>
    <h4 href='https://staging.qube3c.com/my_account.php?$customer_confirm_code'>
    Click Here To Confirm Email
    </h4>
    ";
    $headers = "From: $from \r\n";
    $headers .= "Content-type: text/html\r\n";
    mail($c_email,$subject,$message,$headers);
    echo "<script>alert('Your Confirmation Email Has Been sent to you, check your inbox')</script>";
    echo "<script>window.open('my_account.php?my_orders','_self')</script>";
}
include_once 'includes/footer.php';
?>