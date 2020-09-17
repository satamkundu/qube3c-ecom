<?php
	if(!isset($_SESSION['admin_email'])){
		echo "<script>window.open('login.php','_self')</script>";
	}else{
?>
<!DOCTYPE html>
<html>
	<head>
		<title> Insert Products </title>
		<script src="//cdn.tinymce.com/4/tinymce.min.js"></script>
		<script>tinymce.init({ selector:'#product_desc,#product_features' });</script>
	</head>

	<body>
		<div class="row"><!-- row Starts -->
			<div class="col-lg-12"><!-- col-lg-12 Starts -->
				<ol class="breadcrumb"><!-- breadcrumb Starts -->
					<li class="active">
						<i class="fa fa-dashboard"> </i> Dashboard / Insert Products
					</li>
				</ol><!-- breadcrumb Ends -->
			</div><!-- col-lg-12 Ends -->
		</div><!-- row Ends -->

		<div class="row"><!-- 2 row Starts --> 
			<div class="col-lg-12"><!-- col-lg-12 Starts -->
				<div class="panel panel-default"><!-- panel panel-default Starts -->
					<div class="panel-heading"><!-- panel-heading Starts -->
						<h3 class="panel-title">
							<i class="fa fa-money fa-fw"></i> Insert Products
						</h3>
					</div><!-- panel-heading Ends -->
					
					<div class="panel-body"><!-- panel-body Starts -->
						<form class="form-horizontal" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Title </label>
								<div class="col-md-6" >
									<input type="text" name="product_title" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Url </label>
								<div class="col-md-6" >
									<input type="text" name="product_url" class="form-control" required >
									<br>
									<p style="font-size:15px; font-weight:bold;">
										Product Url Example : navy-blue-t-shirt
									</p>
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Specific Menu </label>
								<div class="col-md-9" >
								<?php
										$get_header_menu = "select * from header_menu";
										$run_header_menu = mysqli_query($con,$get_header_menu);
										while($row_header_menu= mysqli_fetch_array($run_header_menu)){
											$header_menu_id = $row_header_menu['id'];
											$header_menu_title = $row_header_menu['menu_item'];
											echo '<input type="checkbox" name="header_menu[]" id="header_menu'.$header_menu_id.'" value="'.$header_menu_title.'"><label style="cursor:pointer" for="header_menu'.$header_menu_id.'">'.$header_menu_title.'</label>';
											echo "<br>";
										}
									?>
								</div>
							</div>

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Select A Manufacturer </label>
								<div class="col-md-6" >
									<select class="form-control" name="manufacturer"><!-- select manufacturer Starts -->
										<option> Select A Manufacturer </option>
										<?php
											$get_manufacturer = "select * from manufacturers";
											$run_manufacturer = mysqli_query($con,$get_manufacturer);
											while($row_manufacturer= mysqli_fetch_array($run_manufacturer)){
											$manufacturer_id = $row_manufacturer['manufacturer_id'];
											$manufacturer_title = $row_manufacturer['manufacturer_title'];
											echo "<option value='$manufacturer_id'>
											$manufacturer_title
											</option>";
											}
										?>
									</select><!-- select manufacturer Ends -->
								</div>
							</div><!-- form-group Ends -->


							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Category </label>
								<div class="col-md-6" >
									<select name="product_cat" class="form-control" >
										<option> Select  a Product Category </option>
										<?php
										$get_p_cats = "select * from product_categories";
										$run_p_cats = mysqli_query($con,$get_p_cats);
										while ($row_p_cats=mysqli_fetch_array($run_p_cats)) {
											$p_cat_id = $row_p_cats['p_cat_id'];
											$p_cat_title = $row_p_cats['p_cat_title'];
											echo "<option value='$p_cat_id' >$p_cat_title</option>";
										}
										?>
									</select>
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Category </label>
								<div class="col-md-6" >
									<select name="cat" class="form-control" >
										<option> Select a Category </option>
										<?php
										$get_cat = "select * from categories ";
										$run_cat = mysqli_query($con,$get_cat);
										while ($row_cat=mysqli_fetch_array($run_cat)) {
											$cat_id = $row_cat['cat_id'];
											$cat_title = $row_cat['cat_title'];
											echo "<option value='$cat_id'>$cat_title</option>";
										}
										?>
									</select>
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Image 1 </label>
								<div class="col-md-6" >
									<input type="file" name="product_img1" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Image 2 </label>
								<div class="col-md-6" >
									<input type="file" name="product_img2" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->
							
							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Image 3 </label>
								<div class="col-md-6" >
									<input type="file" name="product_img3" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Has Variant </label>
								<div class="col-md-6" >
									<div class="form-check" style="display:inline">
										<input class="form-check-input" type="radio" name="has_variant" id="has_variant1" value="Yes">
										<label class="form-check-label" for="has_variant1" style="cursor: pointer;">Yes</label>
									</div>
									<div class="form-check" style="display:inline">
										<input class="form-check-input" type="radio" name="has_variant" id="has_variant2" value="No">
										<label class="form-check-label" for="has_variant2" style="cursor: pointer;">No</label>
									</div>									
								</div>
							</div><!-- form-group Ends -->

							<div id="no_variant">
								<div class="form-group" >
									<div class="col-md-4">
										<input type="text" class="form-control" name="product_qty" id="product_qty" placeholder="Product Quantity">
									</div>
									<div class="col-md-4">
										<input type="text" class="form-control" name="product_price" id="product_price" placeholder="Product Price">
									</div>
									<div class="col-md-4">
										<input type="number" class="form-control" name="psp_price" id="psp_price"placeholder="Product Sale Price">
									</div>									
								</div>								
							</div>
														

							<div id="yes_variant" style="padding-bottom:8rem">
								<div class="col-md-12 text-center">
									<?php
										$get_cat = "select * from variant_all";
										$run_cat = mysqli_query($con,$get_cat);										
										while ($row_cat=mysqli_fetch_array($run_cat)) {
											$variant_id = $row_cat['id'];
											$variant_name = $row_cat['name'];
											echo '<input type="checkbox" name="variant_mn" id="variant_main'.$variant_id.'" value="'.$variant_name.'"><label style="cursor:pointer" for="variant_main'.$variant_id.'">'.$variant_name.'</label>';
											echo str_repeat('&nbsp;',15);
										}										
									?>
									<button style="display:inline" type="button" class="btn btn-success" id="add_var">
										<i class="fa fa-plus" aria-hidden="true"></i>										
									</button>
								</div>
								<div id="var_data"></div>
							</div>

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Keywords </label>
								<div class="col-md-6" >
									<input type="text" name="product_keywords" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Tabs </label>
								<div class="col-md-6" >
									<ul class="nav nav-tabs"><!-- nav nav-tabs Starts -->
										<li class="active">
											<a data-toggle="tab" href="#description"> Product Description </a>
										</li>
										<li>
											<a data-toggle="tab" href="#features"> Product Features </a>
										</li>
										<!-- <li>
											<a data-toggle="tab" href="#video"> Sounds And Videos </a>
										</li> -->
									</ul><!-- nav nav-tabs Ends -->

									<div class="tab-content"><!-- tab-content Starts -->
										<div id="description" class="tab-pane fade in active"><!-- description tab-pane fade in active Starts -->
											<br>
											<textarea name="product_desc" class="form-control" rows="15" id="product_desc"></textarea>
										</div><!-- description tab-pane fade in active Ends -->
										<div id="features" class="tab-pane fade in"><!-- features tab-pane fade in Starts -->
											<br>
											<textarea name="product_features" class="form-control" rows="15" id="product_features"></textarea>
										</div><!-- features tab-pane fade in Ends -->
										<!-- video tab-pane fade in Starts -->
										<!-- <div id="video" class="tab-pane fade in">
											<br>
											<textarea name="product_video" class="form-control" rows="15"></textarea>
										</div> -->
										<!-- video tab-pane fade in Ends -->
									</div><!-- tab-content Ends -->
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Label </label>
								<div class="col-md-6" >
									<input type="text" name="product_label" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" ></label>
								<div class="col-md-6" >
									<input type="submit" name="submit" value="Insert Product" class="btn btn-primary form-control" >
								</div>
							</div><!-- form-group Ends -->
						</form><!-- form-horizontal Ends -->
					</div><!-- panel-body Ends -->
				</div><!-- panel panel-default Ends -->
			</div><!-- col-lg-12 Ends -->
		</div><!-- 2 row Ends --> 
	</body>
</html>

<script>
	$(document).ready(function(){
		$("#yes_variant").hide();
		$("#no_variant").hide();
		$('input:radio[name="has_variant"]').change(function(){
			if($(this).val() == 'Yes'){
				$("#yes_variant").show();
				$("#no_variant").hide();
			}else if($(this).val() == 'No'){
				$("#no_variant").show();
				$("#yes_variant").hide();
			}
		});

		$('#add_var').on('click', function() { 
            var array = []; 
            $("input:checkbox[name=variant_mn]:checked").each(function() { 
                array.push($(this).val()); 
            });
			html_data = [];
			html_data.push('<table class="table" style="width: 100%;" id="variantTable">'+
				'<tbody>'+				
					'<tr id="row1">');
			var cnt = 1;
			for(var i = 0; i<array.length; i++){
				html_data.push('<td><input type="text" class="form-control" name="'+array[i]+'" id="varient_name'+cnt+'" placeholder="'+array[i]+'"></td>');
			}
			
			html_data.push('<td><input type="number" class="form-control" name="varient_qty" id="varient_qty1" placeholder="Varient Quantity"></td>'+
						'<td><input type="number" class="form-control" name="varient_price" id="varient_price1" placeholder="Varient Price"></td>'+
						'<td><input type="number" class="form-control" name="varient_sale_price" id="varient_sale_price1" placeholder="Varient Sale Price"></td>'+
					'</tr>'+
				'</tbody>'+
			'</table>'+
			'<button type="button" class="btn btn-success btn-circle" onclick="addRowVariant('+array+')" id="addRowBtn" data-loading-text="Loading...">'+
				'<i class="fa fa-plus" aria-hidden="true"></i>Add Variant</button>');

			$("#var_data").html(html_data.join(""));
		});
	});


	function addRowVariant(){
		var tableLength = $("#variantTable tbody tr").length;

        var tableRow;
        var count;

        if(tableLength > 0) {		
            tableRow = $("#variantTable tbody tr:last").attr('id');
            count = tableRow.substring(3);	
            count = Number(count) + 1;				
        } else {
            // no table row
            count = 1;
        }	
		
		html_data = [];
		html_data.push('<tr id="row'+count+'">');
		for(var i = 0; i<arguments.length; i++){
			html_data.push('<td><input type="text" class="form-control" name="'+arguments[i].name+'" id="varient_name'+count+'" placeholder="'+arguments[i].name+'"></td>');
		}		
		
		html_data.push('<td><input type="number" class="form-control" name="varient_qty" id="varient_qty'+count+'" placeholder="Varient Quantity"></td>'+
			'<td><input type="number" class="form-control" name="varient_price" id="varient_price'+count+'" placeholder="Varient Price"></td>'+
			'<td><input type="number" class="form-control" name="varient_sale_price" id="varient_sale_price'+count+'" placeholder="Varient Sale Price"></td>'+
		'</tr>');
		$("#variantTable tbody").append(html_data.join(""));
	}
</script>

<?php
	if(isset($_POST['submit'])){
		$product_title = $_POST['product_title'];
		$product_cat = $_POST['product_cat'];
		$cat = $_POST['cat'];
		$manufacturer_id = $_POST['manufacturer'];
		$product_price = $_POST['product_price'];
		$product_desc = $_POST['product_desc'];
		$product_keywords = $_POST['product_keywords'];

		$psp_price = $_POST['psp_price'];

		$product_label = $_POST['product_label'];

		$product_url = $_POST['product_url'];

		$product_features = $_POST['product_features'];

		$product_video = $_POST['product_video'];

		$status = "product";

		$product_img1 = $_FILES['product_img1']['name'];
		$product_img2 = $_FILES['product_img2']['name'];
		$product_img3 = $_FILES['product_img3']['name'];

		$temp_name1 = $_FILES['product_img1']['tmp_name'];
		$temp_name2 = $_FILES['product_img2']['tmp_name'];
		$temp_name3 = $_FILES['product_img3']['tmp_name'];

		move_uploaded_file($temp_name1,"product_images/$product_img1");
		move_uploaded_file($temp_name2,"product_images/$product_img2");
		move_uploaded_file($temp_name3,"product_images/$product_img3");

		$insert_product = "insert into products (p_cat_id,cat_id,manufacturer_id,date,product_title,product_url,product_img1,product_img2,product_img3,product_price,product_psp_price,product_desc,product_features,product_video,product_keywords,product_label,status) values ('$product_cat','$cat','$manufacturer_id',NOW(),'$product_title','$product_url','$product_img1','$product_img2','$product_img3','$product_price','$psp_price','$product_desc','$product_features','$product_video','$product_keywords','$product_label','$status')";

		$run_product = mysqli_query($con,$insert_product);

		if($run_product){
			echo "<script>alert('Product has been inserted successfully')</script>";
			echo "<script>window.open('index.php?view_products','_self')</script>";
		}

	}
?>
<?php } ?>