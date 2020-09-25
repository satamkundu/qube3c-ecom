<?php
session_start();
if(!isset($_SESSION['customer_email'])){
    echo "<script>window.open('checkout.php','_self')</script>";
}else {
include("includes/db.php");
include("includes/top.php");
include("includes/header.php");
// include("functions/functions_1.php");
//include("includes/main.php");
?>
<div class="container text-center">
    <div class="row">
        <div class="col-md-12" style="background: black;color: white;padding-top: 6rem;padding-bottom: 6rem;margin-top: 2rem;margin-bottom: 2rem;">
            <h2>My Account</h2> 
        </div>
    </div>
</div>
<div id="content" ><!-- content Starts -->
    <div class="container" style="margin-bottom:5rem"><!-- container Starts -->
        <div class="row" >
            <div class="col-md-12"><!-- col-md-12 Starts -->
                <?php            
                    $c_email = $_SESSION['customer_email'];
                    $get_customer = "select * from customers where customer_email='$c_email'";
                    $run_customer = mysqli_query($con,$get_customer);
                    $row_customer = mysqli_fetch_array($run_customer);
                    $customer_confirm_code = $row_customer['customer_confirm_code'];
                    $c_name = $row_customer['customer_name'];
                    if(!empty($customer_confirm_code)){
                ?>
                <div class="alert alert-danger"><!-- alert alert-danger Starts -->
                    <strong> Warning! </strong> Please Confirm Your Email and if you have not received your confirmation email
                    <a href="confirm_email.php?send_email=<?=$c_email?>" class="alert-link">
                        Send Email Again
                    </a>
                </div><!-- alert alert-danger Ends -->
                <?php } ?>
            </div><!-- col-md-12 Ends -->
            <div class="col-md-3"><!-- col-md-3 Starts -->
                <?php include("includes/sidebar.php"); ?>
            </div><!-- col-md-3 Ends -->
            <div class="col-md-9" ><!--- col-md-9 Starts -->
                <div class="box" ><!-- box Starts -->
                    <?php                    
                        if(isset($_GET['my_orders'])){include("my_orders.php");}
                        //if(isset($_GET['pay_offline'])) {include("pay_offline.php");}
                        if(isset($_GET['edit_account'])) {include("my_edit_account.php");}
                        if(isset($_GET['change_pass'])){include("my_change_pass.php");}
                        if(isset($_GET['delete_account'])){include("my_delete_account.php");}
                        if(isset($_GET['wishlist'])){include("my_wishlist.php");}
                        if(isset($_GET['delete_wishlist'])){include("my_delete_wishlist.php");}
                    ?>
                </div><!-- box Ends -->
            </div><!--- col-md-9 Ends -->
        </div>
    </div><!-- container Ends -->
</div><!-- content Ends -->
    <?php include("includes/footer.php"); ?>
    </body>
</html>
<?php } ?>