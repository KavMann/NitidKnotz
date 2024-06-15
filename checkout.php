<?php 
include 'session.php';
if(isset($_POST['Submit'])){		
	
	
	$name=$_POST['name'];
	$email=$_POST['email'];
	$phone=$_POST['mobileno'];
	$username=$_POST['username'];
	$password=$_POST['password'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$postalcode=$_POST['postalcode'];
	
	
  $query = mysqli_query($conn,"update users set name='$name',email='$email',mobileno='$phone',username='$username',password='$password',country='$country',state='$state',city='$city',address='$address',postalcode='$postalcode' where username='".$_SESSION['user']."'"); 
}
$sql = "SELECT * from users where username='".$_SESSION['user']."'";
$result = mysqli_query($conn,$sql);
$row = mysqli_fetch_assoc($result);	
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
                                <h1 class="breadcrumb-hrading">Checkout</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Checkout</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- checkout area start -->
            <div class="checkout-area mt-60px mb-40px">
                <div class="container">
                    <div class="row" style="background: #35565840; color:252525">
                        <div class="col-lg-7">
                            <div class="billing-info-wrap">
                                <h3>Billing Details</h3>
								  
                                <div class="row">
                                    <div class="col-lg-12 col-md-12">
                                        <div class="billing-info mb-20px">
                                            <label>Name</label>
                                            <input type="text" name="name"  value="<?php echo $row['name'];?>" required>
                                        </div>
                                    </div>             
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Country</label>
                                            <input type="text" name="country" value="<?php echo $row['country'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Address</label> 
                                            <input class="billing-address" name="address" value="<?php echo $row['address'];?>"  type="text" required>
                                            
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <div class="billing-info mb-20px">
                                            <label>Town / City</label>
                                            <input type="text" name="city" value="<?php echo $row['city'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>State</label>
                                            <input type="text" name="state" value="<?php echo $row['state'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>Postcode / ZIP</label>
                                            <input type="text" name="postalcode" value="<?php echo $row['postalcode'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>Phone</label>
                                            <input type="text" name="mobileno" value="<?php echo $row['mobileno'];?>" required>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-6">
                                        <div class="billing-info mb-20px">
                                            <label>Email Address</label>
                                            <input type="text" name="email"  value="<?php echo $row['email'];?>"required>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-5">
                            <div class="your-order-area">
                                <h3>Your order</h3>
								
                                <div class="your-order-wrap gray-bg-4">
                                    <div class="your-order-product-info">
                                        <div class="your-order-top">
                                            <ul>
                                                <li>Product</li>
                                                <li>Total</li>
                                            </ul>
                                        </div>
										<?php
										if(!empty($_SESSION["shopping_cart"]))
										{
											$total = 0;
											$count = count($_SESSION["shopping_cart"]);											
											foreach($_SESSION["shopping_cart"] as $keys => $values)
											{
										?>
                                        <div class="your-order-middle">
                                            <ul>
                                                <li><span class="order-middle-left"><?php echo $values["item_name"]; ?> X <?php echo $values["item_quantity"]; ?></span> <span class="order-price">₹<?php echo number_format($values["item_quantity"] * $values["item_price"], 2);?> </span></li>
                                                
                                            </ul>
                                        </div>
										<?php
										$total = $total + ($values["item_quantity"] * $values["item_price"]);
										}
										?>
                                        <div class="your-order-bottom">
                                            <ul>
                                                <li class="your-order-shipping">Shipping</li>
                                                <li>Free shipping</li>
                                            </ul>
                                        </div>
                                        <div class="your-order-total">
                                            <ul>
                                                <li class="order-total">Total</li>
                                                <li>₹<?php echo number_format($total, 2); ?></li>
                                            </ul>
                                        </div>
										
                                    </div>
                                    <div class="payment-method">
                                        <div class="payment-accordion element-mrg">
                                            <div class="panel-group" id="accordion">
                                                
                                               
                                                <div class="panel payment-accordion">
                                                    <div class="panel-heading" id="method-three">
                                                        <h4 class="panel-title">
                                                            <a class="collapsed" data-toggle="collapse" data-parent="#accordion" href="#method3">
                                                                UPI Payment(Paytm/GPay)
                                                                <img src="images/PaytmQr.jpg" style="width: 400px; position: relative; margin-left: 10%;" />
                                                            </a>
                                                        </h4>
                                                    </div>
                                                   
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="Place-order mt-25">
                                    <a class="btn-hover" href="ordercomplete.php">Place Order</a>
                                </div>
								<?php }	?> 
                            </div>
                        </div>
						              
                    </div>
                </div>
            </div>
            <!-- checkout area end -->
            <!-- Footer Area start -->
             <?php include('include/footer.php'); ?>
            <!--  Footer Area End -->
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
