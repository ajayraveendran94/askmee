<div class="container-fluid pb-0 mb-0 justify-content-center text-light  foote">
      <footer>
        <div class="row my-5 justify-content-center py-5">
          <div class="col-11">
            <div class="row ">
              <div class="col-xl-8 col-md-4 col-sm-4 col-12 my-auto mx-auto a">
                <h3 class="text-muted mb-md-0 mb-5 bold-text">Askmee.</h3>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                <h6 class="mb-3 mb-lg-4 bold-text "><b>MENU</b></h6>
                <ul class="list-unstyled">
                  <li>Home</li>
                  <li>About</li>
                  <li>Blog</li>
                  <li>Portfolio</li>
                </ul>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-4 col-12">
                <h6 class="mb-3 mb-lg-4 text-muted bold-text mt-sm-0 mt-5"><b>ADDRESS</b></h6>
                <p class="mb-1">605, RATAN ICON BUILDING</p>
                <p>SEAWOODS SECTOR</p>
              </div>
            </div>
            <div class="row ">
              <div class="col-xl-8 col-md-4 col-sm-4 col-auto my-md-0 mt-5 order-sm-1 order-3 align-self-end">
                <p class="social text-muted mb-0 pb-0 bold-text"> <span class="mx-2"><i class="fa fa-facebook"
                      aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-linkedin-square"
                      aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-twitter"
                      aria-hidden="true"></i></span> <span class="mx-2"><i class="fa fa-instagram"
                      aria-hidden="true"></i></span> </p><small class="rights"><span>&#174;</span> Askmee All Rights
                  Reserved.</small>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-1 align-self-end ">
                <h6 class="mt-55 mt-2 text-muted bold-text"><b>ANIRUDH SINGLA</b></h6><small> <span><i
                      class="fa fa-envelope" aria-hidden="true"></i></span> ajayreavennder@gmail.com</small>
              </div>
              <div class="col-xl-2 col-md-4 col-sm-4 col-auto order-2 align-self-end mt-3 ">
                <h6 class="text-muted bold-text"><b>RISHABH SHEKHAR</b></h6><small><span><i class="fa fa-envelope"
                      aria-hidden="true"></i></span> akhilbabu868@gmail.com</small>
              </div>
            </div>
          </div>
        </div>
      </footer>
    </div>

    <!--------------Footer-->



  </div>
  </div>
  </div>







  
 <script src='<?php echo base_url("assets/assets/js/jquery-3.6.0.min.js");?>'></script>
<script src='<?php echo base_url("assets/assets/js/bootstrap.bundle.js");?>'></script>
  <script src='<?php echo base_url("assets/assets/js/popper.min.js");?>'></script>
<script src='<?php echo base_url("assets/assets/js/bootstrap.min.js");?>'></script>
  <script src='<?php echo base_url("assets/assets/js/searchbar.js");?>'></script>
  <script>


$("#edit").click( function()
   {
     $(".editable").css("border", "1px solid black");
     $(".editable").css("border", "1px solid black");
     $(".editable").css("border", "1px solid black");

   }
);
</script>



<script>
function filterFunction() {
      $.ajax({
         type: "GET",
         dataType:"html",
         url:"welcome/getdata/" + $("#search-box").val(),
         success:function(result){
        //  $("#suggesstion-box").html(result);
      }});
  
}

function validate()
{
var mobile_num = document.getElementById("mobile_num").value;
var pass = document.getElementById("password").value;
var pass_confirm = document.getElementById("confirm_password").value;
var message = document.getElementById('errMsg');
var checkBox = document.getElementById("flexCheckChecked");
var goodColor = "#66cc66";
var badColor = "#ff6666";
if(pass.length < 6){
  alert("minimum 6 character required for password")
        return false;
 }
if(pass!=pass_confirm) 
{
   alert("Passwords do not match");
   return false;
}
if(mobile_num.length != 10)
{
  alert("Please enter the correct mobile number");
  return false;
  }
if(checkBox.checked != true)
{
  alert("Please accept terms and Condition");
  return false;
  }
}
</script>
  <?php 
$controller = $this->router->fetch_class();
    if($controller == 'product'){ ?>
  <script src='<?php echo base_url("assets/assets/js/thumbnail.js");?>'></script>
<?php } ?>
  <?php if($controller == 'order'){ ?>
  <script src='<?php echo base_url("assets/assets/js/checkout.js");?>'></script>
  <script src='<?php echo base_url("assets/assets/js/plusminus.js");?>'></script>
<?php } ?>
  <script src='<?php echo base_url("assets/assets/js/sweetalert.min.js");?>'></script>
  <?php 
  if (in_array($controller, ['cart', 'product'])){
  echo('<script src="'.base_url("assets/js/cart.js").'"></script>'); 
  }
  if($controller == 'product'){
  echo('<script src="'.base_url("assets/js/rateing.js").'"></script>');
  }
?>
</body>
<style>
.editable
{
  border:none;
}
.editable:hover
{
  pointer-events: none;

}
.editable:focus {
        outline: none;
        box-shadow: none;
}
#errMsg
{
  color:red;
}
</style>
</html>