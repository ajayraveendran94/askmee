    <!-- .end of site-branding, search -->
<div class=".row">
        <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active" data-bs-interval="10000">
                    <img src='<?php echo base_url("assets/assets/img/BANNER_JPJ_1.jpg");?>' class="d-block w-100" alt="...">
                </div>
                <div class="carousel-item" data-bs-interval="2000">
                    <img src='<?php echo base_url("assets/assets/img/BANNER_JPJ_2.jpg");?>' class="d-block w-100" alt="...">
                </div>
            </div>
            <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
            <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval" data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
        </div>

        <div class="text-center">
            <img src='<?php echo base_url("assets/assets/img/PNG_2.png");?>' style="width: 45%;margin-top: 25px;margin-bottom: 25px;" alt="PNG2.jpg">
        </div>
        <h1 class="has-text-align-center" style="margin-bottom: 50px;">
            <span class="has-inline-color has-very-dark-gray-color">Shop by Category</span>
        </h1>



        <div class="container">
            <div class="row category-grid category-tiles">
             <?php foreach($category as $row) { ?>
                <div class="col-sm-3 col-6 ">

                    <a href="<?php echo base_url('category/view/'.$row->c_id); ?>">
            <img src="<?php echo base_url('assets/images/categories/'.$row->category_url); ?>" width="70%" style="margin-bottom: 6%;" alt="PNG2.jpg">
          </a>
          <h6><?php echo $row->category_name; ?></h6>

                </div>
                <?php } ?>
            </div>
            <br>
            <br>
            <center> <a href="#" class="btn btn-theme btn-md">MORE</a></center>
        </div>


        <div class="container product-slider ">

            <div class="row *category-grid" style="margin-top: 61px;justify-content: center;">

            <h1 class="has-text-align-center" style="margin-bottom: 50px;">
                <span class="has-inline-color has-very-dark-gray-color">Latest Products</span>
            </h1>
               <?php if(isset($_SESSION['user'])){?>
      <input type="hidden" id="user_id" value=<?php echo($_SESSION['user']['user_id']); ?>>
      <?php }
      foreach($products as $product){ 
      ?> 
                <div class="col-md-3 col-6">
                    <div class="bbb_deals">
                        <div class="ribbon ribbon-top-right"></div>
                        <div class="bbb_deals_slider_container">
                            <div class=" bbb_deals_item">
                                <div class="bbb_deals_image">
                                    <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>"><img width="70%"  height="70%" src="<?php echo base_url('./assets/images/newproducts/'.$product['p_id'].'/'.$product['product_images'][0]['image_url']); ?>" alt="" ></a>
                                </div>
                                <div class="bbb_deals_content">
                                    <div class="text-center">
                                        <div class="bbb_deals_item_name">
                                            <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>" class="product-link"> <?php echo $product['product_name']; ?></a>
                                        </div>
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                            <div class="bbb_deals_item_price ml-auto">₹ <?php echo $product['offer_price']; ?></div>
                                        </div><br>
                                        <a  id="buyNow" href="<?php echo base_url('/buynow/view/'.$product['p_id']);?>" class="btn btn-theme mb-1">Buy Now</a>
                                        <button id="addToCart_<?php echo($product['p_id']); ?>" class="addToCartBtn btn btn-cart mb-1">Add to Cart</button>
                                        <a href="<?php echo base_url('/cart');?>" id="goToCart_<?php echo($product['p_id']); ?>" class="d-none btn-cart mb-1">Go To Cart</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            <?php } ?>
            </div>
        </div>