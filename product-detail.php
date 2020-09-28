<?php
include_once("includes/top.php");
include_once("includes/db.php");
include_once("includes/header.php");
//include("functions/functions.php");
?>
<body class="product-detail-body">
    <div class="page px-lg-5">

    <?php
        $product_id = @$_GET['pro_id'];
        $get_product = "select * from products where product_url='$product_id'";
        $run_product = mysqli_query($con,$get_product);
        $check_product = mysqli_num_rows($run_product);
        if($check_product == 0){
            echo "<script>window.open('index.php','_self') </script>";
        }else{
            $row_product = mysqli_fetch_array($run_product);
            $p_cat_id = $row_product['p_cat_id'];
            $pro_id = $row_product['id'];
            $pro_main_id = $row_product['product_id'];
            $pro_title = $row_product['product_title'];
            //$pro_price = $row_product['product_price'];
            $pro_desc = $row_product['product_desc'];
            $pro_img1 = $row_product['product_img1'];
            $pro_img2 = $row_product['product_img2'];
            $pro_img3 = $row_product['product_img3'];
            //$pro_label = $row_product['product_label'];
            //$pro_psp_price = $row_product['product_psp_price'];
            $pro_features = $row_product['product_features'];
            //$pro_video = $row_product['product_video'];
            //$status = $row_product['status'];
            $pro_url = $row_product['product_url'];
            // if($pro_label == ""){
            // }else{
            // 	$product_label = "
            // 	<a class='label sale' href='#' style='color:black;'>
            // 	<div class='thelabel'>$pro_label</div>
            // 	<div class='label-background'> </div>
            // 	</a>
            // 	";
            // }
            $get_pro = "select * from product_master where product_id='$pro_id'";
			$run_pro = mysqli_query($db,$get_pro);
			$row_pro = mysqli_fetch_array($run_pro);
            $pro_price = $row_pro['default_price'];
            
            $get_p_cat = "select * from product_categories where p_cat_id='$p_cat_id'";
            $run_p_cat = mysqli_query($con,$get_p_cat);
            $row_p_cat = mysqli_fetch_array($run_p_cat);
            $p_cat_title = $row_p_cat['p_cat_title'];
    ?>

        <!-- Start section product preview -->
        <section class="product-preview-section py-5">
            <div class="container-fluid">
                <div class="row">
                    <div class="preview col-md-12 col-lg-5 col-sm-12 pr-5">
                        <div class="preview-product">
                            <div class="preview-icon">
                                <ul class="preview-thumbnail nav nav-tabs">
                                    <li class="active"><a data-target="#pic-1" data-toggle="tab"><img src="admin_area/product_images/<?=$pro_img1?>" /></a></li>
                                    <li><a data-target="#pic-2" data-toggle="tab"><img src="admin_area/product_images/<?=$pro_img2?>" /></a></li>
                                    <li><a data-target="#pic-3" data-toggle="tab"><img src="admin_area/product_images/<?=$pro_img3?>" /></a></li>
                                </ul>
                            </div>
                            <div class="preview-pic tab-content">
                                <div class="tab-pane active" id="pic-1"><img src="admin_area/product_images/<?=$pro_img1?>" style="height:30rem"/></div>
                                <div class="tab-pane" id="pic-2"><img src="admin_area/product_images/<?=$pro_img2?>" style="height:30rem" /></div>
                                <div class="tab-pane" id="pic-3"><img src="admin_area/product_images/<?=$pro_img3?>" style="height:30rem" /></div>
                            </div>        
                        </div>
                    </div>
                    <div class="details col-sm-12 col-lg-7 col-md-12">
                        <div class="product-preview-meta">
                            <h4 class="preview-product-title"><?= $pro_title ?></h4>
                        </div>        
                        <p class="product-rate">Rs <?= $pro_price; ?><span class="offer-rate">Exclusive all rates</span></p>
                        
                    <form action="" method="post">
                        <div class="btn-toolbar btn-product-action" role="toolbar" aria-label="groups">
                            <div class="btn-group mr-4" role="group" aria-label="Second group">
                                <button type="submit" name="add_cart" class="btn btn-secondary add-to-bag" style="font-size: 1rem;"><i class="fa fa-shopping-cart"></i> Add To Bag</button>
                            </div>
                            <div class="btn-group mr-4" role="group" aria-label="group">
                                <button type="button" class="btn btn-secondary wishlist" style="font-size: 1rem;"><i class="fa fa-heart" aria-hidden="true"></i> Wishlist</button>
                            </div>
                            <!-- <div class="btn-group mr-4" role="group" aria-label="forth group">
                                <button type="button" class="btn btn-secondary buy-now" style="font-size: 1rem;">Buy Now</button>
                            </div>                 -->
                        </div>
                    </form>
                        <!-- <div class="delivery-option">
                            <h3 class="delivery-title my-4">Deivery Option<i class="fa fa-truck" aria-hidden="true"></i></h3>
                            <p>Please enter PIN code to check delivery time & Pay on Delivery Availability</p>
                            <ul class="delivery-check">
                                <li>100% Orginal Products</li>
                                <li>Free Delivery on order above Rs. 700</li>
                                <li>Pay on delivery might be available</li>
                                <li>Easy 7 days reurns and exchanges</li>
                            </ul>
                            <h3  class="delivery-title my-4">Best Offers <i class="fa fa-gift" aria-hidden="true"></i> </h3>
                            <p class="best-price">Best Price:<span class="best-price-rupe"> Rs. 1378</span></p>
                            <ul>
                            <li>Applicable on: Order above Rs. 1599 (only on first purchase)</li>
                            <li>Coupen code: ETHNIC300</li>
                            <li>Pay on delivery might be available</li>
                            <li>Coupen Discount:Rs 300 off (check cart for final savaing)</li>
                            </ul>
                        </div> -->
                    </div>
                </div>
            </div>
        </section>
        <!-- End section product preview -->

<!-- Start section product Detail -->
<section class="product-detail py-5">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-6 product-deail-col">
                <h3 class="product-detail-title pb-4">Product Detail</h3>
                <?=$pro_desc?>
            </div>
            <div class="col-md-6 product-detail-img">
                <img  class="img-fluid" src="admin_area/product_images/<?=$pro_img1?>" style="height: 30rem;width: 100%;"/></a>
            </div>
        </div>
    </div>
</section>
<!-- End section product Detail -->
    <?php } ?>
    </div>
    <?php include_once 'includes/footer.php'; ?>
</body>
</html>

<?php
if(isset($_POST['add_cart'])){
    $ip_add = getRealUserIp();
    $p_id = $pro_id;
    // $product_qty = $_POST['product_qty'];
    // $product_size = $_POST['product_size'];
    $check_product = "select * from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
    $run_check = mysqli_query($con,$check_product);
    if(mysqli_num_rows($run_check)>0){
        echo "<script>alert('This Product is already added in cart')</script>";
        echo "<script>window.open('$pro_url','_self')</script>";
    }else{
        // $get_price = "select * from products where id='$p_id'";
        // $run_price = mysqli_query($con,$get_price);
        // $row_price = mysqli_fetch_array($run_price);
        //$pro_price = $row_price['product_price'];
        //$pro_psp_price = $row_price['product_psp_price'];
        // $pro_label = $row_price['product_label'];
        // if($pro_label == "Sale" or $pro_label == "Gift"){
        //     $product_price = $pro_psp_price;
        // }else{
        //     $product_price = $pro_price;
        // }
        echo "<script>alert('This Product is added into cart')</script>";
        $query = "insert into cart (p_id,ip_add) values ('$p_id','$ip_add')";
        $run_query = mysqli_query($db,$query);
        echo "<script>window.open('$pro_url','_self')</script>";
    }
}
?>

<?php
if(isset($_POST['add_wishlist'])){
	if(!isset($_SESSION['customer_email'])){
		echo "<script>alert('You Must Login To Add Product In Wishlist')</script>";
		echo "<script>window.open('checkout.php','_self')</script>";
	}else{
		$customer_session = $_SESSION['customer_email'];
		$get_customer = "select * from customers where customer_email='$customer_session'";
		$run_customer = mysqli_query($con,$get_customer);
		$row_customer = mysqli_fetch_array($run_customer);
		$customer_id = $row_customer['customer_id'];
		$select_wishlist = "select * from wishlist where customer_id='$customer_id' AND product_id='$pro_id'";
		$run_wishlist = mysqli_query($con,$select_wishlist);
		$check_wishlist = mysqli_num_rows($run_wishlist);
		if($check_wishlist == 1){
			echo "<script>alert('This Product Has Been already Added In Wishlist')</script>";
			echo "<script>window.open('$pro_url','_self')</script>";
		}else{
			$insert_wishlist = "insert into wishlist (customer_id,product_id) values ('$customer_id','$pro_id')";
			$run_wishlist = mysqli_query($con,$insert_wishlist);
			if($run_wishlist){
				echo "<script> alert('Product Has Inserted Into Wishlist') </script>";
				echo "<script>window.open('$pro_url','_self')</script>";
			}
		}
	}
}
?>