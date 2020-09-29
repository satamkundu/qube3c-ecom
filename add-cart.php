<?php
include_once 'functions/functions.php';
if(isset($_POST['add_cart'])){
    $ip_add = getRealUserIp();
    $p_id = $pro_id;
    // $product_qty = $_POST['product_qty'];
    // $product_size = $_POST['product_size'];
    $check_product = "select * from cart where ip_add = '$ip_add' AND p_id = '$p_id'";
    $run_check = mysqli_query($con,$check_product);
    if(mysqli_num_rows($run_check)>0){
        echo "<script>alert('This Product is already added in cart')</script>";
        echo "<script>history.back();</script>";
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
        echo "<script>history.back();</script>";
    }
}
?>