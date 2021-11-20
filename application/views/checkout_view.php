<div class="container-fluid">
   <form method="post" action="<?php echo site_url('order/place_order'); ?>">
   <div class="row">
      <div class="col-md-6 bg-white">
         <div class="row px-4 py-4">
            <nav aria-label="breadcrumb" class="main-breadcrumb">
               <ol class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
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
                     <input type="radio" id="<?php echo $data->ad_id; ?>" name="userAddress" value="<?php echo $data->ad_id; ?>" style="width:auto" checked>
                  <?php } 
                  else{?>
                     <input type="radio" id="<?php echo $data->ad_id; ?>" name="userAddress" value="<?php echo $data->ad_id; ?>" style="width:auto">
                  <?php }?>
                     <label for="primaryAddress"><?php echo $data->ad_title; ?></label>
                  </div>
                  <div class="card-body">
                     <h6 class="card-title"><?php echo (strtoupper($data->line_1).' '. $data->contact_number_1); ?></h6>
                     <p class="card-text"><?php echo ($data->line_2.','.$data->post.','.$data->pin.','.$data->district.','.$data->state.',<br>'.$data->contact_number_1.','.$data->contact_number_2); ?></p>
                  </div>
               </div>
            <?php } ?>
               <div class="row">
                  <button type="button" id="btn-address" class="btn btn-dark btn-sm" style="padding:7px 0; font-size:19px"><i class="fa fa-plus mx-2"></i>Add New Address</button>
               </div>
               <br>
               <hr>
               <div id="addresForm" class="d-none">
                  <h5 class="mb-4"><strong>Add New Delivery Address</strong></h5>
                  <div class="form-group ">
                     <div class="col">
                        <input type="text" class="form-control" id="fullName" placeholder="Full Name">
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="col">
                        <input type="text" class="form-control" id="primaryMobile" placeholder="Mobile Number">
                     </div>
                  </div>
                  <div class="form-row  row mt-3">
                     <div class="col-6 px-0 pr-1" style="padding-right:10px !important;">
                        <input type="text" id ="pinCode" class="form-control" placeholder="PIN Code">
                     </div>
                     <div class="col-6 px-0">
                        <input type="text" id="district" class="form-control" placeholder="District">
                     </div>
                  </div>
                  <div class="form-row  row mt-3">
                     <div class="col-6 px-0 pr-1" style="padding-right:10px !important;">
                        <input type="text" id ="state" class="form-control" placeholder="State">
                     </div>
                     <div class="col-6 px-0">
                        <input type="text" id="location" class="form-control" placeholder="Nearest Location">
                        <input type="hidden" id="userId" value='<?php echo $_SESSION['user']['user_id'];?>'>
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="col">
                        <input type="text" class="form-control" id="SecondMobile" placeholder="Alternate Mobile Number (Optional)">
                     </div>
                  </div>
                  <div class="form-group ">
                     <div class="col">
                        <label for="exampleFormControlTextarea1">Address</label>
                        <textarea class="form-control" id="completeAddress" rows="3"></textarea>
                     </div>
                  </div>
                  <div class="m-t-sm text-right">
                     <div class="btn-group">
                        <button id="saveAddress" type="button" class="btn btn-theme btn-md">Add Address</button>&nbsp;&nbsp;
                        <a href="#" id="btn-cancel" class="btn btn-danger btn-md ">Cancel</a>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="col-md-6">
         <div class="card" style="position: sticky;top: 0;">
            <div class="card-header">
               <h5 class="card-title">
                  <strong>Order Summary</strong>
               </h5>
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
                                       <a href="#" class="text-orange">
                                       <?php echo $data['product_name']; ?>
                                       </a>
                                    </h5>
                                    <?php $price = $data['offer_price']; ?>
                                                        <?php $quantity = $data['car_quantity']; 
                                                        $total_price = $total_price + ($price * $quantity);
                                                        ?>
                                    <div class="m-t-sm">
                                       <p class="mb-1"><s class="small text-muted">₹ <?php echo $data['actual_price'];?></s> ₹<?php echo $data['offer_price'];?></p>
                                    </div>
                                 </td>
                                 <td width="20%">
                                    <input type="number" min="1" max="10"  class="form-control mb-0"
                                       value="<?php echo $quantity; ?>" readonly>
                                    <a href="#" class="btn btn-danger btn-sm mt-3 " style="min-width: 90px;" onclick="runDemo()"><i
                                       class="fa fa-trash"></i> Remove</a>
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
                  <div class="col-7">
                     <h4>Total</h4>
                  </div>
                  <div class="col-5">
                     <h4 class="font-bold" style="text-align: right;">Rs. <?php echo $total_price;?></h4>
                  </div>
               </div>
               <hr>
               <!-- <span class="text-muted small">
                  *For United States, France and Germany applicable sales tax will be applied
                  </span> -->
               <div class="m-t-sm text-right">
                  <div class="btn-group">
                     <button type="submit" class="btn btn-theme btn-md">Place Order</button>&nbsp;&nbsp;
                     <a href="<?php echo base_url(''); ?>" class="btn btn-danger btn-md"> Cancel</a>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>
</form>
</div>