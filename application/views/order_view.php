<div class="container-fluid">
   <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Orders</li>
         </ol>
      </nav>
      <hr>
   </div>
</div>
   <div class="content-area" style="padding-top: 0;">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-md-9">
                        <?php foreach($order_data as $order) {?>
                        <div class="card mb-3">
                        <div class="ibox">
                            <div class="ibox-title">
                                <span class="pull-right">Quantity (<strong><?php echo($order['or_quantity']);?></strong>)</span>
                                Order No : ASKKL98<?php echo($order['p_id']);?>
                            </div>
                            <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table shoping-cart-table">

                                        <tbody>
                                            <tr>
                                                <td width="15%">
                                                    <div class="mb-3">
                                                        <img src="<?php echo base_url('./assets/images/newproducts/'.$order['p_id'].'/'.$order['product_images'][0]['image_url']); ?>" width="100px" height="100px" alt="order">
                                                    </div>
                                                </td>
                                                <td class="desc" width="40%">
                                                    <h5>
                                                        <a href="<?php echo base_url('product/view/'.$order['p_id']); ?>">
                                              <?php echo($order['product_name']); ?>
                                          </a>
                                                    </h5>
                                                    <p class="small mb-1">
                                                        Seller : <span class="seller">ABC Ltd</span>
                                                    </p>
                                                    <p class="small">
                                                        Color : <span class="color">Black</span>
                                                    </p>
                                                    <dl class="small m-b-none">
                                                        <dt><status class="delivered"></status> Delivered on <?php echo($order['order_date']);?></dt>

                                                    </dl>
                                                </td>
                                                
                                                <td width="45%">
                                                   <p><strong>Price:</strong> ₹<?php echo($order['total_price']);?></p>

                                                    <dl class="small m-b-none mt-5">
                                                        <dt><a href="#" id="rateing" class="rating-btn" target="_blank">Rating & Review</a></dt>

                                                    </dl>
                                                </td>


                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        </div> 
                        </div>
                    <?php } ?>
                    </div>
                        <div class="col-md-3">
                            <div class="card">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Account</h5>
                            </div>
                            <div class="ibox-content">
                                <ul class="list-group list-group-flush">
                                  <li class="list-group-item"><a href="<?php echo base_url('/profile'); ?>"><i class="fa fa-user mx-2" aria-hidden="true"></i> Profile</a></li>
                                <li class="list-group-item"><a href="#"><i class="fa fa-cart-plus mx-2" aria-hidden="true"></i> Orders</a></li>
                                <li class="list-group-item"><a href="<?php echo base_url('/cart'); ?>"><i class="fa fa-shopping-cart mx-2" aria-hidden="true"></i> Cart</a></li>
                                <li class="list-group-item"><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out  mx-2" aria-hidden="true"></i> Logout</a></li>
                                </ul>
                            </div>
                        </div> 
                        </div>
                        </div>

                </div>
            </div>
        </div>