<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Status List</h4>
                  </div>
                  <div class="card-body">
                    <button style="margin-left: 50%;" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal">New Status</button>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-6">
                        <thead>
                          <tr>
                            <th class="text-center pt-3">
                              <div class="custom-checkbox custom-checkbox-table custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                  class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Status ID</th>
                            <!-- <th>Category</th> -->
                            <th>Status Name</th>
                            <!-- <th>Quantity</th> -->
                            <th>Action</th> 
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          foreach($status as $row){
                        ?>
                          <tr>
                            <td class="text-center pt-2">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                  id="checkbox-<?php echo $row['ors_id'] ?>">
                                <label for="checkbox-<?php echo $row['ors_id'] ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>
                              <?php echo $row['ors_id']; ?>
                                
                            </td>
                            <td>
                              <?php echo $row['status_name']; ?>
                            </td> 
                            <td>
                              <!-- <a href="<?php echo base_url('admin/orderlist/editstatus/'.$row['ors_id']); ?>" class="btn btn-danger" data-toggle="modal" data-target="#statusModal">Edit</a> -->
                              <button statusId= "<?php echo $row['ors_id']; ?>" statusValue="<?php echo $row['status_name']; ?>" class="btn btn-danger statusUpdateButton" data-toggle="modal" data-target="#statusModal">Edit</button>
                            </td>
                          </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
        <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add New Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="">
                  <div class="form-group">
                    <label>Status name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chevron-right"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Enter Valid Status Name" id="statusName">
                    </div>
                  </div>
                  <button type="button" id="newStatus" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="statusModal" tabindex="-1" role="dialog" aria-labelledby="sModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="sModal">Add New Status</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="">
                  <div class="form-group">
                    <label>Status name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chevron-right"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Enter Valid Status Name" id="updateStatusName">
                      <input type="hidden" class="form-control" id="updateStatusId">
                    </div>
                  </div>
                  <button type="button" id="updateStatus" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->