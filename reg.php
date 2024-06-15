<?php
   include("connect.php");
   $error='';
   $username='';
	$password='';
	$email='';
	$name='';
	$mobileno='';
	$country='';
	$state='';
	$city='';
	$address='';
	$postalcode='';
	if(isset($_POST['Submit'])){
	$username=$_POST['username'];
	$password=$_POST['password'];
	$email=$_POST['email'];
	$name=$_POST['name'];
	$mobileno=$_POST['mobileno'];
	$country=$_POST['country'];
	$state=$_POST['state'];
	$city=$_POST['city'];
	$address=$_POST['address'];
	$postalcode=$_POST['postalcode'];
	$save=mysqli_query($conn,"INSERT into users(username,password,email,name,mobileno,country,state,city,address,postalcode)VALUE('".$username."','".$password."','".$email."','".$name."','".$mobileno."','".$country."','".$state."','".$city."','".$address."','".$postalcode."')");
	
	
	$error = '<div class="alert alert-success" role="alert">
 Register Success Login Now
</div>';
echo '<script>window.location.href="login.php";</script>';
	
	 
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
                                <h1 class="breadcrumb-hrading">Login / Register Page</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Login / Register</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- login area start -->
			
            <div class="login-register-area mb-60px mt-53px">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-7 col-md-12 ml-auto mr-auto">
                            <div class="login-register-wrapper">
                                <div class="login-register-tab-list nav">
                                   <a   href="login.php">
                                        <h4>login</h4>
                                    </a>
                                    <a class="active"  data-toggle="tab" href="#lg2">
                                        <h4>register</h4>
                                    </a>
                                </div>
                                <div class="tab-content" style="background-color: #9bded4ab;">
                                    <div id="lg2" class="tab-pane active ">
                                        <div class="login-form-container">
                                            <div class="login-register-form">
											<?php echo $error; ?>
                                               <form class="user"id="form1" name="form1" method="post" action="">
                                                    <input type="text" name="username" placeholder="Username" />
                                                    <input type="text" name="password" placeholder="Password" />
                                                    <input type="email" name="email" placeholder="Enter email" />
                                                    <input type="text" name="name" placeholder="Full Name" />
                                                    <input type="text" name="mobileno" placeholder="Mobile Number" />
                                                    <input type="text" name="country" placeholder="Country" />
                                                    <input type="text" name="state" placeholder="State" />
                                                    <input type="text" name="city" placeholder="City" />
                                                    <input type="text" name="address" placeholder="Address" />
                                                    <input type="text" name="postalcode" placeholder="Postal code" />
                                                    <div class="button-box">
                                                        <!--<div class="login-toggle-btn">
                                                            <input type="checkbox" />
                                                            <a class="flote-none" href="javascript:void(0)">Remember me</a>
                                                            <a href="#">Forgot Password?</a>
                                                        </div>-->
                                                        <input style="background-color: #4fb68d;color:white;" type="submit" name="Submit" value="Submit" class="btn btn-primary btn-user btn-block"/>
                                                    </div>
                                                </form>
												
                                            </div>
                                        </div>
                                    </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- login area end -->
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
