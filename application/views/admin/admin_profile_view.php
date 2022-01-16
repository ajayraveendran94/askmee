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
                  <form method="post" id="placedOrder" action="<?php echo site_url('admin/order/place_order'); ?>" enctype="multipart/form-data">
                  <div class="card-body">
                    <div class="form-row">
                      <div class="form-group col-md-10">
                       <label>Product</label>
                       <select class="form-control" name="product_name" id="productName">
                         <!-- <?php 
                           foreach($product_list as $product)
                           {
                              echo('<option value ="'.$product['p_id'].'">'.$product['product_name'].' (Vendor: '.$product['name'].')</option>');
                           }
                         ?> -->
                       </select>
                      </div>
                      <div class="form-group col-md-2">
                      <button class="btn btn-dark mt-4" id="selectProduct" type="Add">Add</button>
                     </div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>