<?php
include_once '../includes/db.php';
if($_POST){
    // print_r($_POST);
    // if(is_array($_FILES)) {
    //     print_r($_FILES);
    // }
    // print_r($_POST['variant_original_id']);
    $variant_original_id = array();
    $variant_original_id = $_POST['variant_original_id'];

    $variant_original_id_string = implode(",", $variant_original_id);

    $variant_original_data = array();
    $variant_original_data = $_POST['variant_original_data'];
    

    // for($i = 0; $i < count($_POST['variant_original_data']); $i++){
    //     $vari_val = "";
    //     for($j = 0; $j < count($variant_original_data); $j++){
    //         $vari_val .= $_POST[$variant_original_data[$j]][$i].",";

    //         $vari_qty = $_POST['varient_qty'][$i];
    //         $vari_price = $_POST['varient_price'][$i];
    //         $vari_sale_price = $_POST['varient_sale_price'][$i];
    //     }
    //     $vari_val = substr($vari_val, 0, -1);
    //     echo $vari_price;
    // }

   
    $product_id = rand(100000,999999); //6 digit product id
    
    $product_title = $_POST['product_title'];
    $product_url = $_POST['product_url'];
    $manufacturer = $_POST['manufacturer'];
    $product_cat = $_POST['product_cat'];
    $cat = $_POST['cat'];
    
    $product_keywords = $_POST['product_keywords'];
    $product_desc = $_POST['product_desc'];
    $product_features = $_POST['product_features'];
    $product_label = $_POST['product_label'];
    $user_id = $_POST['user_id'];

    $date = date('Y-m-d');

    $has_variant = $_POST['has_variant'];

    $has_variant = strtolower($has_variant);

    $product_img1 = $_FILES['product_img1']['name'];
    $product_img2 = $_FILES['product_img2']['name'];
    $product_img3 = $_FILES['product_img3']['name'];

    $temp_name1 = $_FILES['product_img1']['tmp_name'];
    $temp_name2 = $_FILES['product_img2']['tmp_name'];
    $temp_name3 = $_FILES['product_img3']['tmp_name'];
    

    if(move_uploaded_file($temp_name1,"../product_images/$product_img1") && move_uploaded_file($temp_name2,"../product_images/$product_img2") && move_uploaded_file($temp_name3,"../product_images/$product_img3")){
        $sql = "INSERT INTO `products` (`product_id`, `p_cat_id`, `cat_id`, `manufacturer_id`, `date`, `product_title`, `product_url`, `product_img1`, `product_img2`, `product_img3`, `product_desc`, `product_features`, `product_keywords`, `product_label`, `brought_togather_product_id`, `brought_togather`, `user_id`) VALUES ('$product_id', '$product_cat', '$cat', '$manufacturer', '$date', '$product_title', '$product_url', '$product_img1', '$product_img2', '$product_img3', '$product_desc', '$product_features', '$product_keywords', '$product_label', '0', 'no', '$user_id')";
        if(mysqli_query($con, $sql)){
            $last_inserted_id = mysqli_insert_id($con);
            $sql_has_variant = "INSERT INTO `has_variant` (`product_id`, `value`) VALUES ('$last_inserted_id', '$has_variant')";
            if(mysqli_query($con, $sql_has_variant)){
                $process = "0";
                if($has_variant == 'no'){
                    $product_qty = $_POST['product_qty'];
                    $product_price = $_POST['product_price'];
                    $psp_price = $_POST['psp_price'];
                    $default_price = $product_price;
                    $sql_variant_no = "INSERT INTO `product_master` (`product_id`, `uploaded_by_user_id`, `total_qty`, `remain_qty`, `default_price`, `sale_price`) VALUES ('$last_inserted_id', '$user_id', '$product_qty', '$product_qty', '$product_price', '$psp_price')";
                    mysqli_query($con, $sql_variant_no);
                    $process = "1";
                    if($process == "1"){
                        $sql_product_upload = "INSERT INTO `product_upload_details` (`user_id`, `product_id`, `inserted_product_qty`, `upload_date`) VALUES ('$user_id', '$last_inserted_id', '$product_qty', '$date')";
                        mysqli_query($con, $sql_product_upload);
                    }
                }elseif ($has_variant == 'yes') {
                    $product_total_qty = 0;
                    $default_price = 0;
                    $sale_price = 0;
                    for($i = 0; $i < count($variant_original_data) ; $i++){
                        for($i = 0; $i < count($_POST['variant_original_data']); $i++){
                            $vari_val = "";
                            for($j = 0; $j < count($variant_original_data); $j++){
                                $vari_val .= $_POST[$variant_original_data[$j]][$i].",";

                                $vari_qty = $_POST['varient_qty'][$i];
                                $vari_price = $_POST['varient_price'][$i];
                                $vari_sale_price = $_POST['varient_sale_price'][$i];

                                $product_total_qty += $vari_qty;
                                $default_price = $vari_price;
                                $sale_price = $vari_sale_price;
                            }
                            $vari_val = substr($vari_val, 0, -1);
                            $sql_variant_data = "INSERT INTO `variant_data` (`variant_id`, `variant_value`, `product_id`) VALUES ('$variant_original_id_string', '$vari_val', '$last_inserted_id')";
                            if(mysqli_query($con, $sql_variant_data)){
                                $last_inserted_variant_id = mysqli_insert_id($con);
                                $sql_variant_master_data = "INSERT INTO `variant_data_master` (`product_id`, `variant_data_number`, `qty`, `price`, `sale_price`) VALUES ('$last_inserted_id', '$last_inserted_variant_id', '$vari_qty', '$vari_price', '$vari_sale_price')";
                                mysqli_query($con, $sql_variant_master_data);
                            }
                        }
                    }
                    $sql_variant_no = "INSERT INTO `product_master` (`product_id`, `uploaded_by_user_id`, `total_qty`, `remain_qty`, `default_price`, `sale_price`) VALUES ('$last_inserted_id', '$user_id', '$product_total_qty', '$product_total_qty', '$default_price', '$sale_price')";
                    mysqli_query($con, $sql_variant_no);
                    $process = "1";  
                    if($process == "1"){
                        $sql_product_upload = "INSERT INTO `product_upload_details` (`user_id`, `product_id`, `inserted_product_qty`, `upload_date`) VALUES ('$user_id', '$last_inserted_id', '$product_total_qty', '$date')";
                        mysqli_query($con, $sql_product_upload);
                    }                  
                }                
            }
        }
    }
    echo "Product Uploded Successfully";
}
?>