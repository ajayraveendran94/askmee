<div class="container-fluid">
            <div class="col-sm-12 col-md-12 col-lg-12 content-area"  style="padding: 40px;">
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
            <div class="main-body" style="padding: 40px;">
                <div class="row gutters-sm">
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-body">
                                <div class="d-flex flex-column align-items-center text-center">
                                    <img src="<?php echo base_url("assets/assets/img/USER_profile.png");?>" alt="Admin"
                                        class="rounded-circle" width="150">
                                    <div class="mt-3">
                                        <h4><?php echo $user_data[0]->name ?></h4>

                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="card mt-2">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5><b>Account</b></h5>
                                </div>
                                <div class="ibox-content">
                                    <ul class="list-group list-group-flush">

                                        <li class="list-group-item"><a href="<?php echo base_url('/order'); ?>">
                                        <span><img src="assets/assets/img/Orders.png" Style="width:75px"></span><b>Orders</b> </a></li>
                                        <li class="list-group-item"><a href="<?php echo base_url('/cart'); ?>">
                                        <span><img src="assets/assets/img/Cart.png" Style="width:75px" ></span><b>Cart</b></a></li>
                                        
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
                                       <?php echo $user_data[0]->email ?>
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
                                        <?php echo('<b>'.($key+1).'</b>. '.$value->line_1.','.$value->line_2.' '.$value->line_3.' '.$value->post.' '.$value->district.' '.$value->state.' '.$value->contact_number_1.' '.$value->contact_number_2) ?>
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->line_1 ?>" />
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->line_2 ?>" />
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->line_3 ?>" />
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->district ?>" />
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->state ?>" />
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->pin ?>" />
                                        <input type = "hidden" name ="address_id" value = "<?php echo $value->post ?>" />
                                        <i class="fas fa-edit" onclick='edit_address_details("<?php echo $value->ad_id ?>");'></i>  
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
                                            Edit User Details
                                        </button>
                                        <button type="button" class="btn btn-theme" onclick="add_address_details();">
                                            Add New address
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
                                                    <div class="modal-body form">

                                 <?php $attributes = array('class' => 'form-horizontal', 'id' => 'form-detail-user', 'action' => '#');

echo form_open('Profile/update_profile', $attributes);
?>
 <input type="hidden" class="form-control" id="user_id" name ="user_id"  value ="<?php echo $user_data[0]->user_id ?>">
                                                          <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Name</label>
                                                            <input type="text" class="form-control"
                                                                id="name" name ="name"
                                                                placeholder="Name" value = " <?php echo $user_data[0]->name ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Email address</label>
                                                            <input type="email" class="form-control"
                                                                placeholder="Email Address" name = "email" id = "email" value = " <?php echo $user_data[0]->email ?>">
                                                        </div>
                                                        <div class="mb-3">
                                                            <label for="exampleFormControlInput1"
                                                                class="form-label">Mobile</label>
                                                            <input type="number" class="form-control" 
                                                                placeholder="Mobile Number" name = "mobile" id = "mobile" value ="<?php echo $user_data[0]->mobile_number ?>">
                                                        </div>
                                                  

                                                    </div>
                                                    <?php echo form_close(); ?>
                                                </div>
                                                    <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  id="btnSave" id="refresh-div" onclick="getClear();">Close</button>
                                                        <button type="submit" class="btn btn-theme"  id="btnSave" onclick="save1()">Save
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



        <div class="modal fade" id="modal_form2"  tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
        
                                                        <h3 class="modal-title">Add Form</h3>
                                                    </div>
                                                    <div class="modal-body form">

                                                        <?php
                                                        $attributes = array('class' => 'form-horizontal', 'id' => 'form-detail-edit', 'action' => '#');

                                                        echo form_open('Profile/ajax_new_address', $attributes);
                                                        ?>
                                                        <div class="form-body">
                                                        <input type="hidden" name="users_id" id ="users_id" value="<?php echo $value->ad_user_id ?>">
                                                        <input type="hidden" name="ad_id" id ="ad_id" value="">
                                                            <div class="row">
                                                                    <div class="col-sm-6">
                                                                                    <h6 class="mb-0">Address Line 1</h6>
                                                                                </div>
                                                                                <div class="col-sm-6 text-secondary">
                                                                                    <input type="text" class="form-control editable" name="line_1" value="" >
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                    
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Address Line 2</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="line_2" value="">
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Address Line 3</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="line_3" value="" >
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">State</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="state" value="" >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">District</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                        <input type="text" class="form-control editable" name="district" value="" >
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Post Office</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="post" value="" >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Pincode</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="number" class="form-control editable" name="pin" value="" >
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Primary Contact Number</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="number" class="form-control editable" name="contact_number_1" value=""  >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Secondary Contact Number</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="number" class="form-control editable" name="contact_number_2" value="" >
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <?php echo form_close(); ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  id="btnSave" id="refresh-div" onclick="getClear();">Close</button>
                                                        <button type="submit" class="btn btn-theme"  id="btnSave" onclick="save3()">Save
                                                            changes</button>
                                                    </div>
                                
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>  



                                                    <div class="modal fade" id="modal_form1"  tabindex="-1" aria-labelledby="exampleModalLabel1" aria-hidden="true">
                                            <div class="modal-dialog modal-lg">
                                                <div class="modal-content">
                                                    <div class="modal-header">
        
                                                        <h3 class="modal-title">Add Form</h3>
                                                    </div>
                                                    <div class="modal-body form">

                                                        <?php
                                                        $attributes = array('class' => 'form-horizontal', 'id' => 'form-detail-add', 'action' => '#');

                                                        echo form_open('', $attributes);
                                                        ?>
                                                        <div class="form-body">
                                                        <input type="hidden" name="users_id" id ="users_id" value="<?php echo $user_data[0]->user_id ?>">
                                                            <div class="row">
                                                                    <div class="col-sm-6">
                                                                                    <h6 class="mb-0">Address Line 1</h6>
                                                                                </div>
                                                                                <div class="col-sm-6 text-secondary">
                                                                                    <input type="text" class="form-control editable" name="line_1" value="" >
                                                                    </div>
                                                            </div>
                                                            <hr>
                                                            <div class="row">
                                                                    
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Address Line 2</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="line_2" value="" >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Address Line 3</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="line_3" value="">
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">State</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="state" >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">District</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                        <input type="text" class="form-control editable" name="district" >
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Post Office</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="text" class="form-control editable" name="post" >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Pincode</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="number" class="form-control editable" name="pin" >
                                                                        </div>
                                                                    </div>
                                                                    <hr>
                                                                    <div class="row">
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Primary Contact Number</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="number" class="form-control editable" name="contact_number_1"  >
                                                                        </div>
                                                                        <div class="col-sm-3">
                                                                            <h6 class="mb-0">Secondary Contact Number</h6>
                                                                        </div>
                                                                        <div class="col-sm-3 text-secondary">
                                                                            <input type="number" class="form-control editable" name="contact_number_2" >
                                                                        </div>
                                                                    </div>
                                                                    </div>
                                                                    <?php echo form_close(); ?>
                                                                </div>
                                                                <div class="modal-footer">
                                                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal"  id="btnSave" id="refresh-div" onclick="getClear();">Close</button>
                                                        <button type="submit" class="btn btn-theme"  id="btnSave" onclick="save2()">Save
                                                            changes</button>
                                                    </div>
                                
                                                            </div><!-- /.modal-content -->
                                                        </div><!-- /.modal-dialog -->
                                                    </div>  
        <script>     
            function myfunction()
                {
       
                $('#exampleModal1').modal({backdrop: 'static', keyboard: false});
                $('#exampleModal1').modal('show'); // show bootstrap modal
                $('.modal-title').text('Add Quote Detail'); // Set Title to Bootstrap modal title

      
    
            }
var save_method;

function edit_address_details(id)

{
    save_method = 'update';
    $('#form-detail-edit')[0].reset(); // reset form on modals
    $('.form-group').removeClass('has-error'); // clear error class
    $('.help-block').empty(); // clear error string
    var url;
    //Ajax Load data from ajax

    $.ajax({
        url: "<?php echo site_url('Profile/ajax_address_edit') ?>/" + id,
        type: "GET",
        dataType: "JSON",
        success: function (data)
        {
            $('[name="ad_id"]').val(data.ad_id);
            $('[name="ad_user_id"]').val(data.ad_user_id);
            $('[name="line_1"]').val(data.line_1);
            $('[name="line_2"]').val(data.line_2);
            $('[name="line_3"]').val(data.line_3);
            $('[name="district"]').val(data.district);
            $('[name="post"]').val(data.post);
            $('[name="state"]').val(data.state);
            $('[name="pin"]').val(data.pin);
            $('[name="contact_number_1"]').val(data.contact_number_1);
            $('[name="contact_number_2"]').val(data.contact_number_2);
           /* tinyMCE.get('notes').setContent(data.qud_notes);*/
            $('#modal_form2').modal({backdrop: 'static', keyboard: false});
            $('#modal_form2').modal('show'); // show bootstrap modal when complete loaded
            $('.modal-title').text('Edit Address Details'); // Set title to Bootstrap modal title

        },
        error: function (jqXHR, textStatus, errorThrown)
        {
            alert('Error get data from ajax');
        }
    });
}

function add_address_details()

{
  
    $('#modal_form1').modal({backdrop: 'static', keyboard: false});
    $("#form-detail-add").reset();
    $('#modal_form1').modal('show'); // show bootstrap modal when complete loaded
    $('.modal-title').text('Add Address Details'); // Set title to Bootstrap modal title
}

function getClear()
{
    $("#form-detail-add").trigger("reset");
}

function save3()
    {
        if (save_method == 'add') {
            var url = "<?php echo site_url('Profile/ajax_new_address') ?>";
        }
        else
        {
            var url = "<?php echo site_url('Profile/ajax_address_update') ?>";
        }
        // ajax adding data to database

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form-detail-edit').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                    alert("New address added successfully");
                    window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert('Error adding / update data');
                $('#btnSave1').text('save'); //change button text
                $('#btnSave1').attr('disabled', false); //set button enable 

            }
        });

    }

    function save2()
    {
        
            var url = "<?php echo site_url('Profile/ajax_new_address') ?>";
       
        // ajax adding data to database

        $.ajax({
            url: url,
            type: "POST",
            data: $('#form-detail-add').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                alert("New address added Successfully");
                    window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(errorThrown);
                alert('Error adding / update data');
                $('#btnSave1').text('save'); //change button text
                $('#btnSave1').attr('disabled', false); //set button enable 

            }
        });

    }

    function save1()
    {
        
         var url = "<?php echo site_url('Profile/update_profile') ?>";   
        $.ajax({
            url: url,
            type: "POST",
            data: $('#form-detail-user').serialize(),
            dataType: "JSON",
            success: function (data)
            {
                    alert("Profile Updated Successfully");
                    window.location.reload();
            },
            error: function (jqXHR, textStatus, errorThrown)
            {
                alert(errorThrown);
                alert('Error adding / update data');
            }
        });

    }



            
        </script>


