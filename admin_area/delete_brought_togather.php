<?php
if(!isset($_SESSION['admin_email'])){
echo "<script>window.open('login.php','_self')</script>";
}else {
?>
<?php
if(isset($_GET['delete_brought_togather'])){
    $delete_id_1 = $_GET['delete_brought_togather'];
    $delete_id_2 = $_GET['sec'];
    $delete_brought_togather = "UPDATE products SET brought_togather = 'no', brought_togather_product_id = '0' WHERE product_id='$delete_id_1';";
    $delete_brought_togather .= "UPDATE products SET brought_togather = 'no', brought_togather_product_id = '0' WHERE product_id='$delete_id_2';";
    $run_brought_togather = mysqli_multi_query($con,$delete_brought_togather);
    if($run_brought_togather){
        echo "<script>alert('Deleted')</script>";
        echo "<script>window.open('index.php?view_brought_togather','_self')</script>";
    }
}
?>
<?php } ?>