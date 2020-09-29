<!DOCTYPE html>
<html>
	<head>
		<title>Fresh3c Products</title>
		<?php include_once 'includes/top.php'; ?>
			<script>
				$(document).ready(function(){   
					$('#fresh_check').change(function(){
						var c = this.checked ? $("#fresh-sec").show() : window.location.replace("index.php");				
					});
				});
			</script>
	</head>
	<body>
		<?php include_once 'includes/header.php'; ?>

		<div class="page px-lg-5">
            <?php
                if(isset($_GET['id'])){
                    include_once 'includes/db.php';
                    $cat_id = $_GET['id'];
                    $sql = "SELECT * FROM `product_type_with_cat` WHERE pro_fresh_cat_id='$cat_id'";
                    $res = mysqli_query($con, $sql);
                    if(mysqli_num_rows($res)>0){
                        while($row = mysqli_fetch_assoc($res)){
                            $pro_id = $row['pro_id'];
                            
                            $get_products = "select * from products WHERE id='$pro_id'";
                            $run_products = mysqli_query($db,$get_products);
                            while($row_products=mysqli_fetch_array($run_products)){
                                $pro_id = $row_products['id'];
                                $pro_title = $row_products['product_title'];
                                $pro_img1 = $row_products['product_img1'];
                                $get_pro = "select * from product_master where product_id='$pro_id'";
                                $run_pro = mysqli_query($db,$get_pro);
                                $row_pro = mysqli_fetch_array($run_pro);
                                $pro_price = $row_pro['default_price'];
                                $pro_url = $row_products['product_url'];
                                echo '<div class="col-md-3">
                                <figure class="card card-product">
                                    <div class="img-wrap">
                                        <a href='.$pro_url.' >
                                            <img src="admin_area/product_images/'.$pro_img1.'">
                                        </a>
                                    </div>
                                    <figcaption class="info-wrap">
                                        <h6 class="title text-dots"><a href="'.$pro_url.'">'.$pro_title.'</a></h6>
                                        <div class="price-wrap h5">
                                            <span class="price-new">Rs. '.$pro_price.'</span>                            
                                        </div>
                                        <div class="action-wrap">
                                            <a href="'.$pro_url.'" class="btn btn-secondary float-right" style="background:white;color:#041e41"> View details </a>
                                            <form action="add-cart.php" method="post">
                                                <button type="submit" name="add_cart" class="btn float-left" style="background:#041e41;color:white"> Add to cart </button>
                                            </form>
                                        </div>					
                                    </figcaption>
                                </figure>
                            </div>';
                            }
                        }
                    }
                }
            ?>
        </div>
		<?php include_once 'includes/footer.php'; ?>
	</body>
</html>