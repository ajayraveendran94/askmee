
<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
              <?php if(count($order) > 0){?>
             <!-- -->
                <div class="card">
                  <div class="card-header">
                    <h4>Basic Details</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Ordered User Name</label>
                          <input type="text" class="form-control" name="user_name" value=" <?php echo($order[0]['name']); ?>" readonly>
                          <input type="hidden" class="form-control" name="user_id" value="<?php echo($order[0]['user_id']); ?>">
                          <input type="hidden" name="order_id" id ="order_id" value="<?php echo $order[0]['order_id']; ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Address</label>
                          <textarea rows="4" cols="50" class="form-control" name="email" value="" readonly> <?php echo($order[0]['line_1'].'  '.$order[0]['line_2'].' '.$order[0]['line_3'].'  '.$order[0]['post'].' '.$order[0]['pin']); ?></textarea>
                        </div>
                      </div>
                    </div>
                     <div class="form-row">
                      <div class="col-4">
                        <div class="form-group">
                          <label>Ordered Date</label>
                          <input id="orderedDate" type="date" class="form-control" name="user_name" value="<?php echo(date("Y-m-d", strtotime($order[0]['order_date']))); ?>" readonly>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>Status</label>
                          <select class="form-control" id="orderStatus" value="">
                            <option value="<?php echo($order[0]['ors_id']); ?>"><?php echo($order[0]['status_name']); ?></option>
                            <?php foreach($status as $st){
                              if($st['ors_id'] != $order[0]['ors_id']){?>
                              <option value='<?php echo($st['ors_id']);?>'><?php echo($st['status_name']); ?></option>
                           <?php } 
                         }?>
                          </select>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>Delivery Date</label>
                          <input id="deliveryDate" type="date" class="form-control" value="<?php echo($order[0]['delivery_date']); ?>">
                        </div>
                      </div>
                    </div> 
                  <div class="card-footer text-right">
                    <button class="btn btn-dark mr-1">
                    <a href="<?php echo base_url('admin/orderlist/list');?>">Back</a>
                    </button>
                    <button class="btn btn-primary mr-1" id="changeAll" >Change All Status</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                </div>
              </div>
            </div>
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Order Details</h4>
                  </div>
                  <div class="card-body">
                    <div id="accordion">
                      <div class="accordion">
                      <?php
                          $count =1;
                         foreach ($order as $value) { 
?>
                            
                                <input type="hidden" name="users_id" id ="users_id" value="<?php echo $value['user_id'] ?>">

                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-<?php echo($count)?>"
                          aria-expanded="false">
                          <h4><?php echo("Order No: ASK-".$order[0]['or_id'].'-'.$value['or_detail_id']); ?> &nbsp;&nbsp;&nbsp; <b>More Details ↓ </b></h4>
                          <!-- date("m-d-Y", strtotime($order[0]['order_date'])) -->
                        </div>

                        <div class="accordion-body collapse" id="panel-body-<?php echo($count)?>" data-parent="#accordion">
                        <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Product Name</label>
                                <input type="text" class="form-control" placeholder="Add title like Home/Office etc.." name="ad_title" value="<?php echo($value['product_name']); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Quantity</label>
                                <input type="text" class="form-control" name="line_1" value="<?php echo($value['or_quantity']); ?>" readonly>
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Product Price</label>
                                <input type="text" class="form-control" name="line_2" value="<?php echo($value['total_price']/$value['or_quantity']); ?>" readonly>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Total Price</label>
                                <input type="text" class="form-control" name="line_3" value="<?php echo($value['total_price']); ?>" readonly>
                                </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Status</label>
                                <select id="status_<?php echo $value['or_detail_id']; ?>"class="form-control" name="status" value="">
                            <option value="<?php echo($value['ors_id']); ?>"><?php echo($value['status_name']); ?></option>
                            <?php foreach($status as $st){
                              if($st['ors_id'] != $value['ors_id']){?>
                              <option value='<?php echo($st['ors_id']);?>'><?php echo($st['status_name']); ?></option>
                           <?php } 
                         }?>
                          </select>
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Delivery Date</label>
                                <input id="date_<?php echo $value['or_detail_id']; ?>" type="date" class="form-control" name="pin" value="<?php echo($value['delivery_date']); ?>">
                                </div>
                              </div>
                          </div>
                            <button orderId="<?php echo $value['or_detail_id']; ?>" class="btn btn-primary mr-1 ordSubmit">Submit</button>
                            <button orderId="<?php echo $value['or_detail_id']; ?>" class="btn btn-danger mr-1 ordDelete">Delete</button>
                        </div>



                        <?php $count++; } ?>
                      </div>
                    </div>
                  </div>
                  <?php } else {  ?>
                      <div class="card">
                          <div class="card-header"><h5> Sorry No Orders Found </h5>
                          </div><div class="card-body"><a class="btn btn-primary mr-1" href="<?php echo base_url('admin/orderlist');?>">Back</a></div></div>
                    <?php }?>
                </div>
              </div>
          </div>
        </section>
      </div>