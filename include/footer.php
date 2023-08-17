<footer class="footer-area ">
    <div class="footer-top">
        <div class="container">
            <div class="row">
                <!-- footer single wedget -->
                <div class="col-md-6 col-lg-4">
                    <!-- footer logo -->
                    <div class=" footer-logo" style=" margin-left: 10px;">
                        <a href="index.php"><img src="images/Logo-Main.png" width="200" alt="" /></a>
                    </div>
                    <div class="about-footer">
                        <div class="need-help" style="display:inline-block;">
                            <p style="margin-top:15px;" class="phone-info">
                                NEED HELP?
                                <span>
                                    <p style="font-size: 20px; color: black; font-weight: bold; margin-top: -29px; margin-left: 55px;">
                                    <br>
                                    +91 98765-60171</p>
                                </span>
                            </p>
                        </div>

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
            <?php
            $sql1 = "SELECT * from about where id='1'";
            $result1 = mysqli_query($conn, $sql1);
            $rowc1 = mysqli_fetch_assoc($result1);
            ?>

                <div class="col-md-6 col-lg-4 mt-res-md-50px mt-res-sx-30px mt-res-md-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">About</h4>
                        <div class="subscrib-text">
                            <p style="text-align:justify; margin-right: 11px;">
                                At Nitid Knotz, we bring you a delightful collection of exquisite Punjabi suits, designed to enhance your elegance and grace. We curate a range of traditional and contemporary styles, meticulously crafted to capture the essence of Punjabi culture while embracing modern trends.
                            </p>
                            <p style="text-align:justify; text-indent:35px; margin-right: 11px;">Thank you for choosing Nitid Knotz as your destination for exquisite Punjabi suits. We look forward to serving you and helping you discover the perfect ensemble that reflects your unique style and celebrates the beauty of Punjabi culture.
                            </p>
                        </div>
                    </div>
                </div>

                <!-- footer single wedget -->
                <div class="col-md-12 col-lg-2 mt-res-sx-30px mt-res-md-30px">
                    <div class="single-wedge">
                        <h4 class="footer-herading">Quick Links</h4>
                        <div class="footer-links">
                            <ul>
                                <li><a href="index.php">Home</a></li>
                                <li><a href="about.php">About Us</a></li>
                                <li><a href="#">Secure Payment</a></li>
                                <li><a href="contact.php">Contact Us</a></li>
                                <li><a href="refund-policy.php">Refund Policy</a></li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <!--  Footer Bottom Area start -->

    <div class="footer-bottom">
        <div class="container">
            <div class="row">
                <div class="col-md-12 col-lg-4">
                    <p class="copy-text">Copyright © <a href="http://www.nitidknotz.com/">Nitid Knotz</a> . All Rights Reserved</p>
                </div>
            </div>
        </div>
    </div>
    <!--  Footer Bottom Area End-->
</footer>
<script>
        // Detect screenshot attempt
        window.addEventListener('keyup', function (event) {
            // Check if PrtScn (Print Screen) or Alt key is pressed
            if (event.keyCode === 44 || event.altKey) {
                // Turn the screen black
                document.documentElement.style.backgroundColor = 'black';
                
                // Restore the screen after a delay (e.g., 2 seconds)
                setTimeout(function () {
                    document.documentElement.style.backgroundColor = '';
                }, 2000);
            }
        });
    </script>