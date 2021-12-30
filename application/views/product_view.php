<div class="container-fluid">
            <div class="col-sm-12 col-md-12 col-lg-12 content-area"  style="margin-top:-30px;" >
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Product-details</li>
                    </ol>
                </nav>
                <hr>
            </div>
</div>
<?php if(count($product_data)>0){?>
        <!------------>

        <!-------------Product Section-->
        
        <div class="container-fluid mt-1 mb-1">
            <div class="">
                <div class="col-sm-12 col-md-12 col-lg-12 content-area " style="padding-top:0;margin-top:-50px;">
                    <div class="">
                        <div class="row">
                            <div class="col-md-4">
                            <div id="carouselExampleIndicators" class="carousel slide" data-bs-ride="carousel">
                            <div class="carousel-indicators">
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="0" class="active" aria-current="true" aria-label="Slide 1"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="1" aria-label="Slide 2"></button>
                            <button type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide-to="2" aria-label="Slide 3"></button>
                            </div>
                            <div class="carousel-inner">
                            <?php if(isset($product_data[0])){?>
                                            <div class="carousel-item active">
                                            <img src="<?php echo base_url('/assets/images/newproducts/'.$product_data[0]->p_id.'/'.$product_data[0]->image_url); ?>" class="d-block w-100" alt="<?php echo($product_data[0]->product_name); ?>">
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($product_data[1])){?>
                                        <div class="carousel-item ">
                                            <img src="<?php echo base_url('/assets/images/newproducts/'.$product_data[1]->p_id.'/'.$product_data[1]->image_url); ?>" class="d-block w-100" alt="<?php echo($product_data[1]->product_name); ?>">
                                        </div>
                                        <?php } ?>
                                        <?php if(isset($product_data[2])){?>
                                        <div class="carousel-item ">
                                            <img src="<?php echo base_url('/assets/images/newproducts/'.$product_data[2]->p_id.'/'.$product_data[1]->image_url); ?>" class="d-block w-100" alt="<?php echo($product_data[2]->product_name); ?>">
                                        </div>
                                        <?php } ?>
                           </div>
                           <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="prev">
                           <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                           <span class="visually-hidden">Previous</span>
                          </button>
                          <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleIndicators" data-bs-slide="next">
                          <span class="carousel-control-next-icon" aria-hidden="true"></span>
                          <span class="visually-hidden">Next</span>
                         </button>
                          </div>
                        </div>

                            <div class="col-md-6">
                                <div class="product p-1">
                                    <div class="mb-3">
                                        <h4 class="/text-uppercase mb-3"><?php echo($product_data[0]->product_name); ?></h4><hr>
                                        <div class="price d-flex flex-row align-items-center">
                                            <h5 style="margin-bottom: 0;color: #626262;">M.R.P: <span
                                                    class="act-price">₹<?php echo($product_data[0]->offer_price); ?></span></h5>
                                            <div class="ml-2">
                                                <small class="dis-price">₹<?php echo($product_data[0]->actual_price); ?></small> <span class="dis-label"><?php echo round((($product_data[0]->actual_price - $product_data[0]->offer_price) / $product_data[0]->actual_price)*100); ?>%
                                                    OFF</span>
                                            </div>
                                        </div>
                                    </div>
                                    <p class="about"><?php echo($product_data[0]->description); ?></p>
                                    <!-- <div class="sizes mt-5">
                                        <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label>                                        <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                                    </div> -->
                                    <?php if(isset($_SESSION['user'])){?>
                                    <input type="hidden" id="user_id" value=<?php echo($_SESSION['user']['user_id']); ?>>
                                <?php } ?>
                                <input type="hidden" id="product_id" value=<?php echo $product_data[0]->p_id; ?>>
                                    <div class="d-flex">
                                        <div class="cart mt-4 align-items-center buy-btn-container">
                                            <input type="hidden" value=1 id="quantity" placeholder="Quantity" style="width: 90px" min= 1 max= <?php echo($product_data[0]->quantity); ?>>
                                            <button id="addToCart" class="addToCartBtn btn btn-warning text-uppercase mr-2 px-4">Add to cart</button>
                                            <a href="<?php echo base_url('/cart');?>" id="goToCart" class="d-none btn btn-warning text-uppercase mr-2 px-4">Go To Cart</a>
                                           <a href="<?php echo base_url('/buynow/view/'.$product_data[0]->p_id);?>" ><button class="btn bg-theme text-uppercase mr-2 px-4">Buy Now</button></a>
                                        </div>
                                       
                                    </div>
                                    
                                    <div class="mb-3" >

                                    </div>
                                   
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!------------------------------------------->
    </div>
    <div class="content-area">            
        <div class="d-flex flex-column bd-highlight mb-3">            
                <h4 class="title-sub">Reviews and Ratings</h4>
        </div>
        
      </div>
    <div class="content-area product-slider " style="padding-top:0">

        <div class="row " style="margin-top: 61px;padding-left:10px;padding-right:10px;">

            <h4 class="title-sub">Related Products</h4>
    <?php 
    foreach($products as $key=>$product){
        if($product['p_id'] != $product_data[0]->p_id && $key<4){
            ?>
            <div class="col-sm-3 col-6">
               <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"></div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image">
                                <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>"><img src="<?php echo base_url('./assets/images/newproducts/'.$product['p_id'].'/'.$product['product_images'][0]['image_url']); ?>" alt=""></a>
                            </div>
                            <div class="bbb_deals_content">
                                <div class="text-center">
                                    <div class="bbb_deals_item_name">
                                        <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>" class="product-link"> <?php echo $product['product_name']; ?></a>
                                    </div>
                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <div class="bbb_deals_item_price ml-auto"><?php echo $product['offer_price']; ?></div>
                                    </div><br>
                                    <!-- <a href="" class="btn btn-theme mb-1">Buy Now</a>
                                    <a href="#" class="btn btn-cart mb-1">Add to Cart</a> -->
                                    <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>" class="btn btn-theme mb-1">Buy Now</a>
                                    <button id="addToCart<?php echo($product['p_id']); ?>" class="addToCartBtn btn btn-cart mb-1" productId=<?php echo($product['p_id']); ?>>Add to Cart</button>
                                    <a href="<?php echo base_url('/cart');?>" id="goToCart<?php echo($product['p_id']); ?>" class="d-none btn-cart mb-1">Go To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <?php 
        } 
    }?>
        <!-- <div class="col-sm-3 col-6">
               <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"></div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image">
                                <a href="product.html"><img src="assets/img/Kalanji.png" alt=""></a>
                            </div>
                            <div class="bbb_deals_content">
                                <div class="text-center">
                                    <div class="bbb_deals_item_name">
                                        <a href="product.html" class="product-link"> Carrot(1 kg)</a>
                                    </div>
                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <div class="bbb_deals_item_price ml-auto">₹25</div>
                                    </div><br>
                                    <a href="product.html" class="btn btn-theme mb-1">Buy Now</a>
                                    <a href="#" class="btn btn-cart mb-1">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-3 col-6">
               <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"></div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image">
                                <a href="product.html"><img src="assets/img/Kalanji.png" alt=""></a>
                            </div>
                            <div class="bbb_deals_content">
                                <div class="text-center">
                                    <div class="bbb_deals_item_name">
                                        <a href="product.html" class="product-link"> Carrot(1 kg)</a>
                                    </div>
                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <div class="bbb_deals_item_price ml-auto">₹25</div>
                                    </div><br>
                                    <a href="product.html" class="btn btn-theme mb-1">Buy Now</a>
                                    <a href="#" class="btn btn-cart mb-1">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        <div class="col-sm-3 col-6">
               <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"></div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image">
                                <a href="product.html"><img src="assets/img/Kalanji.png" alt=""></a>
                            </div>
                            <div class="bbb_deals_content">
                                <div class="text-center">
                                    <div class="bbb_deals_item_name">
                                        <a href="product.html" class="product-link"> Carrot(1 kg)</a>
                                    </div>
                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <div class="bbb_deals_item_price ml-auto">₹25</div>
                                    </div><br>
                                    <a href="product.html" class="btn btn-theme mb-1">Buy Now</a>
                                    <a href="#" class="btn btn-cart mb-1">Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div> -->
        

        </div>
    </div>
<?php } else {  ?>
                      <div class="card">
                          <div class="card-header"><h5> Sorry No Product details Found </h5>
                          </div><div class="card-body"><a class="btn btn-primary mr-1" href="<?php echo base_url();?>">Back</a></div></div>
                    <?php }?>