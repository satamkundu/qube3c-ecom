<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}else {
?>
<div class="row"><!-- 1 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <ol class="breadcrumb"><!-- breadcrumb Starts -->
            <li class="active">
                <i class="fa fa-dashboard"></i> Dashboard / View Brought Togather
            </li>
        </ol><!-- breadcrumb Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 1 row Ends -->

<div class="row"><!-- 2 row Starts -->
    <div class="col-lg-12"><!-- col-lg-12 Starts -->
        <div class="panel panel-default"><!-- panel panel-default Starts -->
            <div class="panel-heading"><!-- panel-heading Starts -->
                <h3 class="panel-title">
                    <i class="fa fa-money fa-fw"></i> View Brought Togather
                </h3>
            </div><!-- panel-heading Ends -->
            <div class="panel-body"><!-- panel-body Starts -->
                <div class="table-responsive"><!-- table-responsive Starts --->
                    <table class="table table-bordered table-hover table-striped"><!-- table table-bordered table-hover table-striped Starts -->
                        <thead><!-- thead Starts -->
                            <tr>
                                <th>#</th>
                                <th>Product 1 Id:</th>
                                <th>Product 2:</th>
                                <th>Delete</th>
                            </tr>
                        </thead><!-- thead Ends --> 
                        <tbody><!-- tbody Starts -->
                        <?php
                            $i = 0;
                            $user_id = $_SESSION['admin_qube_id'];
                            $get_br_1 = "SELECT product_id, brought_togather_product_id from products WHERE brought_togather = 'yes' AND user_id = '$user_id'";
                            $run_br_1 = mysqli_query($con,$get_br_1);                          

                            while($row_br_1 = mysqli_fetch_array($run_br_1)){
                                $br_1_id = $row_br_1['product_id'];
                                $brought_togather_product_id = $row_br_1['brought_togather_product_id'];

                                $get_br_2 = "SELECT product_id from products WHERE id='$brought_togather_product_id'";
                                $run_br_2 = mysqli_query($con,$get_br_2);
                                $row_br_2 = mysqli_fetch_array($run_br_2);
                                $br_2_id = $row_br_2['product_id'];

                                $i++;
                            ?>
                            <tr>
                                <td><?php echo $i; ?></td>
                                <td><?php echo $br_1_id; ?></td>
                                <td><?php echo $br_2_id; ?></td>
                                <td>
                                    <a href="index.php?delete_brought_togather=<?=$br_1_id?>&sec=<?=$br_2_id?>">
                                        <i class="fa fa-trash-o"></i> Delete
                                    </a>
                                </td>
                            </tr>
                        <?php } ?>
                        </tbody><!-- tbody Ends -->
                    </table><!-- table table-bordered table-hover table-striped Ends -->
                </div><!-- table-responsive Ends --->
            </div><!-- panel-body Ends -->
        </div><!-- panel panel-default Ends -->
    </div><!-- col-lg-12 Ends -->
</div><!-- 2 row Ends -->
<?php } ?>