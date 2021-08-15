<div class="container">
   <div class="main-body">
      <!-- Breadcrumb -->
      <nav aria-label="breadcrumb" class="main-breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="index.html">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">User Profile</li>
         </ol>
      </nav>
      <!-- /Breadcrumb -->
      <div class="row gutters-sm">
         <div class="col-md-4 mb-3">
            <div class="card">
               <div class="card-body">
                  <div class="d-flex flex-column align-items-center text-center">
                     <img src="https://bootdey.com/img/Content/avatar/avatar7.png" alt="Admin" class="rounded-circle" width="150">
                     <div class="mt-3">
                        <h4>John Doe</h4>
                        <p class="text-secondary mb-1">johndoe@gmail.com</p>
                        <!-- <p class="text-muted font-size-sm"></p> -->
                     </div>
                  </div>
                  <div class="row">
                     <div class="col-sm-12 align-items-center text-center">
                        <a class="btn btn-info " target="__blank" href="#">Edit</a>
                     </div>
                  </div>
               </div>
            </div>
            <div class="mt-3 align-items-center text-center">
               <a class="btn btn-danger" href="<?php echo base_url('/order'); ?>">Your Orders</a>
            </div>
         </div>
         <div class="col-md-8">
                    <h4>Address</h4>

            <div class="accordion" id="accordionExample">
                 <?php
                          $count =1;
                         foreach ($address as $value) { ?>
                            <?php
                $attributes = array('class' => 'form-horizontal', 'id' => 'form-detail-edit', 'action' => '#');

                echo form_open('admin/Address/ajax_detail_update', $attributes);
                ?>
               <input type="hidden" name="users_id" id ="users_id" value="<?php echo $value->ad_user_id ?>">
               <div class="accordion-item">
                  <h2 class="accordion-header" id="heading<?php echo($count)?>">
                     <button class="accordion-button" type="button" data-bs-toggle="collapse" data-bs-target="#collapse<?php echo($count)?>" aria-expanded="false" aria-controls="collapse<?php echo($count)?>">
                    <?php echo("Address ".$count); ?>
                     </button>
                  </h2>
                  <div id="collapse<?php echo($count)?>" class="accordion-collapse collapse" aria-labelledby="collapse<?php echo($count)?>" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                 <input type="hidden" name="address_id" id ="address_id" value="<?php echo $value->ad_id ?>">
                                <input type="text" class="form-control" placeholder="Add title like Home/Office etc.." name="ad_title" value="<?php echo($value->ad_title) ?>" >
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 1</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="line_1" value="<?php echo($value->line_1) ?>" >
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 2</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="line_2" value="<?php echo($value->line_2) ?>" >
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 3</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="line_3" value="<?php echo($value->line_3) ?>">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="state" value="<?php echo($value->state) ?>">
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">District</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                 <input type="text" class="form-control" name="district" value="<?php echo($value->district) ?>">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Post Office</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                     <input type="text" class="form-control" name="post" value="<?php echo($value->post) ?>">
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Pincode</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="number" class="form-control" name="pin" value="<?php echo($value->pin) ?>">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Primary Contact Number</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="number" class="form-control" name="contact_number_1" value="<?php echo($value->contact_number_1) ?>" >
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Secondary Contact Number</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="number" class="form-control" name="contact_number_2" value="<?php echo($value->contact_number_2) ?>">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                  <?php echo form_close(); ?>
                                 <div class="col-sm-12">
                                     <button class="btn btn-info" type="submit">Update</button>
                                  <!--   <a class="btn btn-info " target="__blank" href="#">Update</a> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

               </div>
                 <?php $count++; } ?>
            
               <form method="post" action="<?php echo site_url('admin/address/add_new'); ?>" enctype="multipart/form-data">
               <!-- <div class=" accordion" id="accordionExample2"> -->
               <div class="accordion-item">
                  <h2 class="accordion-header" id="headingTwo">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseTwo" aria-expanded="true" aria-controls="collapseTwo">
                     Add New Address
                     </button>
                  </h2>
                  <div id="collapseTwo" class="accordion-collapse collapse show" aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                 <input type="text" class="form-control" placeholder="Add title like Home/Office etc.." name="ad_title" >
                                 <input type="hidden" class="form-control" name="user_id" value="<?php echo $user_id; ?>">
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 1</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="line_1" value="">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 2</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="line_2" >
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 3</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="line_3" value="">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="state" value=""> 
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">District</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="text" class="form-control" name="district" >
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Post Office</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                 <input type="text" class="form-control" name="post" >
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Pincode</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="number" class="form-control" name="pin" value="">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Primary Contact Number</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    <input type="number" class="form-control" name="contact_number_1" >
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Secondary Contact Number</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                 <input type="number" class="form-control" name="contact_number_2" value="">
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <button class="btn btn-info" type="submit">Submit</button>
                                    <!-- <a class="btn btn-info " target="__blank" href="#">Edit</a> -->
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div>
               </div>
               </form>

       <!--         <div class="accordion-item">
                  <h2 class="accordion-header" id="headingThree">
                     <button class="accordion-button collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#collapseThree" aria-expanded="false" aria-controls="collapseThree">
                     Accordion Item #3
                     </button>
                  </h2>
                  <div id="collapseThree" class="accordion-collapse collapse" aria-labelledby="headingThree" data-bs-parent="#accordionExample">
                     <div class="accordion-body">
                        <div class="card mb-3">
                           <div class="card-body">
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Title</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Home
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 1</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Kenneth Valdez
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 2</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Kenneth Valdez
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Address Line 3</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Kenneth Valdez
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">State</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Kenneth Valdez 
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">District</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Kenneth Valdez
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Post Office</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    KennethValdezKennethValdezKenneth
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Pincode</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    Kenneth Valdez
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Primary Contact Number</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    887657800
                                 </div>
                                 <div class="col-sm-3">
                                    <h6 class="mb-0">Secondary Contact Number</h6>
                                 </div>
                                 <div class="col-sm-3 text-secondary">
                                    6657678922
                                 </div>
                              </div>
                              <hr>
                              <div class="row">
                                 <div class="col-sm-12">
                                    <a class="btn btn-info " target="__blank" href="#">Edit</a>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>
               </div> -->
            </div>
         </div>
      </div>
   </div>
</div>