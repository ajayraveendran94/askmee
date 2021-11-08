<div class="container-fluid">
            <nav class="navbar navbar-expand-lg navbar-light bg-theme navbar-web shift">
                <div class="container-fluid">
                    <button class="navbar-toggler" type="button" data-bs-toggle="collapse"
                        data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent"
                        aria-expanded="false" aria-label="Toggle navigation">
                        <span class="navbar-toggler-icon"></span>
                    </button>
                    <div class="collapse navbar-collapse" id="navbarSupportedContent">
                        <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="productlisting.html">All</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link " aria-current="page" href="productlisting.html">Vegetable</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productlisting.html">Fruits</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productlisting.html">Meats</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productlisting.html">Fish</a>
                            </li>
                            <li class="nav-item">
                                <a class="nav-link" href="productlisting.html">Egg</a>
                            </li>

                        </ul>
                    </div>
                </div>
            </nav>
            <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
                <nav aria-label="breadcrumb">
                    <ol class="breadcrumb">
                        <li class="breadcrumb-item"><a href="#">Home</a></li>
                        <li class="breadcrumb-item active" aria-current="page">Userprofile</li>
                    </ol>
                </nav>
                <hr>
            </div>
        </div>
        <!------------>
        <div class="content-area pt-0">
            <div class="main-body">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php echo base_url("assets/assets/img/PNG_LOGO_1.png");?>" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4>John Doe</h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Account</h5>
                                </div>
                                <div class="ibox-content">
                                    <ul class="list-group list-group-flush">
                                        <!-- <li class="list-group-item"><a href="userprofile.html"><i
                                                    class="fa fa-user mx-2" aria-hidden="true"></i> Profile</a></li> -->
                                        <li class="list-group-item"><a href="<?php echo base_url('/order'); ?>"><i class="fa fa-cart-plus mx-2"
                                                    aria-hidden="true"></i> Orders</a></li>
                                        <li class="list-group-item"><a href="<?php echo base_url('/cart'); ?>"><i
                                                    class="fa fa-shopping-cart mx-2" aria-hidden="true"></i> Cart</a>
                                        </li>
                                        <li class="list-group-item"><a href="<?php echo base_url('login/logout'); ?>"><i class="fa fa-sign-out  mx-2"
                                                    aria-hidden="true"></i> Logout</a></li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-8">
                        <div class="card mb-3">
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Full Name</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user_data[0]->name ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Email</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        fip@jukmuh.al
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-3">
                                        <h6 class="mb-0">Mobile</h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo $user_data[0]->mobile_number ?>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                 <?php
                          $count =1;
                         foreach ($address as $key => $value) { ?>
                                    <div class="col-sm-3">
                                       <?php if($key == 0){ ?>
                                        <h6 class="mb-0">Address</h6>
                                     <?php }
                                     else {?>
                                       <h6 class="mb-0"></h6>
                                    <?php } ?>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        <?php echo('<b>'.($key+1).'</b>. '.$value->line_1.','.$value->line_2.','.$value->line_3.','.$value->district.','.$value->state) ?>
                                    </div>
                                    <!-- <div class="col-sm-3">
                                        <h6 class="mb-0"></h6>
                                    </div>
                                    <div class="col-sm-9 text-secondary">
                                        Bay Area, San Francisco, CA
                                    </div> -->
                                 <?php } ?>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-sm-12">
                                        <button type="button" class="btn btn-theme" data-bs-toggle="modal"
                                            data-bs-target="#exampleModal">
                                            Edit
                                        </button>
                                        <div class="modal fade" id="exampleModal" tabindex="-1"
                                            aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog">
                                                <div class="modal-content">
                                                    <div class="modal-header">
                                                        <h5 class="modal-title" id="exampleModalLabel">User Profile</h5>
                                                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                            aria-label="Close"></button>
                                                    </div>
                                                    <div class="modal-body">
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Email address</label>
                                                            <input type="email" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Email Address">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Mobile</label>
                                                            <input type="number" class="form-control"
                                                                id="exampleFormControlInput1"
                                                                placeholder="Mobile Number">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Address</label>
                                                            <textarea class="form-control"
                                                                placeholder="Address with pincode"></textarea>
                                                        </div>
                                                    </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary"
                                                            data-bs-dismiss="modal">Close</button>
                                                        <button type="button" class="btn btn-theme">Save
                                                            changes</button>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>