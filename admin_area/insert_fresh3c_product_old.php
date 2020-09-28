<?php
if(!isset($_SESSION['admin_email'])){
    echo "<script>window.open('login.php','_self')</script>";
}else {
?>
<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li>
                <i class="fa fa-dashboard"></i> Dashboard / Insert Fresh3c Products
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading" ><!-- panel-heading Starts -->
                <h3 class="panel-title" ><!-- panel-title Starts -->
                    <i class="fa fa-money fa-fw" ></i> Insert Fresh3c Products
                </h3><!-- panel-title Ends -->
            </div><!-- panel-heading Ends -->
            <div class="panel-body" ><!-- panel-body Starts -->
                <form class="form-horizontal" action="" method="post" enctype="multipart/form-data" ><!-- form-horizontal Starts -->
                    <div class="form-group" ><!-- form-group Starts -->
                        <label class="col-md-3 control-label" >Choose Fresh3c Product Category</label>
                        <div class="col-md-6" >
                            <select name="item_id" class="form-control"> 
                                <option value="0">Choose Category</option>
                                <?php
                                $sql = "SELECT * FROM `fresh_3c_items`";
                                $res = mysqli_query($con,$sql);
                                if(mysqli_num_rows($res) >0){
                                    while($row = mysqli_fetch_assoc($res)){
                                        echo '<option value="'.$row['id'].'">'.$row['title'].'</option>';
                                    }
                                }
                                ?>
                            </select>
                        </div>
                    </div><!-- form-group Ends -->

                    <div class="form-group" ><!-- form-group Starts -->
                        <label class="col-md-3 control-label" >Product Title</label>
                        <div class="col-md-6" >
                            <input type="text" name="p_title" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->

                    <div class="form-group" ><!-- form-group Starts -->
                        <label class="col-md-3 control-label" >Product Price</label>
                        <div class="col-md-6" >
                            <input type="number" name="p__price" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->

                    <div class="form-group" ><!-- form-group Starts -->
                        <label class="col-md-3 control-label" >Product Price Unit</label>
                        <div class="col-md-6" >
                            <input type="text" name="p_price_unit" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->
                    
                    <div class="form-group" ><!-- form-group Starts -->
                        <label class="col-md-3 control-label" > Select Product Image</label>
                        <div class="col-md-6" >
                            <input type="file" name="p_cat_image" class="form-control" >
                        </div>
                    </div><!-- form-group Ends -->
                    <div class="form-group" ><!-- form-group Starts -->
                        <label class="col-md-3 control-label" ></label>
                        <div class="col-md-6" >
                            <input type="submit" name="submit" value="Submit Now" class="btn btn-primary form-control" >
                        </div>
                    </div><!-- form-group Ends -->
                </form><!-- form-horizontal Ends -->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->
<?php
if(isset($_POST['submit'])){
    $item_id = $_POST['item_id'];
    $p_title = $_POST['p_title'];
    $p__price = $_POST['p__price'];
    $p_price_unit = $_POST['p_price_unit'];
    $p_cat_image = $_FILES['p_cat_image']['name'];
    $temp_name = $_FILES['p_cat_image']['tmp_name'];
    move_uploaded_file($temp_name,"other_images/$p_cat_image");
    $insert_p_cat = "INSERT INTO `fresh_3c_products` (`item_id`, `product_name`, `product_price`, `price_unit`,`image_path`) 
    VALUES ('$item_id', ' $p_title', '$p__price', '$p_price_unit','$p_cat_image')";
    $run_p_cat = mysqli_query($con,$insert_p_cat);
    if($run_p_cat){
        echo "<script>alert('New Product Has been Inserted')</script>";
        echo "<script>window.open('index.php?view_fresh3c_products','_self')</script>";
    }
}
?>
<?php } ?>