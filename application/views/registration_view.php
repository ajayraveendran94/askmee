<div class="container-fluid">
   <dic class="row">
   <div class="container mt-5 mb-5">
      <div class="row d-flex align-items-center justify-content-center">
         <div class="col-md-6">
            <div class="card px-5 py-5">
               <div class="errMsg" id="errMsg" style="color:red;text-align:center">
                  <?php if ($this->session->flashdata()) { ?>
                  <div class="alert alert-danger">
                     <?=$this->session->flashdata('errors'); ?>
                  </div>
                  <?php } ?>
                  <?php echo validation_errors(); ?>
               </div>
               <form  action="register" method="post" onSubmit="return validate()">
                  <h4 class="mt-3">Register Here </h4>
                  <div class="form-input"> <i class="fa fa-user"></i> <input type="text" class="form-control" name="name" id="name" placeholder="Enter Your Name" required> </div>
                    <div class="form-input"> <i class="fa fa-envelope"></i> <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Email Address" required> </div>
                    <div class="form-input"> <i class="fa fa-mobile"></i> <input type="number" class="form-control" name="mobile_num" id="mobile_num" placeholder="Mobile Number" required> </div>
                    <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="password" id="password" placeholder="Password" required> </div>
                    <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="Confirm Password" required> </div>
                  <div class="row">
                     <button class="btn btn-theme mt-4 signup">Register</button>
                  </div>
                  <div class="text-center mt-4"> <span>Already a member?</span> <a href="<?php echo base_url('login'); ?>" class="text-decoration-none">Login</a> </div>
               </form>
            </div>
         </div>
      </div>
   </div>
</div>
</div>