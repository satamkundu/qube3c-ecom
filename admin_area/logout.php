<?php
session_start();
$user_type = $_SESSION['user_type'];
session_destroy();
if($user_type == "1")
    echo "<script>window.open('../','_self')</script>";
else
    echo "<script>window.open('../seller-panel.php','_self')</script>";
?>