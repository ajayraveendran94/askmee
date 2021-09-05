<!-- <div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="#">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?php echo($product_data[0]->product_name); ?></li>
                </ol>
            </nav>
            <hr>
        </div>
        
       <h4 class="page-title"> <?php echo($product_data[0]->product_name); ?></h4>
     <div class="col-md-12 content-area">
       <div class="row">
       
         
            <div class="col-sm-6 product-img">
                
                <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
                    <div class="carousel-inner">
                    <?php 
                    $count = 1;
                    foreach($product_data as $row){ 
                       $val = $count * 1000;
                       if($count == count($product_data)){
                          echo('<div class="carousel-item">');
                       }
                       elseif($count == 1){
                          echo('<div class="carousel-item active" data-bs-interval="'.$val.'">');
                       }
                       else{
                           echo('<div class="carousel-item" data-bs-interval="'.$val.'">');
                       }
                        ?>
                        <img src="<?php echo base_url('/assets/images/newproducts/'.$row->p_id.'/'.$row->image_url); ?>" class="d-block w-100" alt="...">
                      </div>
                    <?php 
                    $count++;
                    } ?>
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
            </div>
         
            <div class="col-md-6">
             <div class="product-summary">

               
                  <div class="col-md-4">
                    <input type="number" class="form-control quantity" id="inputQty" max= <?php echo($product_data[0]->quantity); ?>>
                    <input type="submit" class="btn btn-light" value="Add to cart">
                  </div>

                <ul class="nav nav-tabs" id="myTab" role="tablist">
                    <li class="nav-item" role="presentation">
                      <button class="nav-link active" id="home-tab" data-bs-toggle="tab" data-bs-target="#home" type="button" role="tab" aria-controls="home" aria-selected="true">Description</button>
                    </li>
                    <li class="nav-item" role="presentation">
                      <button class="nav-link" id="profile-tab" data-bs-toggle="tab" data-bs-target="#profile" type="button" role="tab" aria-controls="profile" aria-selected="false">Reviews</button>
                    </li>
                  </ul>
                  <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab" style="padding: 15px;">
                        <h5>Description</h5>
                        <p><?php echo($product_data[0]->description); ?></p> 
                    </div>
                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab" style="padding: 15px;">
                        <h5>Reviews</h5>
                        <p>Nice product ...</p>
                        <div class="sold_stars ml-auto"> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> <i
                            class="fa fa-star"></i> <i class="fa fa-star"></i> </div>
                       </div>
                    </div>

                    </div>
                  </div>
             </div>

             </div>
            </div> -->

    <div class="container-fluid">
        <!----Bredsrump-->
        <div class="container-fluid">
            <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page"><?php echo($product_data[0]->product_name); ?></li>
                    </ol>
                </nav>
                <hr>
            </div>
        </div>
        <!------------>


        <!-------------Product Section-->
        <div class="container-fluid mt-1 mb-1">
            <div class="">
                <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
                    <div class="">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="image-gallery">
                                <?php if(isset($product_data[0])){?>   
                                    <main class="primary" style="background-image: url('<?php echo base_url('/assets/images/newproducts/'.$product_data[0]->p_id.'/'.$product_data[0]->image_url); ?>');"></main>
                                    <aside class="thumbnails">
                                        <a href="#" class="selected thumbnail" data-big="<?php echo base_url('/assets/images/newproducts/'.$product_data[0]->p_id.'/'.$product_data[0]->image_url); ?>">
                                          <div class="thumbnail-image" style="background-image: url(<?php echo base_url('/assets/images/newproducts/'.$product_data[0]->p_id.'/'.$product_data[0]->image_url); ?>); margin-top: 0;"></div>
                                        </a>
                                    <?php } ?>
                                    <?php if(isset($product_data[1])){?>
                                        <a href="#" class="thumbnail" data-big="<?php echo base_url('/assets/images/newproducts/'.$product_data[1]->p_id.'/'.$product_data[1]->image_url); ?>">
                                          <div class="thumbnail-image" style="background-image: url(<?php echo base_url('/assets/images/newproducts/'.$product_data[1]->p_id.'/'.$product_data[1]->image_url); ?>)"></div>
                                        </a>
                                    <?php } ?>
                                    <?php if(isset($product_data[2])){?>
                                        <a href="#" class="thumbnail" data-big="<?php echo base_url('/assets/images/newproducts/'.$product_data[2]->p_id.'/'.$product_data[2]->image_url); ?>">
                                          <div class="thumbnail-image" style="background-image: url(<?php echo base_url('/assets/images/newproducts/'.$product_data[2]->p_id.'/'.$product_data[2]->image_url); ?>)"></div>
                                        </a>
                                    <?php } ?>
                                      </aside>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-1">
                                    <div class="mb-3">
                                        <h3 class="/text-uppercase mb-3"><?php echo($product_data[0]->product_name); ?> </h3>
                                        <div class="price d-flex flex-row align-items-center"> 
                                            <h5 style="margin-bottom: 0;color: #626262;">M.R.P: <span class="act-price">₹<?php echo($product_data[0]->offer_price); ?></span></h5>
                                            <div class="ml-2"> 
                                                <small class="dis-price">₹<?php echo($product_data[0]->actual_price); ?></small> <span class="dis-label"><?php echo round((($product_data[0]->actual_price - $product_data[0]->offer_price) / $product_data[0]->actual_price)*100); ?>% OFF</span> 
                                            </div>
                                        </div>
                                    </div>
                                    <p class="about"><?php echo($product_data[0]->description); ?></p>
                                    <div class="d-flex">
                                        <?php if(isset($_SESSION['user'])){?>
                                    <input type="hidden" id="user_id" value=<?php echo($_SESSION['user']['user_id']); ?>>
                                <?php } ?>
                                        <div class="cart mt-4 align-items-center buy-btn-container"> 
                                            <input type="hidden" id="product_id" value=<?php echo $product_data[0]->p_id; ?>>
                                    <input type="number" class="d-none" id="quantity" placeholder="Quantity" style="width: 90px" value=1 min= 1 max= <?php echo($product_data[0]->quantity); ?> >
                                            <button id="addToCart" class="btn btn-warning text-uppercase mr-2 px-4">Add to cart</button>
                                            <a href="<?php echo base_url('/cart');?>" id="goToCart" class="d-none btn bg-theme text-uppercase mr-2 px-4">Go To Cart</a>
                                            <a id="buyNow" href="<?php echo base_url('/buynow/view/'.$product_data[0]->p_id);?>" class="btn bg-theme text-uppercase mr-2 px-4">Buy Now</a> 
                                        </div>
                                    </div>
                                        
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="container product-slider ">

        <div class="row category-grid" style="margin-top: 61px;">

            <h4 class="title-sub">Related Products</h4>
            <div class="col-sm-3 col-xs-12">
                <img src="assets/img/Kalanji.png" width="70%" style="margin-top: 8%;" alt="..."><br>
                <a href="#" class="btn btn-link">Kalanji</a><br>
                <p class="card-text">330</p>
                <a href="#" class="btn btn-light">Add to cart</a>
            </div>

            <div class="col-sm-3 col-xs-12">
                <img src="assets/img/Kalanji.png" width="70%" style="margin-top: 8%;" alt="..."><br>
                <a href="#" class="btn btn-link">Kalanji</a><br>
                <p class="card-text">330</p>
                <a href="#" class="btn btn-light">Add to cart</a>
            </div>

            <div class="col-sm-3 col-xs-12">
                <img src="assets/img/Kalanji.png" width="70%" style="margin-top: 8%;" alt="..."><br>
                <a href="#" class="btn btn-link">Kalanji</a><br>
                <p class="card-text">330</p>
                <a href="#" class="btn btn-light">Add to cart</a>
            </div>

            <div class="col-sm-3 col-xs-12">
                <img src="assets/img/Kalanji.png" width="70%" style="margin-top: 8%;" alt="..."><br>
                <a href="#" class="btn btn-link">Kalanji</a><br>
                <p class="card-text">330</p>
                <a href="#" class="btn btn-light">Add to cart</a>
            </div>
        </div>
    </div>
        <!------------------------------------------->
    </div>