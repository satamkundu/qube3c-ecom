<?php
session_start();
	include("includes/db.php");
	include("includes/top.php");
    include("includes/header.php");
?>

    <div class="container m-5" ><!-- container Starts -->
        <div class="col-md-12" ><!-- col-md-12 Starts -->
            <div class="box" ><!-- box Starts -->
                <?php
                    $get_about_us = "select * from about_us";
                    $run_about_us = mysqli_query($con,$get_about_us);
                    if(mysqli_num_rows($run_about_us)){
                        $row_about_us = mysqli_fetch_array($run_about_us);
                        $about_heading = $row_about_us['about_heading'];
                        $about_short_desc = $row_about_us['about_short_desc'];
                        $about_desc = $row_about_us['about_desc'];                                      
                ?>
                <h1> <?php echo $about_heading; ?> </h1>
                <p class="lead"> <?php echo $about_short_desc; ?> </p>
                <p> <?php echo $about_desc; ?> </p>
                    <?php }else{
                        echo "<div class='text-center'>No Content Found</div>";
                    } ?>
            </div><!-- box Ends -->
        </div><!-- col-md-12 Ends -->
    </div><!-- container Ends -->
<?php include("includes/footer.php"); ?>
</body>
</html>