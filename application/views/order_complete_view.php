<div class="container-fluid">
   <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
      <nav aria-label="breadcrumb">
         <ol class="breadcrumb">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active" aria-current="page">Order Completed</li>
         </ol>
      </nav>
      <hr>
   </div>
</div>
   <!------------>
    <div class="container-fluid">
        <div class="row align-items-center">
            <div class="col-sm-12">
                <div class="card align-items-center" style="margin-top: 0px;">
                    <div class="circle-loader">
                    <div class="checkmark draw"></div>
                    </div>
                    <div id="orderPlaced" style="text-align: center"></div>
                    <button id="toggle" type="button" class="btn btn-success" hidden>Toggle Completed</button>
                    <a id="backHome" href="<?php echo base_url(''); ?>" type="button" class="btn btn-success checkmark"> Back To Home </a>
                </div>
            </div>
        </div>
        <!------------------------------------------->
    </div>