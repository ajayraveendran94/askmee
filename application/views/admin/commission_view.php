<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Commission List</h4>

                  </div>
                  <div class="card-body">
                    <button style="margin-left: 50%;" class="btn btn-warning" data-toggle="modal" data-target="#newCommissionModal">New Commission</button>
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-7">
                        <thead>
                          <tr>
                            <th class="text-center pt-3">
                              <div class="custom-checkbox custom-checkbox-table custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                  class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Commission ID</th>
                            <!-- <th>Category</th> -->
                            <th>Commission Name</th>
                            <th>Commission Amount</th>
                            <th>Commission Percentage</th>
                            <!-- <th>Quantity</th> -->
                            <th>Action</th> 
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          foreach($commission as $row){
                        ?>
                          <tr>
                            <td class="text-center pt-2">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                  id="checkbox-<?php echo $row['com_id'] ?>">
                                <label for="checkbox-<?php echo $row['com_id'] ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td>
                              <?php echo $row['com_id']; ?>
                                
                            </td>
                            <td>
                              <?php echo $row['com_name']; ?>
                            </td> 
                            <td>
                              <?php 
                              if($row['com_amount']){
                                echo $row['com_amount']; 
                                }
                                else{
                                  echo("NA");
                                }?>
                            </td>
                            <td>
                              <?php 
                              if($row['com_percent']){
                                echo $row['com_percent']; 
                                }
                                else{
                                  echo("NA");
                                }?>
                            </td>
                            <td>
                              <button commissionId= "<?php echo $row['com_id']; ?>" commissionValue="<?php echo $row['com_name']; ?>" comAmount="<?php echo $row['com_amount']; ?>" comPercent="<?php echo $row['com_percent']; ?>" class="btn btn-danger commissionUpdateButton" data-toggle="modal" data-target="#commissionModal">Edit</button>
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
        <div class="modal fade" id="newCommissionModal" tabindex="-1" role="dialog" aria-labelledby="formModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="formModal">Add New Commission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="">
                  <div class="form-group">
                    <label>Commission name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chevron-right"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Enter Valid Name" id="commissionName">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Commission Amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-rupee-sign"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" placeholder="Enter Valid Amount" id="commissionAmount">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Commission Percentage</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-percent"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" placeholder="Between 0 - 99" id="commissionPercent" max=99>
                    </div>
                  </div>
                  <button type="button" id="newCommission" class="btn btn-primary m-t-15 waves-effect">SAVE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="modal fade" id="commissionModal" tabindex="-1" role="dialog" aria-labelledby="sModal"
          aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="sModal">Edit Commission</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">
                <form class="">
                  <div class="form-group">
                    <label>Commission name</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-chevron-right"></i>
                        </div>
                      </div>
                      <input type="text" class="form-control" placeholder="Enter Valid Commission Name" id="updateCommissionName">
                      <input type="hidden" class="form-control" id="updateCommissionId">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Commission Amount</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-rupee-sign"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" placeholder="Enter Valid Amount" id="updateCommissionAmount">
                    </div>
                  </div>
                  <div class="form-group">
                    <label>Commission Percentage</label>
                    <div class="input-group">
                      <div class="input-group-prepend">
                        <div class="input-group-text">
                          <i class="fas fa-percent"></i>
                        </div>
                      </div>
                      <input type="number" class="form-control" placeholder="Between 0 - 99" id="updateCommissionPercent" max=99>
                    </div>
                  </div>
                  <button type="button" id="updateCommission" class="btn btn-primary m-t-15 waves-effect">UPDATE</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


<!-- datatables.html  21 Nov 2019 03:55:25 GMT -->