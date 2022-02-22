<!-- Main Content -->
      <div class="main-content">
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Master Product List</h4>
                  </div>
                  <div class="card-body">
                    <div class="table-responsive">
                      <table class="table table-striped" id="table-5">
                        <thead>
                          <tr>
                            <th class="text-center pt-3">
                              <div class="custom-checkbox custom-checkbox-table custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" data-checkbox-role="dad"
                                  class="custom-control-input" id="checkbox-all">
                                <label for="checkbox-all" class="custom-control-label">&nbsp;</label>
                              </div>
                            </th>
                            <th>Product Name</th>
                            <!-- <th>Category</th> -->
                            <th>Category Name</th>
                            <th>Commission Name</th>
                            <th>Commission Value</th>
                            <!-- <th>Quantity</th> -->
                            <th>Action</th> 
                          </tr>
                        </thead>
                        <tbody>
                        <?php 
                          foreach($master_product_data as $row){
                        ?>
                          <tr>
                            <td class="text-center pt-2">
                              <div class="custom-checkbox custom-control">
                                <input type="checkbox" data-checkboxes="mygroup" class="custom-control-input"
                                  id="checkbox-<?php echo $row['id'] ?>">
                                <label for="checkbox-<?php echo $row['id'] ?>" class="custom-control-label">&nbsp;</label>
                              </div>
                            </td>
                            <td><?php echo $row['product_name']; ?></td>
                            <td><?php echo $row['category_name']; ?></td>
                            <td><?php echo $row['com_name']; ?></td>
                            <td><?php if($row['com_amount']){
                              echo('₹'.$row['com_amount']);
                            }
                            else{
                              echo($row['com_percent'].'%');
                            }?></td>
                            <td>
                              <!-- <a href="#" class="btn btn-primary">Details</a> -->
                              <a href="<?php echo base_url('admin/productlist/edit_master_product/'.$row['id']); ?>" class="btn btn-warning">Edit</a>
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