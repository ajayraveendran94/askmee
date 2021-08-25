<div class="container-fluid">
  <div class="row">

    <div class="container mt-4 mb-4">
        <div class="row d-flex align-items-center justify-content-center">
            <div class="col-md-4">
                <div class="card px-4 py-4">
                    <?php if(isset($message)){ ?>
                    <div class="alert alert-danger" role="alert">
                        <?php echo($message); ?>
                    </div>
                    <?php } ?>
                    <h5 class="text-center">Login  Here !</h5> <hr>
                    <form method="post" action="<?php echo site_url('login/process'); ?>" class="needs-validation" novalidate="">
                        <div class="form-input"> <i class="fa fa-user"></i> <input type="text" name="email" class="form-control" placeholder="Email">
                        </div>
                        <div class="form-input"> <i class="fa fa-lock"></i> <input type="password" name="password" class="form-control" placeholder="password">
                        </div>
                        <div class="col">  
                        </div>
                        <button type="submit" class="form-control btn btn-light mt-4 signup">Login</button>
                        <div class="text-center mt-4"> <span>Not a member?</span> <a href="<?php echo base_url('login/registration'); ?>" class="text-decoration-none">Sign Up</a> </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
 </div>
</div>