<?php 
     include('connect.php');
	 
	 $er='';
	 if(!isset($_FILES['image']['tmp_name'])){
		 //$er="Error" ; 
	 }else{
	 $imageFileType = strtolower(pathinfo($_FILES['image']['tmp_name'],PATHINFO_EXTENSION));
	 $image_base64=addslashes(file_get_contents($_FILES['image']['tmp_name']));
	 move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" .$_FILES["image"]["name"]);	 
	 $pic="upload/" .$_FILES["image"]["name"];
	 $name=$_POST['name'];
	 $content=$_POST['content'];
			$save=mysqli_query($conn,"INSERT into reviews(image,name,content)VALUE('".$pic."','".$name."','".$content."')");				
			$er= '<div class="alert alert-success">
Your Review Submitted
</div>';
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
                                <h1 class="breadcrumb-hrading">Add Reviews</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                 
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
                    
				
                    <div class="custom-row-2">
                      
                        <div class="col-lg-12 col-md-12">
                            <div class="contact-form">
                                <div class="contact-title mb-30">
                                    <h2>Customer Reviews</h2>
                                </div>
								<?php echo $er; ?>
                                <form class="contact-form-style" id="contact-form" action="" method="post" enctype="multipart/form-data">
                                    <div class="row">
                                        <div class="col-lg-12">
                                            <input name="image" placeholder="Name*" type="file" required>
                                        </div>
                                        <div class="col-lg-12">
                                            <input name="name" placeholder="Your Name" type="text" required>
                                        </div>
                                        
                                        <div class="col-lg-12">
                                            <textarea name="content" placeholder="Your Message*"></textarea>
											
                                         
                                        </div>
										<div class="col-lg-2">
                                         
											<input style="    background-color: #4fb68d;
    color: white;" name="submit" class="btn-primary" placeholder="Your Name" type="submit" value="Save">
                                         
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
