<div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo $products[0]['category_name'];  ?></li>
                </ol>
            </nav>
            <hr>
            <h4 class="page-title"><?php echo $products[0]['category_name']; ?></h4>
        </div>
<?php
$count = 0;
?>

        <div class="row product-list">
        <?php 
        if(isset($products[0]['p_id'])){
        foreach($products as $product) {
            if($count % 4 == 0){
                echo('<div class="row product-list">');
            }
        ?>
            <div class="col-md-3">
                <!-- bbb_deals -->
                <div class="bbb_deals">
                    <div class="ribbon ribbon-top-right"></div>
                    <div class="bbb_deals_slider_container">
                        <div class=" bbb_deals_item">
                            <div class="bbb_deals_image"><img
                                    src="<?php echo base_url('./assets/images/newproducts/'.$product['p_id'].'/'.$product['product_images'][0]['image_url']); ?>"
                                    alt="" width=200 height=200></div>
                            <div class="bbb_deals_content">
                                <!-- <div class="bbb_deals_info_line d-flex flex-row justify-content-start">
                                </div> -->
                                <div class="text-center">
                                    <div class="bbb_deals_item_name">
                                        <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>" class="product-link"> <?php echo $product['product_name']; ?></a>
                                    </div>
                                    <div class="bbb_deals_item_price ml-auto">₹<?php echo $product['offer_price']; ?></div>
                                </div>
                                <div class="available">
                                    <div class="available_line d-flex flex-row justify-content-start">
                                        <a href="#" class="btn btn-light">Add to cart</a>&nbsp;&nbsp;
                                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                                                class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                                    </div>
                                    <!-- <div class="available_bar"><span style="width:17%"></span></div> -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php 
            if(($count + 1) % 4 == 0){
                echo('</div>');
            }
            $count++;
        }
        }
        ?>
    </div>
    </div>