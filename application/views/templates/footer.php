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







  
  <script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.bundle.min.js" integrity="sha384-JEW9xMcG8R+pH31jmWH6WWP0WintQrMb4s7ZOdauHnUtxwoG2vI5DkLtS3qm9Ekf" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js" integrity="sha384-SR1sx49pcuLnqZUnnPwx6FCym0wLsk5JZuNx2bPPENzswTNFaQU1RDvt3wT4gWFG" crossorigin="anonymous"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0-beta3/dist/js/bootstrap.min.js" integrity="sha384-j0CNLUeiqtyaRmlzUHCPZ+Gy5fQu0dQ6eZ/xAww941Ai1SxSY+0EQqNXNE6DZiVc" crossorigin="anonymous"></script>
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

function validate(){
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
else if (pass!=pass_confirm) {
   alert("Passwords do not match");
   return false;
}
else if (checkBox.checked != true){
  alert("Please click the checkbox to register");
  return false;
  }

}
</script>
  <script src='<?php echo base_url("assets/assets/js/thumbnail.js");?>'></script>

  <?php echo('<script src="'.base_url("assets/js/cart.js").'"></script>'); ?>

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