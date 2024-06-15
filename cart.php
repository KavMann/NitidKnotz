<?php 
include('connect.php');
	session_start();
	if(isset($_GET["action"]))
{
	if($_GET["action"] == "delete")
	{
		foreach($_SESSION["shopping_cart"] as $keys => $values)
		{
			if($values["item_id"] == $_GET["id"])
			{
				unset($_SESSION["shopping_cart"][$keys]);
				echo '<script>window.location="cart.php"</script>';
			}
		}
	}
}
	?>
<!DOCTYPE html>
<html lang="en">
    <head>
       <?php include('include/head.php') ?>
    </head>
    <body>
        <!-- main layout start from here -->
        <!--====== PRELOADER PART START ======-->
        <!-- <div id="preloader">
                <div class="preloader">
                    <span></span>
                    <span></span>
                </div>
            </div> -->
        <!--====== PRELOADER PART ENDS ======-->
        <div id="main">

            <!-- Header Start -->
           <?php include('include/header.php'); ?>
            <!-- Header End -->

            <!-- Breadcrumb Area start -->
            <section class="breadcrumb-area">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="breadcrumb-content">
                                <h1 class="breadcrumb-hrading">Cart Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Cart</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->

            <!-- cart area start -->
            <section>
                <div class="cart-main-area mtb-60px">
                    <div class="container">
                        <h3 class="cart-page-title">Your cart items</h3>
                        <div class="row">
                            <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                                <form action="">
                                    <div class="table-content table-responsive cart-table-content">
                                        <table>
                                            <thead>
                                                <tr>
                                                    <!--<th>Image</th>-->
                                                    <th>Product Name</th>
                                                    <th>Unit Price</th>
                                                    <th>Qty</th>
                                                    <th>Subtotal</th>
                                                    <th>Remove</th>
                                                </tr>
                                            </thead>
                                            <tbody style="background-color: #ffffff85;">
                                            <?php
                                                if(!empty($_SESSION["shopping_cart"]))
                                                {
                                                    $total = 0;
                                                    $count = count($_SESSION["shopping_cart"]);
                                                    
                                                    foreach($_SESSION["shopping_cart"] as $keys => $values)
                                                    {
                                                ?>
                                                <tr>
                                                <!-- <td class="product-thumbnail">
                                                        <a href="#"><img src="<?php echo $values["image"]; ?>" alt="" /></a>
                                                    </td>-->
                                                    <td class="product-name"><a href="#"><?php echo $values["item_name"]; ?></a></td>
                                                    <td class="product-price-cart"><span class="amount">₹<?php echo $values["item_price"]; ?></span></td>
                                                    <td class="product-price-cart"><span class="amount"><?php echo $values["item_quantity"]; ?></span></td>
                                                    <td class="product-subtotal">₹<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?></td>
                                                    <td class="product-remove">
                                                    <!-- <a href="#"><i class="fa fa-pencil-alt"></i></a>-->
                                                        <a href="cart.php?action=delete&id=<?php echo $values["item_id"]; ?>"><i class="fa fa-trash" style="color: #c61e1e; font-size:20px"></i></a>
                                                    </td>
                                                </tr>
                                                <?php $total = $total + ($values["item_quantity"] * $values["item_price"]);
                                                }?>
                                            </tbody>
                                        </table>
                                    </div>
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <div class="cart-shiping-update-wrapper">
                                                <div class="cart-shiping-update">
                                                    <a href="shop.php">Continue Shopping</a>
                                                </div>
                                            
                                            </div>
                                        </div>
                                    </div>
                            
                                    <div class="row">
                                        <div class="col-lg-4 col-md-12">
                                            <div class="grand-totall">
                                                <div class="title-wrap">
                                                    <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                                </div>
                                                <!--<h5>Total products <span><?php echo number_format($total, 2); ?></span></h5>
                                            <div class="total-shipping">
                                                    <h5>Total shipping</h5>
                                                    <ul>
                                                        <li><input type="checkbox" /> Standard <span>$20.00</span></li>
                                                        <li><input type="checkbox" /> Express <span>$30.00</span></li>
                                                    </ul>
                                                </div>-->
                                                <h4 class="grand-totall-title">Grand Total <span>₹<?php echo number_format($total, 2); ?></span></h4>
                                                <a href="checkout.php">Proceed to Checkout</a>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <?php }	?> 
            </section>
            <section>
            <!-- cart area end -->
            <!-- Footer Area start -->
             <?php include('include/footer.php'); ?>
            <!--  Footer Area End -->
            </section>
        </div>
        <!-- Scripts to be loaded  -->
        <!-- JS
============================================ -->
        <!--====== Vendors js ======-->
        <script src="assets/js/vendor/jquery-3.5.1.min.js"></script>
        <script src="assets/js/vendor/modernizr-3.7.1.min.js"></script>
        <!--====== Plugins js ======-->
       <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/popper.min.js"></script>
        <script src="assets/js/plugins/meanmenu.js"></script>
        <script src="assets/js/plugins/owl-carousel.js"></script>
        <script src="assets/js/plugins/jquery.nice-select.js"></script>
        <script src="assets/js/plugins/countdown.js"></script>
        <script src="assets/js/plugins/elevateZoom.js"></script>
       <!-- <script src="assets/js/plugins/jquery-ui.min.js"></script>-->
        <script src="assets/js/plugins/slick.js"></script>
        <script src="assets/js/plugins/scrollup.js"></script>
        <script src="assets/js/plugins/range-script.js"></script>
        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="assets/js/plugins.min.js"></script>
        <!-- Main Activation JS -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
