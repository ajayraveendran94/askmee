<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
              <form method="post" action="<?php echo site_url('admin/editproduct/edit_master_product'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Master Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" name="product_name" value="<?php echo($master_product[0]->product_name); ?>">
                          <input type="hidden" class="form-control" name="product_id" value="<?php echo($master_product[0]->id); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-6">
                        <label>Category</label>
                      <select class="form-control" name="product_category">
                        <?php 
                          $category_id = $master_product[0]->c_id;
                            echo('<option value ="'.$master_product[0]->c_id.'">'.$master_product[0]->category_name.'</option>');
                          foreach($category_name as $row)
                          {
                            if($category_id != $row['c_id']){
                              echo('<option value ="'.$row['c_id'].'">'.$row['category_name'].'</option>');
                            }
                          }
                        ?>
                      </select>
                      </div>
                      <div class="form-group col-md-6">
                        <label>Commission</label>
                      <select class="form-control" name="product_commission">
                        <?php 
                        $commission_id = $master_product[0]->com_id;
                        if($master_product[0]->com_amount){
                              echo('<option value ="'.$master_product[0]->com_id.'">'.$master_product[0]->com_name.' (₹'.$master_product[0]->com_amount.')'.'</option>');
                            }
                        else{
                              echo('<option value ="'.$master_product[0]->com_id.'">'.$master_product[0]->com_name.' ('.$master_product[0]->com_percent.'%)'.'</option>');
                        }
                        foreach($commission as $row)
                        {
                          if($row->com_id != $commission_id){
                            if($row->com_amount){
                              echo('<option value ="'.$row->com_id.'">'.$row->com_name.' (₹'.$row->com_amount.')'.'</option>');
                            }
                            else{
                              echo('<option value ="'.$row->com_id.'">'.$row->com_name.' ('.$row->com_percent.'%)'.'</option>');
                            }
                          }
                        }
                        ?>
                      </select>
                      </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-dark mr-1">
                    <a href="<?php echo base_url('admin/productlist/master_product_list');?>">Back</a>
                    </button>
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </section>
      </div>