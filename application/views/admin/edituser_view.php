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
            <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Address</h4>
                  </div>
                  <div class="card-body">
                    <div id="accordion">
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-1"
                          aria-expanded="true">
                          <h4>Address 1</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-1" data-parent="#accordion">
                        <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Add title like Home/Office etc.." name="ad_title" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Address Line 1</label>
                                <input type="text" class="form-control" name="line_1" value="">
                              </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" name="line_2" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Address Line 3</label>
                                <input type="text" class="form-control" name="line_3" value="">
                                </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Post Office</label>
                                <input type="text" class="form-control" name="post" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Pincode</label>
                                <input type="number" class="form-control" name="pin" value="">
                                </div>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>District</label>
                                <input type="text" class="form-control" name="district" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" name="state" value="">
                              </div>
                          </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Contact Number 1</label>
                                <input type="number" class="form-control" name="contact_number_1" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Contact Number 2</label>
                                <input type="number" class="form-control" name="contact_number_2" value="">
                              </div>
                            </div>
                          </div>
                            <button class="btn btn-primary mr-1" type="submit">Submit</button>
                            <button class="btn btn-danger mr-1" type="submit">Delete</button>
                        </div>
                      </div>
                      <form method="post" action="<?php echo site_url('admin/address/add_new'); ?>" enctype="multipart/form-data">
                      <div class="accordion">
                        <div class="accordion-header" role="button" data-toggle="collapse" data-target="#panel-body-3">
                          <h4>Add New Address</h4>
                        </div>
                        <div class="accordion-body collapse" id="panel-body-3" data-parent="#accordion">
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Title</label>
                                <input type="text" class="form-control" placeholder="Add title like Home/Office etc.." name="ad_title" >
                                <input type="hidden" class="form-control" name="user_id" value="<?php echo($user[0]->user_id); ?>">
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Address Line 1</label>
                                <input type="text" class="form-control" name="line_1" value="">
                              </div>
                            </div>
                          </div>        
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Address Line 2</label>
                                <input type="text" class="form-control" name="line_2" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Address Line 3</label>
                                <input type="text" class="form-control" name="line_3" value="">
                                </div>
                            </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Post Office</label>
                                <input type="text" class="form-control" name="post" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Pincode</label>
                                <input type="number" class="form-control" name="pin" value="">
                                </div>
                              </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>District</label>
                                <input type="text" class="form-control" name="district" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>State</label>
                                <input type="text" class="form-control" name="state" value="">
                              </div>
                          </div>
                          </div>
                          <div class="form-row">
                            <div class="col-6">
                              <div class="form-group">
                                <label>Contact Number 1</label>
                                <input type="number" class="form-control" name="contact_number_1" >
                              </div>
                            </div>
                            <div class="col-6">
                              <div class="form-group">
                                <label>Contact Number 2</label>
                                <input type="number" class="form-control" name="contact_number_2" value="">
                              </div>
                            </div>
                          </div>
                          <button class="btn btn-primary mr-1" type="submit">Submit</button>
                        </div>
                      </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>