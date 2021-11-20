<div class="container-fluid">
    <form method="post" action="<?php echo site_url('order/place_order'); ?>">
        <div class="row">
                    <div class="col-md-6 bg-white">   
                    <div class="row px-4 py-4">
                        <nav aria-label="breadcrumb" class="main-breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="index.html">Home</a></li>
                        <li class="breadcrumb-item"><a href="javascript:void(0)">Product</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Checkout</li>
                    </ol>
                    <h2>Checkout</h2>
                    <hr>
                </nav>
                       <div class="col mt-4">
                        <h5 class="mb-4"><strong>Select Delivery Address</strong></h5>
                         <?php foreach($address as $key=>$data) {?>
                         <div class="card bg-light mb-3  mx-0">
                                  <div class="card-header">
                                    <?php if($key == 0) {?>
                                    <input type="radio" id="<?php echo $data->ad_id; ?>" name="userAddress" value="<?php echo $data->ad_id; ?>"  style="width:auto" checked>
                                <?php } 
                                else{
                                ?>
                                <input type="radio" id="<?php echo $data->ad_id; ?>" name="userAddress" value="<?php echo $data->ad_id; ?>"  style="width:auto">
                            <?php } ?>
                                        <label for="primaryAddress"><?php echo $data->ad_title; ?></label>
                                    </div>
                                  <div class="card-body">
                                    <h6 class="card-title"><?php echo $data->line_1; ?></h6>
                                    <p class="card-text"><?php echo ($data->line_2.','.$data->post.','.$data->pin.','.$data->district.','.$data->state.',<br>'.$data->contact_number_1.','.$data->contact_number_2); ?></p>
                                  </div>
                            </div>
                        <?php } ?>
                                <div class="row">
                                    <a href="#" id="btn-address" class="btn btn-light btn-sm" style="padding:7px 0; font-size:19px"><i class="fa fa-plus mx-2"></i>Add New Address</a>
                                </div>
                             
                                <br>
                                <hr>
                        <form id="addresForm">
                        <h5 class="mb-4"><strong>Add Delivery Address</strong></h5>
                          <div class="form-group ">
                            <div class="col">
                              <input type="text" class="form-control" id="" placeholder="Full Name">
                            </div>
                          </div>
                          <div class="form-group ">
                            <div class="col">
                              <input type="text" class="form-control" id="" placeholder="Mobile Number">
                            </div>
                          </div>
                          <div class="form-group ">
                            <div class="col">
                                <label for="exampleFormControlTextarea1">Address</label>
                                <textarea class="form-control" id="" rows="3"></textarea>
                            </div>
                          </div>
                          <div class="form-row  row mt-3">
                            <div class="col-6 px-0 pr-1" style="padding-right:10px !important;">
                              <input type="text" class="form-control" placeholder="City">
                            </div>
                            <div class="col-6 px-0">
                              <input type="text" class="form-control" placeholder="PIN Code">
                            </div>
                          </div>
                          <div class="m-t-sm text-right">
                            <div class="btn-group">
                                <a href="#" class="btn btn-theme btn-md">Add Address</a>&nbsp;&nbsp;
                                <a href="#" id="btn-cancel" class="btn btn-danger btn-md ">Cancel</a>
                            </div>
                        </div>
                        </form>
                       </div>
                   </div>  
                    </div>
                    <div class="col-md-6">
                        <div class="card" style="position: sticky;top: 0;">
                         <div class="card-header">
                            <h5 class="card-title">
                                <strong>Cart Summary</strong></h5>
                         </div>
                            <div class="card-body">
                                <div class="ibox checkoutbx-floating">
                           <?php 
                           $total_price = 0;
                           foreach($cart_data as $data) {?>
                           <div class="ibox-content">
                                <div class="table-responsive">
                                    <table class="table shoping-cart-table">
                                        <tbody>
                                            <tr>
                                                <td width="20%">
                                                    <div class="col">
                                                        <a href="#"><img src="<?php echo base_url('/assets/images/newproducts/'.$data['p_id'].'/'.$data['product_images'][0]['image_url']); ?>"
                                                                style="width: 100px;" alt="cart"></a>
                                                    </div>
                                                </td>
                                                <td class="desc" width="60%">
                                                    <h5>
                                                        <?php $price = $data['offer_price']; ?>
                                                        <?php $quantity = $data['car_quantity']; 
                                                        $total_price = $total_price + ($price * $quantity);
                                                        ?>
                                                        <a href="#" class="text-orange">
                                                           ₹ <?php echo $price; ?>
                                                        </a>
                                                    </h5>
                                                    <div class="m-t-sm">
                                                         <p class="mb-1">(<?php echo $quantity ;?>)</p>
                                                    </div>                                                     
                                                </td>
                                                <td width="20%">
                                                    <input type="number" min="1" max="10"  class="form-control mb-0"
                                                        placeholder="₹<?php echo ($price * $quantity); ?>" readonly>
                                                    <!-- <a href="#" class="btn btn-danger btn-sm mt-3 " style="min-width: 90px;" onclick="runDemo()"><i
                                                                class="fa fa-trash"></i> Remove</a> -->
                                                </td>                                                
                                            </tr>

                                        </tbody>
                                    </table>
                                </div>
                            </div>
                                <?php } ?>
                            </div>
                                  </div>
                            <div class="ibox-content">
                                <div class="row">
                                    <div class="col-7"><h4>Total</h4></div>
                                    <div class="col-5"> <h4 class="font-bold" style="text-align: right;">₹ <?php echo $total_price; ?> </h4></div>
                                </div>
                                <hr>
                                <!-- <span class="text-muted small">
                                    *For United States, France and Germany applicable sales tax will be applied
                                </span> -->
                                <div class="m-t-sm text-right">
                                    <div class="btn-group">
                                        <button type="submit" class="btn btn-theme btn-md">Place Order</button>&nbsp;&nbsp;
                                        <a href="#" class="btn btn-danger btn-md"> Cancel</a>
                                    </div>
                                </div>
                            </div>
                            </div>
                            </div>
                            </div>
                        </form>
                            </div>