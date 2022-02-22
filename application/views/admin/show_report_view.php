<div class="main-content">
  <?php $result = isset($result) ? $result : 'No'; ?>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Export Table</h4>
                  </div>
                  <div class="card-body">
                    <?php if(!is_null($sales_data)) {?>
                    <div class="table-responsive">
                      <table class="table table-striped table-hover" id="tableExport" style="width:100%;">
                        <thead>
                          <tr>
                            <?php foreach ($headers as $header) {
                              echo('<th>'.$header.'</th>');
                            }?>
                          </tr>
                        </thead>
                        <tbody>
                          <?php foreach ($sales_data as $value) {?>
                          <tr>
                            <td><?php echo $value['or_detail_id'];?></td>
                            <td><?php echo $value['order_date'];?></td>
                            <td><?php echo $value['product_name'];?></td>
                            <td><?php echo $value['or_quantity'];?></td>
                            <td><?php echo $value['name'];?></td>
                            <td><?php echo ($value['line_1'].' '.$value['line_2'].' '.$value['line_3'].' '.$value['post'].' '.$value['pin'].' '.$value['district'].' '.$value['state'].' '.$value['contact_number_1']);?></td>
                            <?php foreach ($vendor_data as $vendor) {
                              if($vendor['or_detail_id'] == $value['or_detail_id']){
                                echo('<td>'.$vendor['name'].'</td>');
                              }
                            } ?>
                            <td><?php echo $value['status_name'];?></td>
                            <td><?php echo $value['total_price'];?></td>
                          </tr>
                          <?php  }?>
                        </tbody>
                      </table>
                    </div>
                  <?php } 
                  else{
                    echo('No Data Available');
                  }?>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>