<footer class="main-footer">
        <div class="footer-left">
          <a href="#">AR Designs</a></a>
        </div>
        <div class="footer-right">
        </div>
      </footer>
    </div>
  </div>
  <script src="<?php echo base_url("assets/js/app.min.js"); ?>"></script>
  <?php 
    $controller = $this->router->fetch_class();
    print_r($controller);
    // echo(str_replace(' ', '', $controller));
    // echo('<br>');
    $toazt_controllers = ['login', 'addproduct', 'upload_image', 'adduser'];
    $data_table_controller = ['userlist', 'categorylist', 'productlist', 'vendorlist', 'orderlist'];
    if(in_array($controller, $toazt_controllers)){ 
      echo('<script src="'.base_url("assets/bundles/izitoast/js/iziToast.min.js").'"></script>');
      echo('<script src="'.base_url("assets/js/add_product.js").'"></script>');
   }
   elseif($controller == 'editproduct'){ 
    echo('<script src="'.base_url("assets/js/edit_product.js").'"></script>');
   }
   elseif($controller == 'order'){
    echo('<script src="'.base_url("assets/js/order.js").'"></script>');
   }
   elseif($controller == 'dashboard'){
     echo('<script src="'.base_url("assets/js/apexcharts.min.js").'"></script>'); 
     echo('<script src="'.base_url("assets/js/index.js").'"></script>'); 
   }
   elseif(in_array($controller, $data_table_controller)){
    //echo($controller);
    echo('<script src="'.base_url("assets/bundles/datatables/datatables.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/jquery-ui/jquery-ui.min.js").'"></script>');
    echo('<script src="'.base_url("assets/js/page/datatables.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/sweetalert/sweetalert.min.js").'"></script>');
    echo('<script src="'.base_url("assets/js/page/sweetalert.js").'"></script>');
    echo('<script src="'.base_url("assets/bundles/dropzonejs/min/dropzone.min.js").'"></script>');
  }
  elseif($controller == 'report'){
    echo('<script src="'.base_url("assets/bundles/datatables/datatables.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/js/page/datatables.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/export-tables/dataTables.buttons.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/export-tables/buttons.flash.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/export-tables/jszip.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/export-tables/pdfmake.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/export-tables/vfs_fonts.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/export-tables/buttons.print.min.js").'"></script>'); 
  }
  ?>
  <!-- JS Libraies -->
  <!-- Page Specific JS File -->
  <!-- Template JS File -->
  <script src="<?php echo base_url("assets/js/scripts.js"); ?>"></script>
  <!-- Custom JS File -->
  <script src="<?php echo base_url("assets/js/custom.js"); ?>"></script>
  <script>
  $( document ).ready(function() {
    if($('#outputCategory').val() == "success"){
      iziToast.success({
        title: 'Success!',
        message: 'Category Added Succesfully',
        position: 'topCenter'
      });
    }
    else if($('#outputCategory').val() == "product success"){
      iziToast.success({
        title: 'Success!',
        message: 'Product Added Succesfully',
        position: 'topCenter'
      });
    }
    else if($('#outputCategory').val() == "error"){
      iziToast.error({
        title: 'Error!',
        message: 'Please Select Valid Inputs',
        position: 'topCenter'
      });
    }
    else if($('#outputCategory').val() == "email_exist"){
      iziToast.error({
        title: 'Error!',
        message: 'Email id already exist',
        position: 'topCenter'
      });
    }
    else if($('#outputCategory').val() == "user_success"){
      iziToast.success({
        title: 'Success!',
        message: 'User Added Succesfully',
        position: 'topCenter'
      });
    }
    });
  </script>
</body>


<!-- invoice.html  21 Nov 2019 04:05:05 GMT -->
</html>