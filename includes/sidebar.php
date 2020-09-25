<div class="panel panel-default sidebar-menu"><!-- panel panel-default sidebar-menu Starts -->
    <div class="panel-heading"><!-- panel-heading Starts -->
    <?php
        $customer_session = $_SESSION['customer_email'];
        $get_customer = "select * from customers where customer_email='$customer_session'";
        $run_customer = mysqli_query($con,$get_customer);
        $row_customer = mysqli_fetch_array($run_customer);
        // $customer_image = $row_customer['customer_image'];
        $customer_name = $row_customer['customer_name'];
        if(!isset($_SESSION['customer_email'])){
        }else {
            echo "
            <center>
            <img src='images/customer_images/user.png' style='height:9rem' class='img-responsive'>
            </center>
            <br>
            <h3 align='center' class='panel-title'> Name : $customer_name </h3>
            ";
        }
    ?>
    </div><!-- panel-heading Ends -->

    <div class="list-group">
        <a class="side-account" href="my_account.php?my_orders"><button type="button" class="list-group-item list-group-item-action <?php if(isset($_GET['my_orders'])){ echo "active"; }?>">My Orders</button></a>
        <a class="side-account" href="my_account.php?edit_account"><button type="button" class="list-group-item list-group-item-action <?php if(isset($_GET['edit_account'])){ echo "active"; } ?>">Edit Account</button></a>
        <a class="side-account" href="my_account.php?change_pass"><button type="button" class="list-group-item list-group-item-action <?php if(isset($_GET['change_pass'])){ echo "active"; } ?>">Change Password</button></a>
        <a class="side-account" href="my_account.php?wishlist"><button type="button" class="list-group-item list-group-item-action <?php if(isset($_GET['wishlist'])){ echo "active"; } ?>">My WishList</button></a>
        <a class="side-account" href="my_account.php?delete_account"><button type="button" class="list-group-item list-group-item-action <?php if(isset($_GET['delete_account'])){ echo "active"; } ?>">Delete Account</button></a>
        <a class="side-account" href="logout.php"><button type="button" class="list-group-item list-group-item-action">Logout</button></a>
    </div>
</div><!-- panel panel-default sidebar-menu Ends -->

<style>
    .side-account:hover{
        text-decoration:none;       
    }
    .list-group-item{
        cursor:pointer;
    }
</style>