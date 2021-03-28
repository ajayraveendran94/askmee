<!-- Main Content -->
      <div class="main-content">
      <?php $result = isset($result) ? $result : 'No'; ?>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-6 col-lg-6">
              <form method="post" action="<?php echo site_url('admin/addproduct/new_product'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-group">
                      <label>Product Name</label>
                      <input id="outputCategory" type="hidden" class="form-control" name="output" tabindex="2" value="<?php echo $result; ?>">
                      <input type="text" class="form-control" name="product_name">
                    </div>
                    <div class="form-group">
                      <label>Category</label>
                      <select class="form-control" name="product_category">
                        <?php 
                          foreach($category_name as $row)
                          {
                              echo('<option value ="'.$row->id.'">'.$row->category_name.'</option>');
                          }
                        ?>
                      </select>
                    </div>
                    <!-- <div class="form-group">
                      <label>Select Multiple</label>
                      <select class="form-control" multiple="" data-height="100%">
                        <option>Option 1</option>
                        <option>Option 2</option>
                        <option>Option 3</option>
                        <option>Option 3</option>
                      </select>
                    </div> -->
                    <div class="form-group">
                      <label>Description</label>
                      <textarea class="form-control" name="product_description"></textarea>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Actual Price</label>
                        <input type="number" class="form-control" name="offer_price">
                      </div>
                      <div class="form-group col-md-6">
                        <label>Offer Price</label>
                        <input type="number" class="form-control" name="actual_price">
                      </div>
                    </div>
                    <div class="form-group">
                      <label>Stock Quantity</label>
                      <input type="number" class="form-control" name="quantity">
                    </div>
                    <div class="form-group">
                      <label>Image</label>
                      <input type="file" class="form-control" name="file">
                    </div>
                  </div>
                  <div class="card-footer text-right">
                  <input type="submit" id="productSubmit" class="btn btn-primary">
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
              </form>
              </div>
              <div class="col-12 col-md-6 col-lg-6">
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
              </div>
            </div>
          </div>
        </section>
      </div>