<?php include_once 'functions/functions.php'; ?>
<header>
    <div class="main-header py-4">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-2 col-sm-6">
                    <nav class="navbar navbar-expand-lg navbar-light p-0">
                        <ul class="navbar-nav d-flex">
                            <div class="nav-item dropdown">
                                <a class="nav-link dropdown-toggle btn-drop-down" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="fa fa-bars"></i></a>
                                <div class="dropdown-menu category" aria-labelledby="navbarDropdown">
                                    <div class="hello"><i class="fa fa-user"></i><span>Hello, <?php if(isset($_SESSION['customer_name'])) echo $_SESSION['customer_name']; ?></span></div>
                                    <div class="shop-by-title"><p>Shop By Category</p></div>
                                    <li><a class="dropdown-item" href="#">Costume</a></li>
                                    <li><a class="dropdown-item" href="#">Culture</a></li>
                                    <li><a class="dropdown-item" href="#">Cuisine</a></li>
                                    <li><a class="dropdown-item" href="#">Fresh Vegetables</a></li>
                                    <li><a class="dropdown-item" href="#">Fresh Meat</a></li>
                                    <li><a class="dropdown-item" href="#">Fresh Fish</a></li>
                                </div>
                            </div>
                        </ul>
                        <div class="brand ml-3"><a href="index.php"><img src="images/logo.png"></a></div>
                    </nav>
                </div>
                <div class="col-lg-7 col-sm-6">
                    <form class="form-inline my-2 my-lg-0 form-top">
                        <input class="form-control mr-sm-2 search-main" type="search" placeholder="Search Quabe3c.com" aria-label="Search">
                        <button class="btn-form-submitt" type="submit"><i class="fa fa-search"></i></button>
                    </form>
                    </div>
                        <div class="col-lg-3 px-5 account col-sm-6">
                        <div class="text-right account-info">
                        <ul class="list-inline">
                            <?php 
                                if(isset($_SESSION['customer_email'])){
                            ?>
                            <li class="list-inline-item"><a href="my_account.php"><i class="fa fa-user-o"></i>Account</a></li>
                            <li class="list-inline-item"><a href="logout.php"><i class="fa fa-sign-out"></i>Logout</a></li>
                            <?php }else{
                                ?>
                                <li class="list-inline-item"><a href="login.php"><i class="fa fa-user-o"></i>Login</a></li>
                                <li class="list-inline-item"><a href="account.php"><i class="fa fa-user-o"></i>Register</a></li>
                                <?php
                            } ?>
                            <li class="list-inline-item">
                                <a href="#">
                                    <i class="fa fa-shopping-cart"></i>
                                    <span class='badge badge-warning' id='lblCartCount'> <?php items(); ?> </span>
                                </a>
                            </li>                            
                        </ul>
                    </div>
                </div>
            </div>
        </div>	
    </div>

    <style>
        .badge {
            padding-left: 9px;
            padding-right: 9px;
            -webkit-border-radius: 9px;
            -moz-border-radius: 9px;
            border-radius: 9px;
            }

            .label-warning[href],
            .badge-warning[href] {
            background-color: #c67605;
            }
            #lblCartCount {
                font-size: 12px;
                background: #ff0000;
                color: #fff;
                padding: 0 5px;
                vertical-align: top;
                margin-left: -10px; 
            }
    </style>

    <div class="sub-header">
        <div class="container-fluid">
            <div class="row">
                <div class="col-lg-3 pr-0">
                    <label class="switch">
                        <input type="checkbox" id="fresh_check">
                        <span class="slider round"></span>
                    </label>
                    <span class="fresh-3c px-4">Fresh 3C</span>
                    <span class="map-des"><i class="fa fa-map-marker"></i>Delevering to 781005</span>
                </div>

                <div class="col-lg-9">
                    <nav class="navbar navbar-expand-lg navbar-light m-0 p-0">
                        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                            <span class="navbar-toggler-icon"></span>
                        </button>

                        <div class="collapse navbar-collapse" id="navbarSupportedContent">
                            <ul class="navbar-nav">
                                <li class="nav-item active">
                                    <a class="nav-link" style="font-size:1rem" href="#">Attres for You <span class="sr-only">(current)</span></a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:1rem" href="#">Test the Taste</a>
                                </li>                                
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:1rem" href="#">Turn House to Home</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:1rem" href="#">Gillers & Gold</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:1rem" href="#">Kicking Beverages</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:1rem" href="#">Arts & You</a>
                                </li>
                                <li class="nav-item">
                                    <a class="nav-link" style="font-size:1rem" href="#">Its Called Present</a>
                                </li>
                            </ul>                        
                        </div>
                    </nav>
                </div>
            </div>
        </div>
    </div>
</header>
<script>    
    $(document).ready(function(){
        var path = $(location).attr('pathname');
        if(path == '/sudipta/qube3c/fresh3c.php'){
            document.getElementById("fresh_check").checked = true;
        }
    });
</script>