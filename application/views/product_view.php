<div class="container-fluid">
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
                    echo(count($product_data));
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
                      <!-- <div class="carousel-item" data-bs-interval="2000">
                        <img src="http://askmee.in/wp-content/uploads/2020/06/long-sleeve-tee-300x300.jpg" class="d-block w-100" alt="...">
                      </div>
                      <div class="carousel-item">
                        <img src="http://askmee.in/wp-content/uploads/2020/06/long-sleeve-tee-300x300.jpg" class="d-block w-100" alt="...">
                      </div> -->
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
                    <a href="#" class="btn btn-light">Add to cart</a>
                    <input type="number" class="form-control quantity" id="inputQty">
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
            </div>