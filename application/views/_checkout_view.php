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
   <!------------>
   <!-- <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <a href="<?php echo base_url('order/place_order'); ?>" class="btn btn-danger" style="float: right;">Confirm Order</a>
            </div>
        </div>
    </div> -->
    <div class="container-fluid mt-1 mb-1">
            <div class="row align-items-center">
                <div class="col-sm-7">
                    <div class="card overflow-scroll">
                        <h5 class="card-header">
                            Order Details
                            <?php 
                            $total_price = 0;
                            foreach($cart_data as $data) {
                                $total_price = $total_price + ($data['offer_price'] * $data['ch_quantity']);
                             } ?>
                            <span class="float-sm-end">Total :  ₹ <?php echo $total_price; ?></span>
                        </h5>
                        <div class="card-body">
                            <div class="row">
                                <table>
                                <tr>
                                    <th>Item</th>
                                    <th>Price</th>
                                    <th>Quantity</th>
                                    <th>Total</th>
                                </tr>
                                <?php foreach($cart_data as $data) {?>
                                <tr style="border-bottom: 1px solid">
                                    <td><img src="<?php echo base_url('/assets/images/newproducts/'.$data['p_id'].'/'.$data['product_images'][0]['image_url']); ?>" class="book-img"><br>
                                    <?php echo $data['product_name']; ?></td>
                                    <?php $price = $data['offer_price']; ?>
                                    <?php $quantity = $data['ch_quantity']; ?>
                                    <td>₹ <?php echo $price; ?></td>
                                    <td><?php echo $quantity; ?></td>
                                    <td>₹ <?php echo ($price * $quantity); ?></td>
                                </tr>
                            <?php } ?>
                            </table>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-sm-5">
                    <div class="card overflow-scroll">
                        <h5 class="card-header">Address</h5>
                        <div class="card-body">
                            <form method="post" action="<?php echo site_url('order/quick_place_order'); ?>">
                            <?php foreach($address as $key=>$data) {?>
                            <div class="row">
                                <div class="col-sm-2">
                                <?php if($key == 0) {?>
                                    <input type="radio" id="<?php echo $data->ad_id; ?>" name="userAddress" value="<?php echo $data->ad_id; ?>" checked>
                                <?php } 
                                else{ ?>
                                   <input type="radio" id="<?php echo $data->ad_id; ?>" name="userAddress" value="<?php echo $data->ad_id; ?>"> 
                                <?php }
                                ?>
                                </div>
                                <div class="col-sm-8">
                                    <?php echo ($data->line_1.',<br>'.$data->line_2.','.$data->post.','.$data->pin.','.$data->district.','.$data->state.',<br>'.$data->contact_number_1.','.$data->contact_number_2); ?>
                                </div>
                                <div class="col-sm-2">
                                    <button type="button" class="btn btn-theme"  data-bs-toggle="modal" data-bs-target="#exampleModal">Edit</button>
                                </div>
                                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                            <div class="modal-header">
                                                <h5 class="modal-title" id="exampleModalLabel">EDIT ADDRESS</h5>
                                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                    <div class="mb-3">
                                                        <textarea cols="10"  class="form-control" rows="4" id="address" placeholder="Address"></textarea>
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control"  placeholder="City" id="city">
                                                    </div>
                                                    <div class="mb-3">
                                                        <input type="text" class="form-control"  placeholder="Mobile Number" id="mobile">
                                                    </div>
                                            </div>
                                            <div class="modal-footer">
                                                <button type="button" class="btn btn-danger" data-bs-dismiss="modal">CANCEL</button>
                                                <button type="button" class="btn btn-theme">SAVE AND DELIVERY HERE</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <hr>
                             <?php }
                            ?>
                            <hr>
                        </div>
                    </div>
            </div>
        </div>
        <!------------------------------------------->
    </div>
     <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12">
                <button type="submit" class="btn btn-danger" style="float: right;">Confirm Order</button>
            </div>
        </div>
    </div>
</form>