<div class="container-fluid">
 <div class="row">

    <div class="container mt-4 mb-4">
            <div class="row">
                <div class="col-md-5 offset-md-4">
                    <div class="login-form bg-light mt-4 p-4">
                        <?php if(isset($message)){ ?>
                        <div class="alert alert-danger" role="alert">
                        <?php echo($message); ?>
                        </div>
                        <?php } ?>
                        <?php if ($this->session->flashdata()) { ?>
                        <div class="alert alert-success">
                            <?= $this->session->flashdata('msg'); ?>
                        </div>
                     <?php } ?>
                        <form method="post" action="<?php echo site_url('login/process'); ?>" class="needs-validation" novalidate="">
                            <h4>Login Here</h4><hr>
                            <div class="col-12 mt-4">
                                <label>Email</label>
                                <input type="text" name="email" class="form-control" placeholder="Email">
                            </div>
                            <div class="col-12 mt-4">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" placeholder="Password">
                            </div>
                            <div class="col-12 mt-4">
                                <div class="form-check">
                                    <input class="form-check-input" type="checkbox" id="rememberMe">
                                    <label class="form-check-label" for="rememberMe"> Remember me</label>
                                </div>
                            </div>
                            <div class="col-12">
                                <button type="submit" class="btn btn-theme float-end">Login</button>
                            </div>
                        </form>
                        <hr class="mt-5">
                        <div class="col-12">
                            <p class="text-center mb-0">Have not account yet? <a href="<?php echo base_url('login/registration'); ?>">Signup</a></p>
                        </div>
                    </div>
                </div>
            </div>
    </div>
 </div>
</div>