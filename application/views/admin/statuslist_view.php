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
                    <a style="margin-left: 50%;" href="#" class="btn btn-warning">Add New Status Stage</a>
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
                              <a href="<?php echo base_url('admin/orderlist/editstatus/'.$row['ors_id']); ?>" class="btn btn-danger">Edit</a>
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
        
      </div>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->
</html>