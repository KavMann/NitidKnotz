<?php 
include('connect.php');
	
	session_start();
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
                                <h1 class="breadcrumb-hrading">Cart</h1>
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
            <div class="cart-main-area mtb-60px">
                <div class="container">
                    <h3 class="cart-page-title">Payment</h3>
                    <div class="row">
                        <div class="col-lg-12 col-md-12 col-sm-12 col-12">
 <?php                           						
	$name='';
	$product='';
	$Quantity='';
	$perunitprice='';
	$total = 0;
	if(!empty($_SESSION["shopping_cart"]))
	{
	$count = count($_SESSION["shopping_cart"]);
	
	if(isset($_POST['Submit'])){
	foreach($_SESSION["shopping_cart"] as $keys => $values)
	{                     
	$name=$_SESSION['user'];
	$product=$values['item_name'];
	$Quantity=$values['item_quantity'];
	$perunitprice=$values['item_price'];
	$total = ($values["item_quantity"] * $values["item_price"]);
	$date = date('d/m/Y');
	
	$save="INSERT INTO `orders`(`username`, `product`, `Quantity`, `perunitprice`, `subtotal`, `date`) VALUES ('".$name."','".$product."','".$Quantity."','".$perunitprice."','".$total."','".$date."')";
	
	
	if(mysqli_query($conn,$save)){
		
		echo '<script>window.location.href="order.php";</script>';
		}else{					
		
		echo '<div class="alert alert-danger">Data Not submit' . mysqli_error($conn). '</div>';
		}
	}
	}
	?>
					 <?php
					 foreach($_SESSION["shopping_cart"] as $keys => $values)
	{
										    $total = $total + ($values["item_quantity"] * $values["item_price"]);
											}
											?>
												
<form method="POST" role="form" action=""  enctype="multipart/form-data">
                            <div class="row">
                              
                               <?php 
								$sql1 = "SELECT * from users where username='".$_SESSION['user']."'";
								$result1 = mysqli_query($conn,$sql1);
								$rowc1 = mysqli_fetch_assoc($result1);	
								?>
								
                                <div class="col-lg-4 col-md-12">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Cart Total</h4>
                                        </div>
                                         <h5>Name<span style="font-family: arial;font-size: 14px;"><?php echo $rowc1['name']; ?></span></h5>
                                         <h5>Address<span style="padding-bottom: 20px;font-family: arial;font-size: 14px;"><?php echo $rowc1['address']; ?>,<?php echo $rowc1['city']; ?>,<?php echo $rowc1['postalcode']; ?></span></h5>
                                      
                                        <h4 class="grand-totall-title">Grand Total <span>Rs.<?php echo number_format($total, 2); ?></span></h4>
										
                                       
										 
                                    </div>
                                </div>
								<?php
								$sql1 = "SELECT * from bankdetail where id='1'";
								$result1 = mysqli_query($conn,$sql1);
								$rowc1 = mysqli_fetch_assoc($result1);	
								?>
								
								<div class="col-lg-8 col-md-12">
                                    <div class="grand-totall">
                                        <div class="title-wrap">
                                            <h4 class="cart-bottom-title section-bg-gary-cart">Payment Details</h4><br>
                                                <img src="images/PaytmQr.jpg" style="width: 400px; position: relative; margin-left: 26%;" />
                                        </div>
                                         <?php echo  $rowc1 ['summary']; ?>
										<input type="submit" name="Submit" value="Place Order" class="btn btn-primary btn-user btn-block"/>
                                       
										 
                                    </div>
                                </div>
                            </div>
							 </form>
                        </div>
                    </div>
                </div>
            </div>
			<?php }	?> 
            <!-- cart area end -->
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
