
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
                                <h1 class="breadcrumb-hrading">Contact</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.html">Home</a></li>
                                    <li>Contact Us</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- contact area start -->
            <div class="contact-area mtb-60px">
                <div class="container">
                    <div class="contact-map mb-10">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d13791.454490853801!2d74.9508748!3d30.2124396!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x391733a7d0d111e7%3A0x868b539aa6d53531!2sNitid%20Knotz!5e0!3m2!1sen!2sin!4v1684859375222!5m2!1sen!2sin" width="100%" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
					</div>
					<?php 
					$sql1 = "SELECT * from contact where id='1'";
					$result1 = mysqli_query($conn,$sql1);
					$rowc1 = mysqli_fetch_assoc($result1);	
					?>
                    <div class="custom-row-2">
                        <div class="col-lg-4 col-md-5">
                            <div class="contact-info-wrap">
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-phone"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                        <?php echo $rowc1['number']; ?>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-globe"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                       <?php echo $rowc1['email']; ?>
                                    </div>
                                </div>
                                <div class="single-contact-info">
                                    <div class="contact-icon">
                                        <i class="fa fa-map-marker"></i>
                                    </div>
                                    <div class="contact-info-dec">
                                       <?php echo $rowc1['address']; ?>
                                    </div>
                                </div>
                                <div class="contact-social">
                                    <h3>Follow Us</h3>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="https://www.facebook.com/nitidknotz"><i class="fab fa-facebook-square"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/nitidknotz"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://wa.me/9876560171"><i class="ion-social-whatsapp"></i></a>
                                            </li>
                                            <li>
                                                <a href="mailto:nitidknotz@gmail.com"><i class="fas fa-envelope"></i></a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/nitid_knotz/"><i class="fab fa-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-lg-8 col-md-7">
                            <div class="contact-form">
                                <div class="contact-title mb-30">
                                    <h2>Get In Touch</h2>
                                </div>
                                <form class="contact-form-style" id="contact-form" action="assets/php/mail.php" method="post">
                                    <div class="row">
                                        <div class="col-lg-6">
                                            <input name="name" placeholder="Name*" type="text" />
                                        </div>
                                        <div class="col-lg-6">
                                            <input name="email" placeholder="Email*" type="email" />
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="subject" placeholder="Subject*" type="text" />
                                        </div>
                                        <div class="col-lg-12">
                                            <textarea name="message" placeholder="Your Message*"></textarea>
                                            <button class="submit" type="submit">SEND</button>
                                        </div>
                                    </div>
                                </form>
                                <p class="form-messege"></p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!-- contact area end -->
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
        <!-- <script src="assets/js/plugins/bootstrap.min.js"></script>
        <script src="assets/js/plugins/popper.min.js"></script>
        <script src="assets/js/plugins/meanmenu.js"></script>
        <script src="assets/js/plugins/owl-carousel.js"></script>
        <script src="assets/js/plugins/jquery.nice-select.js"></script>
        <script src="assets/js/plugins/countdown.js"></script>
        <script src="assets/js/plugins/elevateZoom.js"></script>
        <script src="assets/js/plugins/jquery-ui.min.js"></script>
        <script src="assets/js/plugins/slick.js"></script>
        <script src="assets/js/plugins/scrollup.js"></script>
        <script src="assets/js/plugins/range-script.js"></script> -->
        <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyC6iKLVzr34W23jAZDT3HlrElOHfK6IH_w"></script>
        <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
        <script src="assets/js/plugins.min.js"></script>
        <script>
            function init() {
                var mapOptions = {
                    zoom: 11,
                    scrollwheel: false,
                    center: new google.maps.LatLng(40.709896, -73.995481),
                    styles: [
                        {
                            featureType: "water",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#e9e9e9",
                                },
                                {
                                    lightness: 17,
                                },
                            ],
                        },
                        {
                            featureType: "landscape",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#f5f5f5",
                                },
                                {
                                    lightness: 20,
                                },
                            ],
                        },
                        {
                            featureType: "road.highway",
                            elementType: "geometry.fill",
                            stylers: [
                                {
                                    color: "#ffffff",
                                },
                                {
                                    lightness: 17,
                                },
                            ],
                        },
                        {
                            featureType: "road.highway",
                            elementType: "geometry.stroke",
                            stylers: [
                                {
                                    color: "#ffffff",
                                },
                                {
                                    lightness: 29,
                                },
                                {
                                    weight: 0.2,
                                },
                            ],
                        },
                        {
                            featureType: "road.arterial",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#ffffff",
                                },
                                {
                                    lightness: 18,
                                },
                            ],
                        },
                        {
                            featureType: "road.local",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#ffffff",
                                },
                                {
                                    lightness: 16,
                                },
                            ],
                        },
                        {
                            featureType: "poi",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#f5f5f5",
                                },
                                {
                                    lightness: 21,
                                },
                            ],
                        },
                        {
                            featureType: "poi.park",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#dedede",
                                },
                                {
                                    lightness: 21,
                                },
                            ],
                        },
                        {
                            elementType: "labels.text.stroke",
                            stylers: [
                                {
                                    visibility: "on",
                                },
                                {
                                    color: "#ffffff",
                                },
                                {
                                    lightness: 16,
                                },
                            ],
                        },
                        {
                            elementType: "labels.text.fill",
                            stylers: [
                                {
                                    saturation: 36,
                                },
                                {
                                    color: "#333333",
                                },
                                {
                                    lightness: 40,
                                },
                            ],
                        },
                        {
                            elementType: "labels.icon",
                            stylers: [
                                {
                                    visibility: "off",
                                },
                            ],
                        },
                        {
                            featureType: "transit",
                            elementType: "geometry",
                            stylers: [
                                {
                                    color: "#f2f2f2",
                                },
                                {
                                    lightness: 19,
                                },
                            ],
                        },
                        {
                            featureType: "administrative",
                            elementType: "geometry.fill",
                            stylers: [
                                {
                                    color: "#fefefe",
                                },
                                {
                                    lightness: 20,
                                },
                            ],
                        },
                        {
                            featureType: "administrative",
                            elementType: "geometry.stroke",
                            stylers: [
                                {
                                    color: "#fefefe",
                                },
                                {
                                    lightness: 17,
                                },
                                {
                                    weight: 1.2,
                                },
                            ],
                        },
                    ],
                };
                var mapElement = document.getElementById("map");
                var map = new google.maps.Map(mapElement, mapOptions);
                var marker = new google.maps.Marker({
                    position: new google.maps.LatLng(40.709896, -73.995481),
                    map: map,
                    icon: "assets/images/icons/2.png",
                    animation: google.maps.Animation.BOUNCE,
                    title: "Snazzy!",
                });
            }
            google.maps.event.addDomListener(window, "load", init);
        </script>
        <!-- Main Activation JS -->
        <script src="assets/js/main.js"></script>
    </body>
</html>
