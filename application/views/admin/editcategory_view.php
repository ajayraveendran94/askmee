<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
              <?php if(count($category) > 0){?>
              <form method="post" action="<?php echo site_url('admin/editcategory/edit_category'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit Category</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Category Name</label>
                          <input type="text" class="form-control" name="category_name" value="<?php echo($category[0]->category_name); ?>">
                          <input type="hidden" class="form-control" name="category_id" value="<?php echo($category[0]->c_id); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-3">
                        <label>Category Image</label>
                        <input type="file" name="file" class="form-control">
                      </div>
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
                    </div> -->
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-dark mr-1">
                    <a href="<?php echo base_url('admin/categorylist');?>">Back</a>
                    </button>
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <!-- <button class="btn btn-secondary" type="reset">Reset</button> -->
                  </div>
                </div>
              </form>
              <?php } 
            else{ ?>
              <div class="card">
                  <div class="card-header"><h5> Sorry No Category Found </h5>
                  </div><div class="card-body"><a class="btn btn-primary mr-1" href="<?php echo base_url('admin/categorylist');?>">Back</a></div></div>
            <?php }?>
              </div>
            </div>
          </div>
        </section>
      </div>