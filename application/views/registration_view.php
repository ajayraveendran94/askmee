<div class="container-fluid">
 <dic class="row">
 

    <div class="container mt-5 mb-5">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-6">
                <div class="card px-5 py-5">
                <div class="errMsg" id="errMsg" style="color:red;">
                <?php
                if (isset($error)) {
                        echo $error;
                }
                
                ?>
                </div>
                <form onSubmit="return validate()" action="register" method="post">
                    <h5 class="mt-3">Register Here </h5> 
                    <div class="form-input"> <i class="fa fa-user"></i> <input type="text" class="form-control" name="name" id="name" placeholder="Enter the Name" required> </div>
                    <div class="form-input"> <i class="fa fa-envelope"></i> <input type="email" class="form-control" name="email_id" id="email_id" placeholder="Email address" required> </div>
                    <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="password" id="password" placeholder="password" required> </div>
                    <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" class="form-control" name="confirm_password" id="confirm_password" placeholder="password" required> </div>
                    <div class="form-input"> <i class="fa fa-mobile"></i> <input type="text" class="form-control" name="mobile_number" id="mobile_number" placeholder="mobile" required> </div>
                    
                    
                    <div class="form-check"> <input class="form-check-input" type="checkbox" id="flexCheckChecked"> <label class="form-check-label" for="flexCheckChecked"> I agree all the statements </label> </div> <button class="btn btn-warning mt-4 signup" >Register</button>
                    <div class="text-center mt-4"> <span>Already a member?</span> <a href="<?php echo base_url('login'); ?>" class="text-decoration-none">Login</a> </div>
                </form>
                </div>
            </div>
        </div>
    </div>
 </dic>
</div>