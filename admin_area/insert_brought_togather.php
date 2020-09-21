<?php
    if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
    }else {
?>
<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / Brought Togather
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->
<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title"><!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw"> </i> Insert Brought Togather Data
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> Product ID </label>
                        <div class="col-md-6">
                            <input type="number" name="product_id_1" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> With Product ID </label>
                        <div class="col-md-6">
                            <input type="number" name="product_id_2" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->                    
                    <div class="form-group"><!-- form-group Starts -->
                        <label class="col-md-3 control-label"> </label>
                        <div class="col-md-6">
                            <input type="submit" name="submit" class="form-control btn btn-primary" value=" Insert Brought Togather Data" >
                        </div>
                    </div><!-- form-group Ends -->
                </form><!-- form-horizontal Ends -->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->
<?php
if(isset($_POST['submit'])){
    $product_id_1 = $_POST['product_id_1'];
    $product_id_2 = $_POST['product_id_2'];
    $user_id = $_SESSION['admin_qube_id'];

    $sql = "SELECT id FROM products WHERE product_id = '$product_id_1' AND user_id = '$user_id'"; 
    if(mysqli_num_rows(mysqli_query($con, $sql)) > 0 ){
        $sql = "SELECT id FROM products WHERE product_id = '$product_id_1' AND brought_togather = 'no' AND user_id = '$user_id'";  
        $res = mysqli_query($con, $sql); 
        if(mysqli_num_rows($res) > 0 ){
            $row = mysqli_fetch_array($res);
            $pro_1_id = $row['id'];

            $sql = "SELECT id FROM products WHERE product_id = '$product_id_2' AND user_id = '$user_id'"; 
            if(mysqli_num_rows(mysqli_query($con, $sql)) > 0 ){
                $sql = "SELECT id FROM products WHERE product_id = '$product_id_2' AND brought_togather = 'no' AND user_id = '$user_id'";  
                $res = mysqli_query($con, $sql); 
                if(mysqli_num_rows($res) > 0 ){
                    $row = mysqli_fetch_array($res);
                    $pro_2_id = $row['id'];

                    $error = 1;
                    $update_brought_togather_1 = "UPDATE products SET brought_togather = 'yes', brought_togather_product_id = '$pro_2_id' WHERE id='$pro_1_id'";
                    if(mysqli_query($con,$update_brought_togather_1)){

                        $update_brought_togather_2 = "UPDATE products SET brought_togather = 'yes', brought_togather_product_id = '$pro_1_id' WHERE id='$pro_2_id'";
                        if(mysqli_query($con,$update_brought_togather_2)) 
                            $error = 0;
                    
                    }
                    if($error == 0){
                        echo "<script>alert('New Brought Togather Has Been Inserted')</script>";
                        echo "<script>window.open('index.php?view_brought_togather','_self')</script>";
                    }
                    
                }else{
                    echo "<script>alert('Product 2 already has added in Brought Togather Section')</script>";
                }
            }else{
                echo "<script>alert('Product 2 Does not exist')</script>";
            }
        }else{
            echo "<script>alert('Product 1 already has added in Brought Togather Section')</script>";
        }
    }else{
        echo "<script>alert('Product 1 Does not exist')</script>";
    }
}
?>
<?php } ?>