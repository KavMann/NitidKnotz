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

  

  echo '<script>window.location.href="cart.php";</script>';



}

$sql = "SELECT * from users where username='".$_SESSION['user']."'";

$result = mysqli_query($conn,$sql);

$row = mysqli_fetch_assoc($result);	

?>



<!DOCTYPE html>

<html lang="en">

    <head>

       <?php include('include/head.php') ?>

	   <style> 

	           .single-my-account .myaccount-info-wrapper .billing-info label {

    color: #000;

    font-size: 14px;

    text-transform: capitalize;

    font-weight: bold;

}

	   </style>

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

                                <h1 class="breadcrumb-hrading">Account Page</h1>

                                <ul class="breadcrumb-links">

                                    <li><a href="index.php">Home</a></li>

                                    <li>My Account</li>

                                </ul>

                            </div>

                        </div>

                    </div>

                </div>

            </section>

            <!-- Breadcrumb Area End -->

            <!-- account area start -->

            <div class="checkout-area mtb-60px">

                <div class="container">

                    <div class="row">

                        <div class="ml-auto mr-auto col-lg-9">

                            <div class="checkout-wrapper">

                                <div id="faq" class="panel-group">

                                    <div class="panel panel-default single-my-account">

                                        <div class="panel-heading my-account-title">

                                            <h3 class="panel-title"> <a data-toggle="collapse" data-parent="#faq" href="#my-account-1">Edit your account information </a></h3>

                                        </div>

                                        <div id="my-account-1" class="panel-collapse collapse show">

                                            <div class="panel-body">

                                                <div class="myaccount-info-wrapper">

                                                    <div class="account-info-wrapper">

                                                        <h4>My Account Information</h4>

                                                        <h5>Your Personal Details</h5>

                                                    </div>

													

                                                 

													 <form method="post" enctype="multipart/form-data">

													    <div class="row">

                                                       

                                                        <div class="col-lg-12 col-md-12">

                                                            <div class="billing-info">

                                                                <label>Name</label>

                                                                <input type="text" value="<?php echo $row['name'];?>" name="name" />

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-12 col-md-12">

                                                            <div class="billing-info">

                                                                <label>Email Address</label>

                                                                <input type="email" value="<?php echo $row['email'];?>" name="email"/>

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>Telephone</label>

                                                                <input type="text" name="mobileno" value="<?php echo $row['mobileno'];?>" />

                                                            </div>

                                                        </div>

                                                        <div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>Username</label>

                                                                <input type="text" value="<?php echo $row['username'];?>" name="username" />

                                                            </div>

                                                        </div>

														 <div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>password</label>

                                                                <input type="text" value="<?php echo $row['password'];?>" name="password" />

                                                            </div>

                                                        </div>

														<div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>Country</label>

                                                                <input type="text" value="<?php echo $row['country'];?>" name="country" />

                                                            </div>

                                                        </div>

														<div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>State</label>

                                                                <input type="text" value="<?php echo $row['state'];?>" name="state" />

                                                            </div>

                                                        </div>

														<div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>City</label>

                                                                <input type="text" value="<?php echo $row['city'];?>" name="city" />

                                                            </div>

                                                        </div>

														<div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>Address</label>

                                                                <input type="text" value="<?php echo $row['address'];?>" name="address" />

                                                            </div>

                                                        </div>

														<div class="col-lg-6 col-md-6">

                                                            <div class="billing-info">

                                                                <label>Postal code</label>

                                                                <input type="text" value="<?php echo $row['postalcode'];?>" name="postalcode" />

                                                            </div>

                                                        </div>

                                                    </div>

                                                    <div class="billing-back-btn">

                                                        

                                                        <div class="billing-btn">

                                                            <button type="submit" name="Submit">Submit</button>

                                                        </div>

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

                </div>

            </div>

            <!-- account area end -->

            <!-- Footer Area start -->

            <?php include('include/footer.php'); ?>

            <!--  Footer Area End -->

        </div>



        <!-- Scripts to be loaded  -->

        <!-- JS ============================================ -->



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

