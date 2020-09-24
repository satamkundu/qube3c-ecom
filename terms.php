<?php
session_start();
	include("includes/db.php");
	include("includes/top.php");
	include("includes/header.php");
?>
	<div class="container mb-5">
		<div class="row">
			<div class="col-md-12 mt-5 mb-5"><h3>Terms of use</h3></div>
			<div class="col-3">
			<div class="nav flex-column nav-pills" id="v-pills-tab" role="tablist" aria-orientation="vertical">
			<?php
					$get_terms = "select * from terms LIMIT 0,1";
					$run_terms = mysqli_query($con,$get_terms);
					while($row_terms = mysqli_fetch_array($run_terms)){
						$term_title = $row_terms['term_title'];
						$term_link = $row_terms['term_link'];
				?>
				<a class="nav-link active" id="v-pills-home-tab" data-toggle="pill" href="#<?php echo $term_link; ?>" role="tab" aria-controls="v-pills-home" aria-selected="true"><?php echo $term_title; ?></a>
				<?php } ?>
				<?php
					$count_terms = "select * from terms";
					$run_count = mysqli_query($con,$count_terms);
					$count = mysqli_num_rows($run_count);
					$get_terms = "select * from terms LIMIT 1,$count";
					$run_terms = mysqli_query($con,$get_terms);
					while($row_terms = mysqli_fetch_array($run_terms)){
						$term_title = $row_terms['term_title'];
						$term_link = $row_terms['term_link'];
				?>
					<a class="nav-link" id="v-pills-profile-tab" data-toggle="pill" href="#<?php echo $term_link; ?>" role="tab" aria-controls="v-pills-profile" aria-selected="false"><?php echo $term_title; ?></a>
					<!-- <a class="nav-link" id="v-pills-messages-tab" data-toggle="pill" href="#v-pills-messages" role="tab" aria-controls="v-pills-messages" aria-selected="false">Messages</a> -->
				<?php } ?>
			</div>
			</div>
			<div class="col-9">
				<div class="tab-content" id="v-pills-tabContent">
					<?php
						$get_terms = "select * from terms LIMIT 0,1";
						$run_terms = mysqli_query($con,$get_terms);
						while($row_terms = mysqli_fetch_array($run_terms)){
							$term_title = $row_terms['term_title'];
							$term_desc = $row_terms['term_desc'];
							$term_link = $row_terms['term_link'];
					?>
					<div class="tab-pane fade show active" id="<?php echo $term_link; ?>" role="tabpanel" aria-labelledby="v-pills-home-tab">
						<h4><?php echo $term_title; ?> </h4>
						<p><?php echo $term_desc; ?></p>
					</div>
					<?php } ?>
					<?php
						$count_terms = "select * from terms";
						$run_count = mysqli_query($con,$count_terms);
						$count = mysqli_num_rows($run_count);
						$get_terms = "select * from terms LIMIT 1,$count";
						$run_terms = mysqli_query($con,$get_terms);
						while($row_terms = mysqli_fetch_array($run_terms)){
							$term_title = $row_terms['term_title'];
							$term_desc = $row_terms['term_desc'];
							$term_link = $row_terms['term_link'];
					?>
					<div class="tab-pane fade" id="<?php echo $term_link; ?>" role="tabpanel" aria-labelledby="v-pills-profile-tab">
					<h4><?php echo $term_title; ?> </h4>
						<p><?php echo $term_desc; ?></p>
					</div>
					<?php } ?>			     
				</div>
			</div>
		</div>
	</div>
	<?php include("includes/footer.php"); ?>
	</body>
</html>