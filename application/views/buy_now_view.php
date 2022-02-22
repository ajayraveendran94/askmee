<div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">Quick order</li>
                </ol>
            </nav>
            <hr>
        </div>
        <!------------>
        <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.3.0/css/font-awesome.min.css" rel="stylesheet">
        <div class="content-area" style="padding-top: 0;">
            <div class="wrapper wrapper-content animated fadeInRight">
                <div class="row">
                    <div class="col-md-9">
                        <div class="card mb-2">
                            <div class="ibox">
                                <div class="ibox-title" style="margin-bottom: 20px;">
                                    <span class="pull-right">(<strong><?php echo count($cart_data); ?></strong>) items</span>
                                    <h5>Quick Order</h5>
                                </div>
                                <input type="hidden" id="userId" value='<?php echo $_SESSION['user']['user_id'];?>'>
                                <?php 
                            $total_amount = 0;
                            foreach($cart_data as $cart) {?>
                                <div class="ibox-content">
                                    <div class="table-responsive">
                                        <table class="table shoping-cart-table">
                                            <tbody>
                                                <tr>
                                                    <td width="20%">
                                                        <div class="col">
                                                            <a href="#"><img src="<?php echo base_url('/assets/images/newproducts/'.$cart['p_id'].'/'.$cart['product_images'][0]['image_url']); ?>"
                                                                    style="width: 100px;" alt="cart"></a>
                                                        </div>
                                                    </td>
                                                    <td class="desc" width="70%">
                                                        <h5>
                                                            <a href="<?php echo base_url('product/view/'.$cart['p_id']); ?>" class="text-black">
                                                                <?php echo $cart['product_name']; ?>
                                                            </a>
                                                        </h5>
                                                        <input type="hidden" id="productId" value="<?php echo $cart['p_id']; ?>">
                                                        <div class="m-t-sm">
                                                            <p class="mb-1 cart-prize"><s
                                                                    class="small text-muted">₹<?php echo $cart['actual_price']; ?></s>
                                                                &#x20B9;<b><?php echo $cart['offer_price']; ?></b></p>
                                                            <input type="hidden" id="actualPrice" value="<?php echo $cart['offer_price']; ?>" class="prizetemp">
                                                        </div>
                                                    </td>
                                                    <td width="10%">
                                                        <input type="number" min="1" 
                                                             id="quantity" class="buyQuantity form-control mb-0 count" value="1">
                                                        <button  class="btn btn-danger btn-sm mt-3 removeOrder"
                                                            style="min-width: 90px;"><i
                                                                class="fa fa-trash"></i> Clear</button>
                                                    </td>
                                                </tr>

                                            </tbody>
                                        </table>
                                    </div>
                                </div>
                                <?php 
                                                        $amount = $cart['offer_price'];
                                                        $total_amount = $total_amount + $amount;
                                                     
                                                     } ?>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="card">
                            <div class="ibox">
                                <div class="ibox-title">
                                    <h5>Order Summary</h5>
                                </div>
                                <div class="ibox-content">
                                    <span>
                                        Total
                                    </span>
                                    <h4 class="font-bold" id="totalAmount">
                                        ₹<?php  echo $total_amount; ?>
                                    </h4>

                                    <hr>
                                    <!-- <span class="text-muted small">
                                    *For United States, France and Germany applicable sales tax will be applied
                                </span> -->
                                    <div class="m-t-sm">
                                        <div class="btn-group">
                                            
                                                
                                                <button id="checkout_1" class="btn btn-theme btn-md"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                                                &nbsp;&nbsp;
                                            <a href="<?php echo base_url(''); ?>" class="btn btn-danger btn-md"> Cancel</a>
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