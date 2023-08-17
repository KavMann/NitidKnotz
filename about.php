<!DOCTYPE html>
<html lang="zxx">
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
                                <h1 class="breadcrumb-hrading">About</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>About</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
<?php 
	
	$sql1 = "SELECT * from about where id='1'";
$result1 = mysqli_query($conn,$sql1);
$rowc1 = mysqli_fetch_assoc($result1);	
?>
            <!-- About Area Start -->
            <section class="about-area">
                <div class="container">
                    <div class="row">
                        <div class="col-lg-6 mb-res-sm-50px">
                            <div class="about-left-image">
                                <img src="<?php echo $rowc1['image']; ?>" alt="" class="img-responsive" />
                            </div>
                        </div>
                        <div class="col-lg-6">
                            <div class="about-content">
                                <div class="about-title">
                                    <h2><?php echo $rowc1['heading']; ?></h2>
                                </div>
                               <?php echo $rowc1['summary']; ?>
                            </div>
                        </div>
                    </div>
           
                </div>
            </section>
            <!-- About Area End -->
            <!-- Footer Area start -->
            <?php include('include/footer.php'); ?>
            <!--  Footer Area End -->
        </div>
        <!-- Scripts to be loaded  -->
        <!-- JS  ============================================ -->
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
