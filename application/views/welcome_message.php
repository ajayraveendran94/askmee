<div class="row">
    <div id="carouselExampleInterval" class="carousel slide" data-bs-ride="carousel">
      <div class="carousel-inner">
        <div class="carousel-item active" data-bs-interval="10000">
          <img src='<?php echo base_url("assets/assets/img/BANNER_JPJ_1.jpg");?>' class="d-block w-100" alt="...">
        </div>
        <div class="carousel-item" data-bs-interval="2000">
          <img src='<?php echo base_url("assets/assets/img/BANNER_JPJ_2.jpg");?>' class="d-block w-100" alt="...">
        </div>
      </div>
      <button class="carousel-control-prev" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="prev">
        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Previous</span>
      </button>
      <button class="carousel-control-next" type="button" data-bs-target="#carouselExampleInterval"
        data-bs-slide="next">
        <span class="carousel-control-next-icon" aria-hidden="true"></span>
        <span class="visually-hidden">Next</span>
      </button>
    </div>

    <div class="text-center">
      <img src='<?php echo base_url("assets/assets/img/PNG_2.png");?>' style="width: 45%;margin-top: 25px;margin-bottom: 25px;" alt="PNG2.jpg">
    </div>
    <h1 class="has-text-align-center" style="margin-bottom: 50px;">
      <span class="has-inline-color has-very-dark-gray-color" >Shop by Category</span>
    </h1>



    <div class="container">
      <div class="row category-grid">
	<?php foreach($category as $row) { ?>
        <div class="col-sm-3 col-xs-12 ">
		  <a href="<?php echo base_url('category/view/'.$row->c_id); ?>">
          	<img src="<?php echo base_url('assets/images/categories/'.$row->category_url); ?>" width="70%" style="margin-bottom: 6%;" alt="PNG2.jpg">
          </a>
		  <h6><?php echo $row->category_name; ?></h6>
        </div>
    <?php } ?>

      </div>
      <center> <a href="#" class="btn btn-theme btn-md">MORE</a></center>
    </div>

<div class="container">
      <div class="row category-grid">
    <div class="col-sm-12">

      <div class="row text-center" style="margin-top: 25px;">

        <h4>New in</h4>
      <?php if(isset($_SESSION['user'])){?>
      <input type="hidden" id="user_id" value=<?php echo($_SESSION['user']['user_id']); ?>>
      <?php }?>
      <?php foreach($products as $product){ ?>
        <div class="col-sm-3 col-xs-12">
          <img src="<?php echo base_url('./assets/images/newproducts/'.$product['p_id'].'/'.$product['product_images'][0]['image_url']); ?>" width="70%"  height="70%" style="margin-top: 8%;"  alt="..."><br>
          <a href="<?php echo base_url('product/view/'.$product['p_id']); ?>" class="btn btn-link"><?php echo $product['product_name']; ?></a><br>
          <p class="card-text">₹ <?php echo $product['offer_price']; ?></p>
          <button  id="addToCart_<?php echo($product['p_id']); ?>" class="addToCartBtn btn btn-light" productId=<?php echo($product['p_id']); ?>>Add to cart</button>
          <button class="btn btn-light">
          <a href="<?php echo base_url('/cart');?>" id="goToCart_<?php echo($product['p_id']); ?>" class="d-none">Go To Cart</a>
        </button>
        </div>
      <?php } ?>
        <!-- <div class="col-sm-3 col-xs-12">
          <img src="assets/img/Kalanji.png" width="70%" style="margin-top: 8%;"  alt="..."><br>
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
          <img src="assets/img/Kalanji.png" width="70%" style="margin-top: 8%;"  alt="..."><br>
          <a href="#" class="btn btn-link">Kalanji</a><br>
          <p class="card-text">330</p>
          <a href="#" class="btn btn-light">Add to cart</a>
        </div> -->
      </div>
    </div> 
    </div>
    </div>    