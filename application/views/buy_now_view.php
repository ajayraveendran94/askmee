<div class="container-fluid">
        <div class="col-sm-12 col-md-12 col-lg-12 content-area  ">
            <nav aria-label="breadcrumb">
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="<?php echo base_url(''); ?>">Home</a></li>
                    <li class="breadcrumb-item active" aria-current="page">quick order</li>
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
                        <div class="ibox">
                            <div class="ibox-title">
                                <span class="pull-right">(<strong><?php echo count($cart_data); ?></strong>) items</span>
                                <h5>Quick Order </h5>
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
                                                <td width="90">
                                                    <div class="cart-product-imitation">
                                                    </div>
                                                </td>
                                                <input type="hidden" id="productId" value="<?php echo $cart['p_id']; ?>">
                                                <td class="desc">
                                                    <h4>
                                                        <a href="<?php echo base_url('product/view/'.$cart['p_id']); ?>" class="text-navy">
                                          <?php echo $cart['product_name']; ?>
                                      </a>
                                                    </h4>
                                                    <p class="small">
                                                        <?php echo $cart['description']; ?>
                                                    </p>
                                                    <dl class="small m-b-none">
                                                        <dt>Seller</dt>
                                                        <dd><?php echo $cart['name']; ?></dd>
                                                    </dl>

                                                    <div class="m-t-sm">
                                                        <a href="#" class="btn btn-success btn-sm"><i class="fa fa-gift"></i> Add gift package</a> |
                                                        
                                                    </div>
                                                </td>

                                                <td>
                                                    ₹ <?php echo $cart['offer_price']; ?>
                                                    <s class="small text-muted">₹ <?php echo $cart['actual_price']; ?></s>
                                                </td>
                                                <input type="hidden" id="actualPrice" value="<?php echo $cart['offer_price']; ?>">
                                                <td width="90">
                                                    <input id="quantity" type="number" min=1 id="<?php echo $cart['p_id']; ?>" class="buyQuantity form-control" value="1">
                                                </td>
                                                <td>
                                                    <h4>
                                                        ₹ <?php 
                                                        $amount = $cart['offer_price'];
                                                        $total_amount = $total_amount + $amount;
                                                        echo($amount) ; ?>
                                                    </h4>
                                                </td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>

                            </div>
                        <?php } ?>
                            <div class="ibox-content">
                                <button id="checkout_1" class="btn btn-primary pull-right"><i class="fa fa fa-shopping-cart"></i> Checkout</button>
                                <a href="<?php echo base_url(''); ?>"> <i class="fa fa-arrow-left"></i> Continue shopping</a>

                            </div>
                        </div>

                    </div>
                    <div class="col-md-3">
                        <div class="ibox">
                            <div class="ibox-title">
                                <h5>Cart Summary</h5>
                            </div>
                            <div class="ibox-content">
                                <span>
                          Total
                      </span>
                                <h2 id="totalAmount" class="font-bold">
                                    ₹ <?php echo $total_amount; ?>
                                </h2>

                                <hr>
                                <span class="text-muted small">
                          *GST included
                      </span>
                                <div class="m-t-sm">
                                    <div class="btn-group">
                                        <button id="checkout_2" class="btn btn-primary btn-sm"><i class="fa fa-shopping-cart"></i> Checkout</button>
                                        <a href="<?php echo base_url(''); ?>" dataTarget="<?php echo $_SESSION['user']['user_id'];?>" class="btn btn-white btn-sm"> Back</a>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>










    </div>