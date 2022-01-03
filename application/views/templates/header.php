<!doctype html>
<html lang="en">

<head>
    <?php 
$controller = $this->router->fetch_class();
    ?>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href='<?php echo base_url("assets/assets/css/bootstrap.min.css");?>' rel="stylesheet">
  <link href="assets/assets/css/bootstrap.css" rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/font-awesome.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/searchbar.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/style.css");?>' rel="stylesheet">
  <?php if(in_array($controller, ['cart', 'profile','category'])){?>
  <link href='<?php echo base_url("assets/assets/css/cart.css");?>' rel="stylesheet">
  <?php } ?>
  <?php if($controller == 'order'){?>
  <link href='<?php echo base_url("assets/assets/css/checkout.css");?>' rel="stylesheet">
  <?php } ?>
  <?php if($controller == 'product'){?>
  <link href='<?php echo base_url("assets/assets/css/thumbanil.css");?>' rel="stylesheet">
  <?php } ?>
  <!-- <link href='<?php echo base_url("assets/assets/css/headersearch.css");?>' rel="stylesheet"> -->
  <!-- header serach css removed -->
  <?php if($controller == 'order'){?>
    <link href='<?php echo base_url("assets/assets/css/order.css");?>' rel="stylesheet">
  <?php } ?>
  <link href='<?php echo base_url("assets/assets/css/navbar.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/swiper.min.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/easyzoom.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/main.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/review.css");?>' rel="stylesheet">
  <link rel="icon" href="<?php echo base_url("assets/img/askmee.ico");?>" type="image/png">
  <title>askmee.in</title>
</head>
<body>  
    <style>

    .sidenav {
  height: 100%;
  width: 0;
  position: fixed;
  z-index: 1;
  top: 0;
  left: 0;
  background-color: #fff;
  overflow-x: hidden;
  transition: 0.5s;
  padding-top: 60px;
}

.sidenav a {
  padding: 8px 8px 8px 32px;
  text-decoration: none;
  font-size: 25px;
  color: #000;
  display: block;
  transition: 0.3s;
}

.sidenav a:hover {
  color: #f1f1f1;
}

.sidenav .closebtn {
  position: absolute;
  top: 0;
  right: 25px;
  font-size: 36px;
  margin-left: 50px;
}
.sidenav-hamburger{
    font-size: 20px;
    cursor: pointer;
    display: inline;
    position: absolute;
    right: 21px;
    margin-top: 7px;
}

@media screen and (max-height: 450px) {
  .sidenav {padding-top: 15px;}
  .sidenav a {font-size: 18px;}
}


.cross {
    padding: 10px;
    color: #d6312d;
    cursor: pointer;
    font-size: 23px
}

.cross i {
    margin-top: -5px;
    cursor: pointer
}

.comment-box {
    padding: 5px
}

.comment-area textarea {
    resize: none;
    border: 1px solid #ff0000
}

.form-control:focus {
    color: #495057;
    background-color: #fff;
    border-color: #ffffff;
    outline: 0;
    box-shadow: 0 0 0 1px rgb(255, 0, 0) !important
}

.send {
    color: #fff;
    background-color: #ff0000;
    border-color: #ff0000
}

.send:hover {
    color: #fff;
    background-color: #f50202;
    border-color: #f50202
}

.rating {
    display: inline-flex;
    margin-top: -10px;
    flex-direction: row-reverse
}

.rating>input {
    display: none
}

.rating>label {
    position: relative;
    width: 28px;
    font-size: 35px;
    color: #f6ca27;
    cursor: pointer
}

.rating>label::before {
    content: "\2605";
    position: absolute;
    opacity: 0
}

.rating>label:hover:before,
.rating>label:hover~label:before {
    opacity: 1 !important
}

.rating>input:checked~label:before {
    opacity: 1
}

.rating:hover>input:checked~label:before {
    opacity: 0.4
}


</style>



<?php
   $method = 'method';
   if($controller == 'login'){
     $method = $this->router->fetch_method();
   } ?>
  
  <div class="container-fluid header-new">
    <input type="hidden" id="baseUrl" value="<?php echo base_url(''); ?>">
    <header id="masthead" class="site-header site-header-background " role="banner">
            <!-- start of mini header -->
            <!-- .end of contacts mini header -->
            <!--start of site branding search-->
            <div class="container-fluid bg-white">
                <div class="row">

                    <div class="col-md-4 logo-container">

                        <a href="<?php echo base_url(''); ?>" class="custom-logo-link" rel="home">
                            <img src="<?php echo base_url("assets/assets/img/PNG_LOGO_1.png");?>" class="custom-logo" alt="">
                        </a>
                        <div class="site-branding-text">
                            <h1 class="site-title">
                                <a href="<?php echo base_url(''); ?>" rel="home"></a>
                            </h1>
                        </div>
                    </div>
                    

                    <div class="col-sm-2 cart-mob">
                        <img src="<?php echo base_url("assets/assets/img/PNG_ICON_1.png");?>" style="width: 50px;display: inline;margin-left:27px;">&nbsp
                        <span class="sidenav-hamburger" onclick="openNav()">&#9776;</span>
                                  
</div>

   
                        <!-- <span class="text" style="display: inline;">Login</span> -->
                    
                   

                    <div class="col-md-5 col-xs-offset-2">
                        <!-- <div class="col-md-8 serach-bar">
            <div class="input-group mb-3"> <input type="text" class="form-control input-text" placeholder="Search products...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                <div class="input-group-append"> <button class="btn btn-outline-warning btn-lg" type="button"><i class="fa fa-search"></i></button> </div>
            </div>
        </div> -->
                        <?php if($controller != 'login'){ ?>
                        <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                        <div class="nvleft">
                                            <select id="catSelect" class="catselect-css" style="width: 141.2px;">
                                                <option value="0">All Categories</option>
                                                <?php 
                                                foreach ($category as $row) {
                                                    echo("<option value='".$row->c_id."'>".$row->category_name."</option>");
                                                }?> 

                                            </select>
                                        </div>

                                        <div class="nvfill height_full" style="width: calc(100% - 50px);">
                                            <input class="header_search_input" type="search"
                                                style="height: 35px;width:100%;font-weight:lighter;color:#444;"
                                                id="search-box" name="q" placeholder="Search for products"
                                                title="Search for products" required="" autocomplete="off">
                                                <ul class="output" style="display:none;"></ul>
                                            <div id="suggesstion-box"></div>
                                        </div>

                                        <div class="nvright">
                                            <button type="submit" class="header_search_button trans_300" value="Submit"
                                                style="height:  35px"><img class="s-icon" src="<?php echo base_url('assets/img/search.png'); ?>"
                                                    alt=""></button>
                                        </div>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    </div>
                    <!--------------------------------------->
                    <div class="col-md-3 col-sm-12  cart-web">
                        <div class="row">
                            <div class="col-md-4 col-sm-4">
                                <a href="<?php echo base_url('/cart'); ?>">
                                    <div class="text-center" style="margin: 0 auto; margin-top: 7px;">
                                        <img src="<?php echo base_url("assets/assets/img/PNG_ICON_1.png");?>" style="width: 50px;display: inline;">
                                        <span class="text" style="display: inline;margin-left: -9px;">Cart</span>
                                    </div>
                                </a> 
                            </div>
                        <?php if (isset($_SESSION['user'])) { ?>
                            <div class="col-md-3  col-sm-4">
                                <a href="<?php echo base_url('login/logout'); ?>">
                                    <div class="text-center" style="margin: 0 auto; margin-top: 16px;">
                                        <span class="text" style="display: inline;">Logout</span>
                                    </div>
                                </a> 
                            </div>
                        <?php
                        } 
                        else{ ?>
                            <div class="col-md-3  col-sm-4">
                                <a href="<?php echo base_url('/login'); ?>">
                                    <div class="text-center" style="margin: 0 auto; margin-top: 16px;">
                                        <span class="text" style="display: inline;">Login</span>
                                    </div>
                                </a> 
                            </div>
                        <?php } ?>
                            <div class="col-md-3 col-sm-4">
                                <a href="<?php echo base_url('/profile'); ?>">
                                    <div class="text-center" style="margin: 0 auto; margin-top: 16px;">
                                        <span class="text" style="display: inline;">Profile</span>
                                    </div>
                                </a>
                                <!-- <div class="dropdown" style="margin-top: 10px;">
                                    <button class="btn btn-secondary dropdown-toggle user-btn" type="button"
                                        id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                                        User
                                    </button>
                                    <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                                        <li><a class="dropdown-item" href="userprofile.html">Profile</a></li>
                                        <li><a class="dropdown-item" href="order.html">Orders</a></li>
                                        <li><a class="dropdown-item" href="login.html">Logout</a></li>
                                    </ul>
                                </div> -->
                            </div>
                        </div>
                    </div>
                </div> <div id="mySidenav" class="sidenav">
                    <a href="javascript:void(0)" class="closebtn" onclick="closeNav()">&times;</a>
                    <a href="#">Profile</a>
                    <a href="#">Logout</a>
                    </div> 
                        </div>
                <!-- .end of site-branding -->
            </div>
        </header>