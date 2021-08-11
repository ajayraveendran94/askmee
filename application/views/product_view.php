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

        <div class="container mt-5 mb-5">
            <div class="row d-flex justify-content-center">
                <div class="col-md-10">
                    <div class="card">
                        <div class="row">
                            <div class="col-md-6">
                                <div class="images p-3">
                                    <div class="text-center p-4"> <img id="main-image" src="<?php echo base_url('/assets/images/newproducts/'.$product_data[0]->p_id.'/'.$product_data[0]->image_url); ?>" width="250" /> </div>
                                    <div class="thumbnail text-center"> <img onclick="change_image(this)" src="<?php echo base_url('/assets/images/newproducts/'.$product_data[1]->p_id.'/'.$product_data[1]->image_url); ?>" width="70"> <img onclick="change_image(this)" src="<?php echo base_url('/assets/images/newproducts/'.$product_data[2]->p_id.'/'.$product_data[2]->image_url); ?>" width="70"> </div>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="product p-4">
                                    <div class="d-flex justify-content-between align-items-center">
                                        <div class="d-flex align-items-center"> <i class="fa fa-long-arrow-left"></i> <span class="ml-1">Back</span> </div> <i class="fa fa-shopping-cart text-muted"></i>
                                    </div>
                                    <div class="mt-4 mb-3">
                                        <h5 class="text-uppercase"><?php echo($product_data[0]->product_name); ?></h5>
                                        <div class="price d-flex flex-row align-items-center"> <span class="act-price"> M.R.P ₹ <?php echo($product_data[0]->offer_price); ?></span>
                                            <div class="ml-2"> <small class="dis-price"><del><?php echo($product_data[0]->actual_price); ?><del></small> <span>
                                            <?php echo round((($product_data[0]->actual_price - $product_data[0]->offer_price) / $product_data[0]->actual_price)*100); ?>% OFF</span> </div>
                                        </div>
                                    </div>
                                    <p class="about"><?php echo($product_data[0]->description); ?></p>
                                    <!-- <div class="sizes mt-5">
                                        <h6 class="text-uppercase">Size</h6> <label class="radio"> <input type="radio" name="size" value="S" checked> <span>S</span> </label> <label class="radio"> <input type="radio" name="size" value="M"> <span>M</span> </label> <label class="radio"> <input type="radio" name="size" value="L"> <span>L</span> </label>                                        <label class="radio"> <input type="radio" name="size" value="XL"> <span>XL</span> </label> <label class="radio"> <input type="radio" name="size" value="XXL"> <span>XXL</span> </label>
                                    </div> -->
                                    <div class="cart mt-4 align-items-center">
                                    <input type="hidden" id="user_id" value=<?php echo($_SESSION['user']['user_id']); ?>>
                                    <input type="hidden" id="product_id" value=<?php echo $product_data[0]->p_id; ?>>
                                    <input type="number" id="quantity" placeholder="Quantity" style="width: 90px" min= 1 max= <?php echo($product_data[0]->quantity); ?> > <button id="addToCart" class="btn btn-danger text-uppercase mr-2 px-4">Add to cart</button> 
                                    <a href="<?php echo base_url('/cart');?>" id="goToCart" class="d-none">Go To Cart</a>
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