<div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
              <form method="post" action="<?php echo site_url('admin/userlist/edit_user'); ?>" enctype="multipart/form-data">
                <div class="card">
                  <div class="card-header">
                    <h4>Edit User</h4>
                  </div>
                  <div class="card-body">
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>User Name</label>
                          <input type="text" class="form-control" name="name" value="<?php echo($user[0]->name); ?>">
                          <input type="hidden" class="form-control" name="user_id" value="<?php echo($user[0]->user_id); ?>">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>Email</label>
                          <input type="text" class="form-control" name="email" value="<?php echo($user[0]->email); ?>">
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="col-6">
                        <div class="form-group">
                          <label>Password</label>
                          <input type="password" placeholder="Change Password" class="form-control" name="password" value="">
                        </div>
                      </div>
                      <div class="col-6">
                        <div class="form-group">
                          <label>User Type</label>
                          <?php 
                            $all_types = Array(
                              "U" => "User",
                              "V" => "Vendor",
                              "A" => "Admin"
                            );
                          ?>
                          <select class="form-control" name="user_type">
                            <option value="<?php echo $user[0]->user_type; ?>"><?php echo($all_types[$user[0]->user_type]); ?></option>
                            <?php
                          foreach($all_types as $row=>$row_value)
                          {
                            if($row != $user[0]->user_type){  
                              echo('<option value ="'.$row.'">'.$row_value.'</option>');
                            }
                          }
                        ?>
                          </select>
                        </div>
                      </div>
                    </div>
                  <div class="card-footer text-right">
                    <button class="btn btn-dark mr-1">
                    <a href="<?php echo base_url('admin/userlist');?>">Back</a>
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