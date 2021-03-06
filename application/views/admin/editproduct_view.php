<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
            <?php if(count($product) > 0){?>
              <form method="post" action="<?php echo site_url('admin/editproduct/edit_product'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="hidden" class="form-control" name="master_product_id" value="<?php echo($product[0]->master_product_id); ?>">
                          <input type="hidden" class="form-control" name="product_id" value="<?php echo($product[0]->p_id); ?>">
                          <?php $current_user = $this->session->userdata();
                            if ($current_user['user_type'] == 'V') { ?>
                              <input type="text" class="form-control" name="product_name" value="<?php echo($product[0]->product_name); ?>" readonly>
                          <?php } 
                          else {?>
                           <input type="text" class="form-control" id="productName" comAmount="<?php echo($product[0]->com_amount); ?>" comPercent="<?php echo($product[0]->com_percent); ?>"  name="product_name" value="<?php echo($product[0]->product_name); ?>">
                        <?php } ?>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Category</label>
                         <?php if ($current_user['user_type'] == 'V') { ?>
                              <input type="text" class="form-control" name="product_category" value="<?php echo($product[0]->category_name); ?>" readonly>
                          <?php } 
                          else {?>
                          <select class="form-control" name="product_category">
                            <option value="<?php echo $product[0]->category_id; ?>"><?php echo($product[0]->category_name); ?></option>
                            <?php 
                          foreach($category_name as $row)
                          {
                            if($row->c_id != $product[0]->c_id){  
                              echo('<option value ="'.$row->c_id.'">'.$row->category_name.'</option>');
                            }
                          }
                        ?>
                          </select>
                          <?php } ?>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control" name="product_description"><?php echo($product[0]->description); ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Actual Price</label>
                        <input type="number" name="actual_price" class="form-control" value="<?php echo($product[0]->actual_price); ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Vendor Price</label>
                        <input type="number" name="vendor_price" id="vendorPrice" class="form-control" value="<?php echo($product[0]->vendor_price); ?>">
                      </div>
                      <div class="form-group col-md-3" hidden>
                        <label>Commission Price</label>
                        <input type="hidden" name="offer_price" id="offerPrice" class="form-control" value="<?php echo($product[0]->offer_price); ?>">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Quantity</label>
                        <div class="input-group">
                          <input type="number" class="form-control" placeholder="Stock Quantity" name="quantity" value="<?php echo($product[0]->quantity); ?>">
                        </div>
                      </div>
                    </div>
                    <?php  
                    $count = 1;
                    foreach($product as $row){?>
                      <div class="form-row">
                        <div class="form-group col-md-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="files[]" id="<?php echo('imag'.$count);?>" disabled>
                            <label class="custom-file-label" for="customFile">Delete Image To Enable</label>
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <img id="<?php echo('ImgPreview'.$count);?>" src="<?php echo base_url('/assets/images/newproducts/'.$row->p_id.'/'.$row->image_url); ?>" class="preview2" width="50" height="50"/>
                          <input type="button" id="<?php echo('removeImage'.$count);?>" value="Delete" class="btn btn-danger btn-rmv2" />
                        </div>
                      </div>
                    <?php 
                     $count++;
                    } 
                    if($count < 5){
                      for($i = $count; $i < 5; $i++){ ?>
                        <div class="form-row">
                        <div class="form-group col-md-4">
                          <div class="custom-file">
                            <input type="file" class="custom-file-input" name="files[]" id="<?php echo('imag'.$i);?>">
                            <label class="custom-file-label" for="customFile">Choose image</label>
                          </div>
                        </div>
                        <div class="form-group col-md-4">
                          <img id="<?php echo('ImgPreview'.$i);?>" src="" class="preview2" width="50" height="50"/>
                          <input type="button" id="<?php echo('removeImage'.$i);?>" value="Delete" class="btn btn-danger btn-rmv2" />
                        </div>
                      </div>
                     <?php }
                    }
                    ?>
                      <!-- <div class="form-group col-md-3">
                        <label>Image</label>
                        <input type="file" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Image</label>
                        <input type="file" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Image</label>
                        <input type="file" class="form-control">
                      </div>
                      <div class="form-group col-md-3">
                        <label>Image</label>
                        <input type="file" class="form-control">
                      </div> -->
                  </div>
                  <div class="card-footer text-right">
                    <a class="btn btn-dark mr-1" href="<?php echo base_url('admin/productlist');?>">Back</a>
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                </div>
              </form>
             <?php } else {  ?>
              <div class="card">
                  <div class="card-header"><h5> Sorry No Porduct Found </h5>
                  </div><div class="card-body"><a class="btn btn-primary mr-1" href="<?php echo base_url('admin/productlist');?>">Back</a></div></div>
            <?php }?>
              </div>
            </div>
          </div>
        </section>
      </div>