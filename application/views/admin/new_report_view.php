<!-- Main Content -->
      <div class="main-content">
      <?php $result = isset($result) ? $result : 'No'; ?>
        <section class="section">
          <div class="section-body">
            <div class="row">
              <div class="col-12 col-md-12 col-lg-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Show & Export Reports</h4>
                  </div>
                  <div class="card-body">
                    <div id="dateAlert" class="alert alert-danger alert-has-icon" style="display: none;">
                      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                      <div class="alert-body">
                        <div class="alert-title">Choose Valid Dates</div>
                        From date should be lesser than To date
                      </div>
                    </div>
                    <form method="post" id="newReport" action="<?php echo site_url('admin/report/new_report'); ?>" enctype="multipart/form-data" onsubmit="return checkDate();">
                    <div class="form-row">
                      <div class="form-group col-md-4">
                       <label>Select Report Type</label>
                       <select class="form-control" name="report_type" required>
                         <option value="sales_report">Sales Report</option>
                         <!-- <option value="stock_report">Stock Report</option> -->
                       </select>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>From Date</label>
                          <input id="fromDate" type="date" class="form-control" name="from_date" required>
                        </div>
                      </div>
                      <div class="col-4">
                        <div class="form-group">
                          <label>To Date</label>
                          <input id="toDate" type="date" class="form-control" name="to_date" required>
                        </div>
                      </div>
                    </div>
                    <div class="form-row">
                      <div class="form-group col-md-4">
                       <label>Select Vendor (Optional)</label>
                       <select class="form-control" name="report_vendor">
                         <option value=0>---Select Option---</option>
                         <?php foreach($vendor_data as $row){ ?>
                         <option value="<?php echo $row['user_id']; ?>"><?php echo($row['name'].' ('.$row['email'].')'); ?></option>
                       <?php } ?>
                       </select>
                      </div>
                      <div class="form-group col-md-4">
                       <label>Select Status</label>
                       <select class="form-control" name="report_status" requied>
                         <?php foreach($status_data as $row){ ?>
                         <option value="<?php echo $row['ors_id']; ?>"><?php echo($row['status_name']); ?></option>
                       <?php } ?>
                       </select>
                      </div>
                      <div class="col-md-4">
                      <input type="submit" class="btn btn-warning mt-4" id="exportReport" value="Show Report">
                     </div>
                    </div>
                  </div>
                </form>
                </div>
              </div>
            </div>
          </div>
        </section>
      </div>