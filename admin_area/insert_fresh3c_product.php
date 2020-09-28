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
						<i class="fa fa-dashboard"> </i> Dashboard / Insert Fresh3c Products
					</li>
				</ol><!-- breadcrumb Ends -->
			</div><!-- col-lg-12 Ends -->
		</div><!-- row Ends -->
		
		<div class="row"><!-- 2 row Starts --> 
			<div class="col-lg-12"><!-- col-lg-12 Starts -->
				<div class="panel panel-default"><!-- panel panel-default Starts -->
					<div class="panel-heading"><!-- panel-heading Starts -->
						<h3 class="panel-title">
							<i class="fa fa-money fa-fw"></i> Insert Fresh3c Products
						</h3>
					</div><!-- panel-heading Ends -->
					<div class="alert alert-success" role="alert" id="show-response" style="display:none"></div>
					<div class="text-center" style="display:none" id="loading-sec">
						<img src="admin_images/assets/loading.gif">
						<h4>Please Wait.....</h4>
					</div>
					<div class="panel-body"><!-- panel-body Starts -->
						<form class="form-horizontal" id="product_upload_form" method="post" enctype="multipart/form-data"><!-- form-horizontal Starts -->
							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Title </label>
								<div class="col-md-6" >
									<input type="text" id="product_title" name="product_title" class="form-control" required >
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Product Url </label>
								<div class="col-md-6" >
									<input type="text" id="product_url" name="product_url" class="form-control" required>									
									<p style="font-size:1rem;text-align: right; font-weight:bold;">Product Url Example : navy-blue-t-shirt</p>
								</div>
							</div><!-- form-group Ends -->

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" > Specific Menu </label>
								<div class="col-md-9" >
								<?php
										$get_header_menu = "select * from fresh_3c_items";
										$run_header_menu = mysqli_query($con,$get_header_menu);
										while($row_header_menu= mysqli_fetch_array($run_header_menu)){
											$header_menu_id = $row_header_menu['id'];
											$header_menu_title = $row_header_menu['title'];
											echo '<input type="checkbox" class="header_menu" name="header_menu[]" id="header_menu'.$header_menu_id.'" value="'.$header_menu_id.'"><label style="cursor:pointer" for="header_menu'.$header_menu_id.'">'.$header_menu_title.'</label>';
											echo "<br>";
										}
									?>
								</div>
							</div>

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
								<div class="col-md-12 text-center vari_id">
									<?php
										$get_cat = "select * from variants";
										$run_cat = mysqli_query($con,$get_cat);	
										$varient_count = 1;									
										while ($row_cat=mysqli_fetch_array($run_cat)) {
											$variant_id = $row_cat['id'];
											$variant_name = $row_cat['variant_name'];
											echo '<input type="checkbox" onclick="store_variant_id('.$variant_id.')" name="variant_mn" id="variant_main'.$variant_id.'" value="'.$variant_name.'"><label style="cursor:pointer" for="variant_main'.$variant_id.'">'.$variant_name.'</label>';
											echo str_repeat('&nbsp;',15);
											$varient_count ++;
										}										
									?>
									<button style="display:inline" type="button" class="btn btn-success" id="add_var">
										<i class="fa fa-plus" aria-hidden="true"></i>										
									</button>
								</div>
								<div id="var_data"></div>
							</div>

							<div id="variant_data_store_div"></div>

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

							<input type="hidden" name="user_id" value="<?=(isset($_SESSION['admin_qube_id']))?$_SESSION['admin_qube_id']:'';?>">

							<div class="form-group" ><!-- form-group Starts -->
								<label class="col-md-3 control-label" ></label>
								<div class="col-md-6" >
									<input type="submit" id="product_submit" name="submit" value="Insert Fresh3c Product" class="btn btn-primary form-control" >
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
	var variant = {
		'variant_id' : [],
		'variant_data' : []
	}

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
			html_data = [];
			html_data.push('<table class="table" style="width: 100%;" id="variantTable">'+
				'<tbody>'+				
					'<tr id="row1">');
			var cnt = 1;
			for(var i = 0; i< variant.variant_id.length; i++){
				console.log(variant.variant_data[i].value);
				html_data.push('<td><input type="text" class="form-control" name="'+variant.variant_data[i].value+'[]" id="varient_name'+cnt+'" placeholder="'+variant.variant_data[i].value+'"></td>');
			}
			
			html_data.push('<td><input type="number" class="form-control" name="varient_qty[]" id="varient_qty1" placeholder="Varient Quantity"></td>'+
						'<td><input type="number" class="form-control" name="varient_price[]" id="varient_price1" placeholder="Varient Price"></td>'+
						'<td><input type="number" class="form-control" name="varient_sale_price[]" id="varient_sale_price1" placeholder="Varient Sale Price"></td>'+
					'</tr>'+
				'</tbody>'+
			'</table>'+
			'<button type="button" class="btn btn-success btn-circle" onclick="addRowVariant()" id="addRowBtn" data-loading-text="Loading...">'+
				'<i class="fa fa-plus" aria-hidden="true"></i>Add Variant</button>');

			$("#var_data").html(html_data.join(""));
		});		

		$("#product_upload_form").on('submit',function(e){
			e.preventDefault();

			var tableLength = $("#variantTable tbody tr").length;

            var tableRow;
			var count;

			$('#product_submit').prop('disabled', true);
			$("#loading-sec").show();
			$(".panel-body").hide();
			$.ajax({
				url: "process/upload_fresh3c.php",
				type: "POST",
				data:  new FormData(this),
				contentType: false,
				cache: false,
				processData:false,
				success: function(data){
					$("#show-response").show();
					$('#show-response').delay(5000).fadeOut('slow');
					$("#loading-sec").hide();
					$(".panel-body").show();
					$("#show-response").html(data);
					$('#product_submit').prop('disabled', false);
				},
				error: function(){} 	        
			});
		});
	});
	function store_variant_id(id){
		if (document.getElementById('variant_main'+id).checked){
			variant.variant_id.push({id});
			var value = $("#variant_main"+id).val();
			variant.variant_data.push({ value });
			input = jQuery('<input type="hidden" name="variant_original_id[]" value="'+id+'">');
			jQuery('#product_upload_form').append(input);
			input = jQuery('<input type="hidden" name="variant_original_data[]" value="'+value+'">');
			jQuery('#product_upload_form').append(input);
		}
	}

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
		for(var i = 0; i < variant.variant_id.length; i++){
			html_data.push('<td><input type="text" class="form-control" name="'+variant.variant_data[i].value+'[]" id="varient_name'+count+'" placeholder="'+variant.variant_data[i].value+'"></td>');
		}		
		
		html_data.push('<td><input type="number" class="form-control" name="varient_qty[]" id="varient_qty'+count+'" placeholder="Varient Quantity"></td>'+
			'<td><input type="number" class="form-control" name="varient_price[]" id="varient_price'+count+'" placeholder="Varient Price"></td>'+
			'<td><input type="number" class="form-control" name="varient_sale_price[]" id="varient_sale_price'+count+'" placeholder="Varient Sale Price"></td>'+
		'</tr>');
		$("#variantTable tbody").append(html_data.join(""));
	}
</script>
<?php } ?>