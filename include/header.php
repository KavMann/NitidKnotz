<?php

if (!empty($_SESSION["shopping_cart"])) {

    $total = 0;

    $count = count($_SESSION["shopping_cart"]);

} else {

    $count = 0;

}

?>

<header class="main-header">

    <!-- Header Top Start -->
    <div class="header-top-nav">
        <div class="container-fluid">
            <div class="row">
                <!--Left Start-->
                <div class="col-lg-4 col-md-4">
                    <div class="left-text">
                        <p>Welcome to Nitid Knotz store!</p>
                    </div>
                </div>
                <!--Left End-->

                <!--Right Start-->
                <div class="col-lg-8 col-md-8 text-right">
                    <div class="header-right-nav">
                        <ul class="res-xs-flex">
                        </ul>
                        <div class="dropdown-navs">
                            <ul>

                                <!-- Settings Start -->
                                <?php
                                if (isset($_SESSION['user'])) {
                                    // User is logged in, so display the dropdown menu
                                    echo <<<HTML
                                    <li class="dropdown xs-after-n">
                                        <a class="angle-icon" href="#">
                                            {$_SESSION['user']}
                                        </a>
                                        <ul class="dropdown-nav">
                                            <li><a href="my-account.php">My Account</a></li>
                                            <li><a href="logout.php">Logout</a></li>
                                        </ul>
                                    </li>
                                    HTML;
                                } else {
                                    // User is not logged in, so display a message and a link to the login page
                                    echo <<<HTML
                                    <li>
                                        <a href="login.php">Login</a>
                                    </li>
                                    HTML;
                                }
                                ?>
                                <!-- Language End -->
                            </ul>
                        </div>
                    </div>
                </div>
                <!--Right End-->
            </div>
        </div>
    </div>
    <!-- Header Top End -->

    <!-- Header Buttom Start -->
    <div class="header-navigation sticky-nav" style="padding:0px;">
        <div class="container-fluid">
            <div class="row">

                <!-- Logo Start -->
                <div class="col-md-2 col-sm-2">

                    <div class="logo">
                        <a href="index.php"><img src="/images/Logo-MainW.png" width="115" alt="" /></a>
                    </div>
                </div>
                <!-- Logo End -->

                <!-- Navigation Start -->
                <div class="col-md-10 col-sm-10">
                    <!--Main Navigation Start -->
                    <div class="main-navigation d-none d-lg-block">
                        <ul>
                            <li class="menu-dropdown">
                                <a href="index.php">Home </a>

                            </li>
                            <li class="menu-dropdown">
                                <a href="about.php">About</a>

                            </li>

                            <li class="menu-dropdown">
                                <a href="shop.php">Products </a>
                                <div class="dropdown-content">
                                    <?php
                                    $sql = "select * from category";
                                    $query = mysqli_query($conn, $sql);
                                    while ($show = mysqli_fetch_array($query)) {
                                        ?>
                                    <a href="sub_categories.php?name=<?php echo $show['name']; ?>"><?php echo $show['name']; ?></a>
                                    <?php } ?>
                                </div>
                            </li>
                            <li class="menu-dropdown">
                                <a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </div>
                    <!--Main Navigation End -->

                    <!--Header Bottom Account Start -->
                    <div class="header_account_area">

                        <!--Seach Area Start -->
                        <!-- <div class="header_account_list search_list">
                                        <a href="javascript:void(0)"><i class="ion-ios-search-strong"></i></a>
                                        <div class="dropdown_search">
                                            <form action="#">
                                                <input placeholder="Search entire store here ..." type="text" />
                                                <div class="search-category">
                                                    <select class="bootstrap-select" name="poscats">
                                                        <option value="0">All categories</option>
                                                        <option value="104">
                                                            Fresh Food
                                                        </option>
                                                        <option value="183">
                                                            - - Fresh Fruit
                                                        </option>
                                                        <option value="187">
                                                            - - - - Bananas
                                                        </option>
                                                        <option value="188">
                                                            - - - - Apples &amp; Pears
                                                        </option>
                                                        <option value="189">
                                                            - - - - Berries &amp; Cherries
                                                        </option>
                                                    </select>
                                                </div>
                                                <button type="submit"><i class="ion-ios-search-strong"></i></button>
                                            </form>
                                        </div>
                                    </div>-->
                        <!--Seach Area End -->

                        <!--Contact info Start -->
                        <div class="contact-link">
                            <div class="phone">
                                <p style="margin-bottom:10px" >Call us:</p>
                                <?php
                                $sql1 = "SELECT * from contact where id='1'";
                                $result1 = mysqli_query($conn, $sql1);
                                $rowc1 = mysqli_fetch_assoc($result1);
                                ?>
                                <a href="tel: (+91)98765-60171">
                                    <?php echo $rowc1['number']; ?>
                                </a>
                            </div>
                        </div>
                        <!--Contact info End -->

                        <!--Cart info Start -->
                        <div class="cart-info d-flex">
                            <div class="mini-cart-warp">
                                <a href="cart.php">
                                    <i style="font-size: 28px;color: #ecb37e;" class="fa fa-shopping-basket"
                                        aria-hidden="true"></i>
                                    <span
                                        style="background:#000000;position:relative;color: white;top: -17px;font-size: 12px;left: -9px;"
                                        class="badge badge-notify">
                                        <?php echo $count; ?>
                                    </span><!--<span>$20.00</span>--></a>

                                <!--<div class="mini-cart-content">
                                                <ul>
                                                    <li class="single-shopping-cart">
                                                        <div class="shopping-cart-img">
                                                            <a href="single-product.php"><img alt="" src="assets/images/product-image/mini-cart/1.jpg" /></a>
                                                            <span class="product-quantity">1x</span>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="single-product.php">Juicy Couture...</a></h4>
                                                            <span>$9.00</span>
                                                            <div class="shopping-cart-delete">
                                                                <a href="#"><i class="ion-android-cancel"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                    <li class="single-shopping-cart">
                                                        <div class="shopping-cart-img">
                                                            <a href="single-product.php"><img alt="" src="assets/images/product-image/mini-cart/2.jpg" /></a>
                                                            <span class="product-quantity">1x</span>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a href="single-product.php">Water and Wind...</a></h4>
                                                            <span>$11.00</span>
                                                            <div class="shopping-cart-delete">
                                                                <a href="#"><i class="ion-android-cancel"></i></a>
                                                            </div>
                                                        </div>
                                                    </li>
                                                </ul>
                                                <div class="shopping-cart-total">
                                                    <h4>Subtotal : <span>$20.00</span></h4>
                                                    <h4>Shipping : <span>$7.00</span></h4>
                                                    <h4>Taxes : <span>$0.00</span></h4>
                                                    <h4 class="shop-total">Total : <span>$27.00</span></h4>
                                                </div>
                                                <div class="shopping-cart-btn text-center">
                                                    <a class="default-btn" href="checkout.php">checkout</a>
                                                </div>
                                            </div>-->
                            </div>
                        </div>
                        <!--Cart info End -->
                    </div>
                </div>
            </div>

            <!-- mobile menu -->
            <div class="mobile-menu-area">
                <div class="mobile-menu">
                    <nav id="mobile-menu-active">
                        <ul class="menu-overflow">
                            <li>
                                <a href="index.php">HOME</a>
                            </li>
                            <li>
                                <a href="about.php">About</a>
                            </li>
                            <li>
                                <a href="shop.php">Products</a>
                            </li>
                            <!--<li><a href="login.php">Login & Regiter Page</a></li>-->
                            <li>
                                <a href="contact.php">Contact Us</a>
                            </li>
                        </ul>
                    </nav>
                </div>
            </div>
            <!-- mobile menu end-->
        </div>
    </div>
    <!--Header Bottom Account End -->
</header>