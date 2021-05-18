<!doctype html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">

  <!-- Bootstrap CSS -->
  <link href='<?php echo base_url("assets/assets/css/bootstrap.min.css");?>' rel="stylesheet">
  <!-- <link href="assets/css/bootstrap-combined.no-icons.min.css" rel="stylesheet"> -->
  <link href='<?php echo base_url("assets/assets/css/font-awesome.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/searchbar.css");?>' rel="stylesheet">
  <link href='<?php echo base_url("assets/assets/css/style.css");?>' rel="stylesheet">
  <title>askmee.in</title>
</head>
<body>

  <div class="container-fluid">
    <header id="masthead" class="site-header site-header-background " role="banner">

      <!-- start of mini header -->

      <!-- .end of contacts mini header -->

      <!--start of site branding search-->
      <div class="container-fluid ">
        <div class="row">

          <div class="col-md-4 logo-container">

            <a href="#" class="custom-logo-link" rel="home">
              <img src='<?php echo base_url("assets/assets/img/PNG_LOGO_1.png");?>' class="custom-logo" alt="">
            </a>
            <div class="site-branding-text">
              <h1 class="site-title">
                <a href="#" rel="home"></a>
              </h1>
            </div>
          </div>
          <div class="col-sm-2 cart-mob">
            <img src='<?php echo base_url("assets/assets/img/PNG_ICON_1.png");?>' style="width: 50px;display: inline;">
            <span class="text" style="display: inline;">Cart</span>
          </div>

          <div class="col-md-6 col-xs-offset-2">
            <div class="col-md-8 serach-bar">
              <div class="input-group mb-3"> <input type="text" class="form-control input-text" placeholder="Search products...." aria-label="Recipient's username" aria-describedby="basic-addon2">
                  <div class="input-group-append"> <button class="btn btn-outline-warning btn-lg" type="button"><i class="fa fa-search"></i></button> </div>
              </div>
          </div>
          </div>
          <!--------------------------------------->
          <div class="col-md-2 col-sm-2  cart-web" style="margin-top: 50px;">
            <img src='<?php echo base_url("assets/assets/img/PNG_ICON_1.png");?>' style="width: 50px;display: inline;">
            <span class="text" style="display: inline;">Cart</span>
            <img src='<?php echo base_url("assets/assets/img/PNG_ICON_5.png");?>' style="width: 50px;display: inline;">
            <span class="text" style="display: inline;"><a href="<?php echo base_url('/login'); ?>">Login</a></span> 
          </div>

        </div>
        <!-- .end of site-branding -->
      </div>
  </div>
  <!-- .end of site-branding, search -->
  </header>