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
    echo(str_replace(' ', '', $controller));
    if($controller == 'addproduct' || $controller == 'upload_image'){ 
      echo('<script src="'.base_url("assets/bundles/izitoast/js/iziToast.min.js").'"></script>');
   }
   elseif($controller == 'dashboard'){
     echo('<script src="'.base_url("assets/js/apexcharts.min.js").'"></script>'); 
     echo('<script src="'.base_url("assets/js/index.js").'"></script>'); 
   }
   elseif($controller == 'productlist'){
    echo('<script src="'.base_url("assets/bundles/datatables/datatables.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/datatables/DataTables-1.10.16/js/dataTables.bootstrap4.min.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/jquery-ui/jquery-ui.min.js").'"></script>');
    echo('<script src="'.base_url("assets/js/page/datatables.js").'"></script>'); 
    echo('<script src="'.base_url("assets/bundles/sweetalert/sweetalert.min.js").'"></script>');
    echo('<script src="'.base_url("assets/js/page/sweetalert.js").'"></script>');
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
      debugger;
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
    });
  </script>
</body>


<!-- invoice.html  21 Nov 2019 04:05:05 GMT -->
</html>