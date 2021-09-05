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
  <link href='<?php echo base_url("assets/assets/css/thumbanil.css");?>' rel="stylesheet">
  <title>askmee.in</title>
</head>
<body>
<?php
   $controller = $this->router->fetch_class();
   $method = 'method';
   if($controller == 'login'){
     $method = $this->router->fetch_method();
   } ?>
  
  <div class="container-fluid">
    <header id="masthead" class="site-header site-header-background " role="banner">
      <!-- start of mini header -->

      <!-- .end of contacts mini header -->

      <!--start of site branding search-->
      <div class="container-fluid ">
        <div class="row">

          <div class="col-md-3 logo-container">

            <a href="<?php echo base_url(''); ?>" class="custom-logo-link" rel="home">
              <img src='<?php echo base_url("assets/assets/img/PNG_LOGO_1.png");?>' class="custom-logo" alt="">
            </a>
            <div class="site-branding-text">
              <h1 class="site-title">
                <a href="<?php echo base_url(''); ?>" rel="home"></a>
              </h1>
            </div>
          </div>
          <?php 
          if($method != 'index' &&   $method != 'process' && $method != 'registration'){ ?>
          <!-- <div class="col-sm-2 cart-mob">
            <img src='<?php echo base_url("assets/assets/img/PNG_ICON_1.png");?>' style="width: 50px;display: inline;">
          <a href="<?php echo base_url('/cart'); ?>">
            <span class="text" style="display: inline;">Cart</span>
          </a>
          </div> -->
          <?php if($controller != 'profile' && $controller != 'cart' && $controller != 'order') { ?>
          <div class="col-md-5 col-xs-offset-2">
          <div class="header_search">
                            <div class="header_search_content">
                                <div class="header_search_form_container">
                                    <form name="searchfrm" action="search.php" autocomplete="off" method="GET" class="header_search_form clearfix" style="display: inline-flex;height: 100%;position: absolute;width:100%;" title="">
                                        <div class="nvleft">
                                            <select id="catSelect" class="catselect-css" style="width: 141.2px;">
                                            <option value="0">Select Option</option>
                                            <?php foreach($category as $value){ ?>
                                              <option value="<?php print_r($value->c_id); ?>">
                                              <?php print_r($value->category_name); ?>
                                            </option>
                                            <?php } ?>
                                            </select>
                                        </div>

                                        <div class="nvfill" style="width: calc(100% - 50px);">
                                            <input class="header_search_input" type="search" style="height: 35px;width:100%;font-weight:lighter;color:#444;" id="search-box" name="q" placeholder="Search for products" title="Search for products" required="">
                                            <div id="suggesstion-box"></div>
                                        </div>

                                        <div class="nvright">
                                            <button type="submit" class="header_search_button trans_300" value="Submit" style="height:  35px"><img class="s-icon" src='<?php echo base_url("assets/img/search.png");?>'
                                      alt=""></button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
          </div>
        <?php } 
        else{
          echo('<div class="col-md-5 col-xs-offset-2"> </div>');
        }
        ?>
          <!--------------------------------------->
          <div class="col-md-4 col-sm-3  cart-web" style="margin-top: 50px;">
            <img src='<?php echo base_url("assets/assets/img/PNG_ICON_1.png");?>' style="width: 50px;display: inline;">
            <a href="<?php echo base_url('/cart'); ?>">
            <span class="text" style="display: inline;">Cart</span>
          </a>
          <img src='<?php echo base_url("assets/assets/img/PNG_ICON_5.png");?>' style="width: 50px;display: inline;">
            <a href="<?php echo base_url('/profile'); ?>">
            <span class="text" style="display: inline;">Profile</span>
          </a>
          <img src='<?php echo base_url("assets/assets/img/PNG_ICON_6.png");?>' style="width: 50px;display: inline;">
            <?php
             if (isset($_SESSION['user'])) { ?>
            <span class="text" style="display: inline;"><a href="<?php echo base_url('login/logout'); ?>">Logout</a></span>
             <?php }
             else{
              ?>
            <span class="text" style="display: inline;"><a href="<?php echo base_url('/login'); ?>">Login</a></span> 
          <?php } ?>
          </div>
       <?php } ?>
        </div>
        <!-- .end of site-branding -->
      </div>
  </div>
  <!-- .end of site-branding, search -->
  </header>