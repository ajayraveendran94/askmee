<div class="container-fluid">
    <?php if(count($products) > 0){?>
        <div class="col-sm-12 col-md-12 col-lg-12 content-area" style="margin-top: -7px;">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo $products[0]['category_name'];  ?></li>
                </ol>
            </nav>
            <hr class="line" style="height: 0.5px">
                <h4 class="page-title"><?php echo $products[0]['category_name'];  ?></h4>
        </div>
    <?php } ?>
    <?php if(count($products) == 0){  ?>
        <br>
                      <div class="card" style="text-align:center;">
                          <div class="card-header">
                              <h5> Sorry No category based product Found </h5>
                          </div>
                          <div class="card-body">
                              <a class="btn btn-theme mr-1" href="<?php echo base_url();?>">Back</a>
                         </div>
                     </div>
         <?php }?>
        <?php
$count = 0;
?>
        <?php if(isset($_SESSION['user'])){?>
                                    <input type="hidden" id="user_id" value=<?php echo($_SESSION['user']['user_id']); ?>>
                                <?php } ?>
        <div class="row product-list py-0" style="margin-top: -50px;">
            <?php
        if(count($products) > 0){ 
        if(isset($products[0]['p_id'])){
        foreach($products as $product) {
            // if($count % 4 == 0){
            //     echo('<div class="row product-list">');
            // }
        ?>
            <div class="col-md-3 col-6">
                <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"></div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image">
                                <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>"><img
                                        src="<?php echo base_url('./assets/images/newproducts/'.$product['p_id'].'/'.$product['product_images'][0]['image_url']); ?>"
                                        alt=""></a>
                            </div>
                            <div class="bbb_deals_content">
                                <div class="text-center">
                                    <div class="bbb_deals_item_name">
                                        <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>" class="product-link"> <?php echo $product['product_name']; ?></a>
                                    </div>
                                    <input type="hidden" id="product_id" value=<?php echo($product['p_id']); ?>>
                                    <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                            class="fa fa-star"></i> <i class="fa fa-star"></i>
                                        <div class="bbb_deals_item_price ml-auto" style="margin-bottom: 8px;">???<?php echo $product['offer_price']; ?></div>
                                    </div>
                                    <a href="<?php echo base_url('/buynow/view/'.$product['p_id']);?>" class="btn btn-theme mb-1">Buy Now</a>
                                    <input type="hidden" value=1 id="quantity" placeholder="Quantity" style="width: 90px" min= 1 max= <?php echo($product['quantity']); ?>>
                                    <button id="addToCart_<?php echo($product['p_id']); ?>" class="addToCartBtnNew btn btn-cart mb-1" productId=<?php echo($product['p_id']); ?>>Add to Cart</button>
                                    <a href="<?php echo base_url('/cart');?>" id="goToCart_<?php echo($product['p_id']); ?>" class="d-none btn btn-cart mb-1">Go To Cart</a>
                                    <a href="<?php echo base_url('/cart');?>" id="goToCart<?php echo($product['p_id']); ?>" class="d-none btn-cart mb-1">Go To Cart</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
          <?php  }
        }
    }
        ?>
            <!------------------------>
        </div>
    </div>