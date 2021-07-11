<!-- Main Content -->
      <div class="main-content">
      <?php $result = isset($result) ? $result : 'No'; ?>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Place New Order</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-10">
                       <label>Product</label>
                       <select class="form-control" name="product_name">
                         <?php 
                           foreach($product_list as $product)
                           {
                              echo('<option value ="'.$product['p_id'].'">'.$product['product_name'].' (Vendor: '.$product['name'].')</option>');
                           }
                         ?>
                       </select>
                      </div>
                      <div class="form-group col-md-2">
                      <button class="btn btn-dark mt-4" id="selectProduct" type="Add">Add</button>
                     </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
              <form method="post" action="<?php echo site_url('admin/addproduct/new_product'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Placed Orders</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Product Name</label>
                        <input type="number" class="form-control" name="order_product_name">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Vendor Name</label>
                        <input type="number" class="form-control" name="Vendor">
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Price</label>
                        <input type="number" class="form-control" name="offer_price">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Select Quantity</label>
                        <input type="number" class="form-control" name="quantity">
                      </div>
                    </div>

                </div>
                <div class="card-footer text-right">
                  <input type="submit" id="productSubmit" class="btn btn-primary">
                </div>
              </form>
              </div>
              <!-- <div class="col-12 col-md-6 col-lg-6">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Category</h4>
                  </div>
                  <form method="post" action="<?php echo site_url('admin/upload_image/ajax_upload'); ?>" enctype="multipart/form-data">
                    <div class="card-body">
                      <div class="form-group">
                        <label for="inputEmail4">Enter Category Name</label>
                        <input type="text" class="form-control" name="title" placeholder="Category Name">
                      </div>
                      <div class="form-group">
                        <label>Category Image</label>
                        <input type="file" class="form-control" name="file" id="file">
                      </div>
                    </div>
                    <div class="card-footer">
                      <input type="submit" id="catrgorySubmit" class="btn btn-primary">
                    </div>
                   </form>
                </div>
              </div> -->
            </div>
          </div>
        </section>
      </div>