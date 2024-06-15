<?php
session_start();
include('connect.php');
unset($_SESSION["shopping_cart"]);
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
        <!-- Breadcrumb Area End -->
        <!-- cart area start -->
        <?php
        $sql1 = "SELECT * from contact where id='1'";
        $result1 = mysqli_query($conn, $sql1);
        $rowc1 = mysqli_fetch_assoc($result1);
        ?>
        <div class="cart-main-area mtb-60px">
            <div class="container">
                <p style="text-align:center; font-size:100px; margin-bottom:15px; color:green"><i class="fas fa-check-circle"></i></p>
                <h3 style="text-align: center;color: green;" class="cart-page-title">ORDER SUBMITTED SUCCESSFULLY</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <p style="text-align:center;">Thank You! For Shopping with us, Your Order will be processed Shortly.<br>if any query contact on this number<br>
                        </p>
                        <p style="text-align:center; font-size: 20px; color: black; font-weight: bold; margin-top: 17px">+91 98765-60171</p>
                    </div>
                </div>
            </div>
        </div>
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