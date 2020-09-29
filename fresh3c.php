<!DOCTYPE html>
<html>
	<head>
		<title>Qube3c</title>
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

			<!-- top hero section -->
			<section class="top-hero">
				<div class="container-fluid">
					<div class="row py-2">
						<div class="col-lg-12 saving-item px-0">
							<div class="top-banner-slider">
								<div class="slider-item">
									<img src="images/fresh3c/banner.png">
								</div>
								<div class="slider-item">
									<img src="images/fresh3c/banner.png">
								</div>
								<div class="slider-item">
									<img src="images/fresh3c/banner.png">
								</div>
								<div class="slider-item">
									<img src="images/fresh3c/banner.png">
								</div>
								<div class="slider-item">
									<img src="images/fresh3c/banner.png">
								</div>
							</div>
						</div>
						
					</div>
				</div>
			</section>
			<!-- end top hero section -->

			<!-- Feature section -->
			<section class="features py-3">
				<div class="container-fluid">
							<div class="row">
								<div class="col-lg-4 col-sm-6 py-sm-3">
									<div class="feature-tab">
										<div class="feature-icon">
											<img src="images/fresh3c/icon-chimical.png">
										</div>
										<div class="feature-content">
											<h6>Chemical Free</h6>
											<p>Meat as nature intended it to be</p>
										</div>
									</div>

								</div>
								<div class="col-lg-4 col-sm-6 py-sm-3">
									<div class="feature-tab">
										<div class="feature-icon">
											<img src="images/fresh3c/icon-zero.png">
										</div>
										<div class="feature-content">
											<h6>Zero Preservatives</h6>
											<p>100% Healthy</p>
										</div>
									</div>

								</div>
								<div class="col-lg-4 col-sm-6 py-sm-3">
									<div class="feature-tab">
										<div class="feature-icon">
											<img src="images/fresh3c/icon-freshness.png">
										</div>
										<div class="feature-content">
											<h6>Fresness Grananteed</h6>
											<p>Same-day Dilivery throught a unique cold chain supply</p>
										</div>
									</div>

								</div>
								
							</div>
						</div>
			</section>
			<!-- Feature section -->

			<!-- Explore By Category section -->
			<section class="explore-by-category py-3 mt-4 mb-5 px-lg-4">
				<div class="container-fluid">
					<div class="row">
						
						<div class="col-lg-12">
							<h3 class="cat-title">Explore By Category</h3>
							<p class="cat-des mb-5">We have everything you need</p>
						</div>
					</div>

					<div class="row text-center text-lg-left">
						<?php
							include_once 'includes/db.php';
							$sql = "SELECT * FROM fresh_3c_items";
							$res = mysqli_query($con, $sql);
							if(mysqli_num_rows($res)>0){
								while($row = mysqli_fetch_assoc($res)){
									$title = $row['title'];
									$id = $row['id'];
									$image = $row['image_add'];
									$sql1 = "SELECT id FROM product_type_with_cat WHERE pro_fresh_cat_id = '$id'";
									$num1 = mysqli_num_rows(mysqli_query($con, $sql1));
									?>
									<div class="col-lg-3 col-md-4 col-6 mb-5">
										<a href="fresh3c-cat-product.php?id=<?=$id?>" class="d-block mb-4 h-100 category-link">
												<img class="img-fluid" src="admin_area/fresc3c_category_images/<?=$image?>" style="height: fit-content;" alt="">
												<div class="product-cat-meta text-center text-white">
												<h2 class="cat-name m-0"><?=$title?></h2>
												<p><span class="products-count"><?=$num1?></span> Products</p>
											</div>
										</a>
									</div>
								<?php
								}
							}
						?>							
					</div>
				</div>
			</section>
			<!-- End Explore By Category section -->

			<!-- Best Selling section -->
			<!-- <section class="best-selling py-3 px-lg-4">
				<div class="container-fluid">
					<div class="row">			
						<div class="col-lg-12">
							<h3 class="cat-title">Best Selling</h3>
						</div>
					</div>
				</div>
			</section>


			<section class="best-selling-producacts py-5 my-0 px-lg-4 mb-5">
				<div class="container-fluid">
					<div class="row text-center text-lg-left slider-best-selling">

					<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/checken-kema.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Chicken Chema</h2>
							
						</div>
						</a>
					</div>
					</div>

						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/breast.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Chicken Breast Boneless</h2>
							
						</div>
						</a>
					</div>
					</div>
						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/curry.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Mutton Carry Cut</h2>
							
						</div>
						</a>
					</div>
					</div>
						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/boneless.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Mutton Boneless</h2>
							
						</div>
						</a>
					</div>
					</div>

						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/checken-kema.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Chicken Chema</h2>
							
						</div>
						</a>
					</div>
					</div>
					</div>
				</div>
			</section> -->
			<!-- Best Selling section -->

			<!-- Best Selling section -->
			<!-- <section class="best-selling py-3 px-lg-4">
				<div class="container-fluid">
					<div class="row">			
						<div class="col-lg-12">
							<h3 class="cat-title">Products You May Like</h3>
						</div>
					</div>
				</div>
			</section>

			<section class="best-selling-producacts py-5 my-0 px-lg-4 mb-5">
				<div class="container-fluid">
					<div class="row text-center text-lg-left slider-best-selling">

					<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/checken-kema.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Chicken Chema</h2>
							
						</div>
						</a>
					</div>
					</div>

						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/breast.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Chicken Breast Boneless</h2>
							
						</div>
						</a>
					</div>
					</div>
						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/curry.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Mutton Carry Cut</h2>
							
						</div>
						</a>
					</div>
					</div>
						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/boneless.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Mutton Boneless</h2>
							
						</div>
						</a>
					</div>
					</div>

						<div class="col-lg-3 col-md-4 col-6 mb-5">
						<div class="product-outer">
						<a href="#product-id" class="d-block mb-4 h-100 product-link">
							<img class="img-fluid" src="images/fresh3c/checken-kema.png" alt="">
							<div class="product-sell-meta text-center text-white">
							<h2 class="sell-product-name m-0">Chicken Chema</h2>
							
						</div>
						</a>
					</div>
					</div>
					</div>
				</div>
			</section> -->
			<!-- Best Selling section -->
		</div>
		<?php include_once 'includes/footer.php'; ?>
	</body>
</html>