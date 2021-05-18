<!-- Main Content -->
      <div class="main-content">
      <?php $result = isset($result) ? $result : 'No'; ?>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
              <form method="post"  action="<?php echo site_url('admin/adduser/new_user'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Add New User</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>User Name</label>
                          <input type="text" class="form-control" name="user_name" required>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>User Type</label>
                          <select class="form-control" name="user_type">
                            <option value="U">User</option>
                            <option value="V">Vendor</option>
                            <option value="A">Admin</option>
                          </select>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="email" class="form-control" name="user_email" required>
                          <input id="outputCategory" type="hidden" class="form-control" name="output" tabindex="2" value="<?php echo $result; ?>">
                          <div class="invalid-feedback"> Oh no! Email is invalid. </div>
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" class="form-control" name="password" required>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-footer text-right">
                  <input type="submit" id="productSubmit" class="btn btn-primary">
                  <button class="btn btn-secondary" type="reset">Reset</button>
                  </div>
                </div>
              </form>
              </div>
            </div>
          </div>
        </section>
      </div>