<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New Product</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Product Name</label>
                          <input type="text" class="form-control" value="<?php echo($product[0]->product_name); ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Category</label>
                          <select class="form-control">
                            <option><?php echo($product[0]->category_name); ?></option>
                            <option>Category 2</option>
                            <option>Category 3</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-12">
                        <div class="form-group">
                          <label>Description</label>
                          <textarea class="form-control"><?php echo($product[0]->description); ?></textarea>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                        <label>Actual Price</label>
                        <input type="number" class="form-control" value="<?php echo($product[0]->actual_price); ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Offer Price</label>
                        <input type="number" class="form-control" value="<?php echo($product[0]->offer_price); ?>">
                      </div>
                      <div class="form-group col-md-4">
                        <label>Quantity</label>
                        <div class="input-group">
                          <input type="number" class="form-control" placeholder="Stock Quantity" name="quantity" value="<?php echo($product[0]->quantity); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
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
                      </div>
                      <div class="form-group col-md-3">
                        <label>Image</label>
                        <input type="file" class="form-control">
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-primary mr-1" type="submit">Submit</button>
                    <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>