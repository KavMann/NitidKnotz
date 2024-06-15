<?php

   include("connect.php");

   session_start();

   $error="";

   if($_SERVER["REQUEST_METHOD"] == "POST") {

      // username and password sent from form 

      $myusername = mysqli_real_escape_string($conn,$_POST['username']);

      $mypassword = mysqli_real_escape_string($conn,$_POST['password']); 

      

      $sql = "SELECT * FROM users WHERE username = '$myusername' and password = '$mypassword'";

	  

      $result = mysqli_query($conn,$sql);

	  

      $row = mysqli_fetch_array($result,MYSQLI_ASSOC);

     

      

      $count = mysqli_num_rows($result);

      

      // If result matched $myusername and $mypassword, table row must be 1 row

	  

      if($count == 1) {

        

		$_SESSION['user'] = $myusername;

          



		 	echo '<script>window.location.href="checkout.php";</script>';

      }else {

		$error = '<div class="alert alert-danger" role="alert">

 Your Login Name or Password is invalid

</div>';

         

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

                                    <a class="active" data-toggle="tab" href="#lg1">

                                        <h4>login</h4>

                                    </a>

                                    <a   href="reg.php">

                                        <h4>register</h4>

                                    </a>

                                </div>

                                <div class="tab-content" style="background-color: #9bded4ab;">

                                    <div id="lg1" class="tab-pane active ">

                                        <div class="login-form-container">

                                            <div class="login-register-form">

											<?php echo $error; ?>

                                               <form class="user"id="form1" name="form1" method="post" action="">

                                                    <input type="text" name="username" placeholder="Username" />

                                                    <input type="password" name="password" placeholder="Password" />

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

