<?php include('connect.php'); ?>
<?php
/* code by webdevtrick ( https://webdevtrick.com ) */
session_start();
if (isset($_POST["add_to_cart"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id' => $_GET["id"],
                'item_name' => $_POST["hidden_name"],
                'item_price' => $_POST["hidden_price"],
                'item_quantity' => $_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id' => $_GET["id"],
            'item_name' => $_POST["hidden_name"],
            'item_price' => $_POST["hidden_price"],
            'item_quantity' => $_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }
}

if (isset($_GET["action"])) {
    if ($_GET["action"] == "delete") {
        foreach ($_SESSION["shopping_cart"] as $keys => $values) {
            if ($values["item_id"] == $_GET["id"]) {
                unset($_SESSION["shopping_cart"][$keys]);
                echo '<script>alert("Item Removed")</script>';
                echo '<script>window.location="cartdemo.php"</script>';
            }
        }
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
        <!-- Slider Arae Start -->
        <div class="slider-area">
            <div class="slider-active-3 owl-carousel slider-hm8 owl-dot-style">
                <!-- Slider Single Item Start -->
                <?php
                $sql = "select * from slider";
                $query = mysqli_query($conn, $sql);
                $i = 0;
                while ($show = mysqli_fetch_array($query)) {
                    $i++;
                    ?>
                    <div class="slider-height-6 d-flex align-items-start justify-content-start bg-img"
                        style="background-image: url(<?php echo $show['image'] ?>);">
                        <div class="container">
                            <div class="slider-content-1 slider-animated-1 text-left">

                                <h1 style="color: navy;font-size: 70px; font-family: 'Allura', cursive; padding-left: 30px; text-shadow: -2px 0px 0px white, 2px 0px 0px white, 0px -2px 0px white, 0px 2px 0px white;"
                                    class="animated">
                                    <?php echo $show['heading'] ?>
                                </h1>
                                <p style="color: black; font-family: 'Tangerine', cursive; font-size: 43px; padding-left: 253px; text-shadow: -1px 0px 3px white, 1px 0px 3px white, 0px -1px 3px white, 0px 1px 3px white;"
                                    class="animated">
                                    <?php echo $show['descr']; ?>
                                </p>
                                <a href="shop.php" class="shop-btn1 animated">SHOP NOW</a>
                            </div>
                        </div>
                    </div>
                    <!-- Slider Single Item End -->
                    <!-- Slider Single Item Start -->
                <?php } ?>
                <!-- Slider Single Item End -->
            </div>
        </div>
        <!-- Category Area Start -->
        <section class="categorie-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title mt-res-sx-30px mt-res-md-30px">
                            <h2>Popular Categories</h2>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Category Slider Start -->
                <div class="category-slider owl-carousel owl-nav-style">
                    <!-- Single item -->
                    <?php
                    $sql = "select * from category";
                    $query = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($show = mysqli_fetch_array($query)) {
                        $query1 = mysqli_query($conn, "SELECT * FROM products where category='" . $show['name'] . "'");
                        $number1 = mysqli_num_rows($query1);
                        ?>
                        <div class="category-item">
                            <div class="category-list mb-30px">
                                <div class="category-thumb">
                                    <a href="category_wise.php?name=<?php echo $show['name']; ?>">
                                        <img src="images/thumb-5.png" alt="" onmouseover="this.src='images/thumb-5.jpg'"
                                            onmouseout="this.src='images/thumb-5.png'" />
                                    </a>
                                </div>
                                <div class="desc-listcategoreis">
                                    <div class="name_categories">
                                        <h4>
                                            <?php echo $show['name']; ?>
                                        </h4>
                                    </div>
                                    <span class="number_product">
                                        <?php echo $number1; ?> Products
                                    </span>
                                    <a href="category_wise.php?name=<?php echo $show['name']; ?>"> Shop Now <i
                                            class="ion-android-arrow-dropright-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Single item -->
                </div>
            </div>
        </section>
        <!-- Category Area End  -->
        <!-- Sub-Category Area Start -->
        <section class="categorie-area">
            <div class="container">
                <div class="row">
                    <div class="col-md-12">
                        <!-- Section Title -->
                        <div class="section-title mt-res-sx-30px mt-res-md-30px">
                            <h2>Popular Styles</h2>
                        </div>
                        <!-- Section Title -->
                    </div>
                </div>
                <!-- Category Slider Start -->
                <div class="category-slider owl-carousel owl-nav-style">
                    <!-- Single item -->
                    <?php
                    $sql = "select * from subcategory";
                    $query = mysqli_query($conn, $sql);
                    $i = 0;
                    while ($show = mysqli_fetch_array($query)) {
                        $query1 = mysqli_query($conn, "SELECT * FROM products where subcategory='" . $show['name'] . "'");
                        $number1 = mysqli_num_rows($query1);
                        ?>
                        <div class="category-item">
                            <div class="category-list mb-30px">
                                <div class="category-thumb">
                                    <a href="embroideryshop.php?name=<?php echo $show['name']; ?>">
                                        <img src="images/thumb-5.png" alt="" onmouseover="this.src='images/thumb-5.jpg'"
                                            onmouseout="this.src='images/thumb-5.png'" />
                                    </a>
                                </div>
                                <div class="desc-listcategoreis">
                                    <div class="name_categories">
                                        <h4>
                                            <?php echo $show['name']; ?>
                                        </h4>
                                    </div>
                                    <span class="number_product">
                                        <?php echo $number1; ?> Products
                                    </span>
                                    <a href="embroideryshop.php?name=<?php echo $show['name']; ?>"> Shop Now <i
                                            class="ion-android-arrow-dropright-circle"></i></a>
                                </div>
                            </div>
                        </div>
                    <?php } ?>

                    <!-- Single item -->
                </div>
            </div>
        </section>
        <!-- Sub-Category Area End  -->
        <section class="best-sells-area mb-30px">
            <div class="container">
                <!-- Section Title Start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Best Sellers</h2>
                        </div>
                    </div>
                </div>
                <!-- Section Title End -->
                <!-- Best Sell Slider Carousel Start -->
                <div class="best-sell-slider owl-carousel owl-nav-style">
                    <!-- Single Item -->

                    <?php
                    $sql = "select * from products where showcat='Best Sellers'";
                    $query = mysqli_query($conn, $sql);
                    while ($show = mysqli_fetch_array($query)) {
                        ?>
                        <form method="post" action="index.php?action=add&id=<?php echo $show["id"]; ?>">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.php?id=<?php echo $show["id"]; ?>" class="thumbnail">
                                        <img class="first-img" src="<?php echo $show['image'] ?>" alt=""
                                            onmouseover="this.src='<?php echo $show['imghov'] ?>'"
                                            onmouseout="this.src='<?php echo $show['image'] ?>'" />
                                    </a>
                                </div>
                                <ul class="product-flag">
                                    <?php
                                    $showcat = $show['showcat'];
                                    $showcat = str_replace(' ', '', $showcat);
                                    ?>
                                    <li class="<?php echo $showcat; ?>"><?php echo $show['showcat'] ?></li>
                                </ul>
                                <div class="product-decs">

                                    <h2><a href="single-product.php?id=<?php echo $show['id']; ?>"
                                            class="product-link"><?php echo $show['name']; ?></a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            <!--<li class="old-price">€18.90</li>-->
                                            <li class="current-price">₹
                                                <?php echo $show['price']; ?>.00
                                            </li>
                                            <!--<li class="discount-price">-5%</li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <input type="hidden" style="width: 56px;float: left;margin-right:10px;"
                                            name="quantity" value="1" class="form-control" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $show["name"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $show["price"]; ?>" />
                                        <li class="cart">
                                            <button class="shop-btn animated" type="submit" name="add_to_cart">
                                                <i style="font-size: 24px;" class="fa fa-shopping-bag"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </form>
                    <?php } ?>
                    <!-- Single Item -->
                </div>
                <!-- Best Sells Carousel End -->
            </div>
        </section>
        <!-- Best Sells Slider End -->
        <section class="best-sells-area mb-30px">
            <div class="container">
                <!-- Section Title Start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>New Arrivals</h2>
                        </div>
                    </div>
                </div>
                <!-- Section Title End -->
                <!-- New Arrivals Slider Carousel Start -->
                <div class="best-sell-slider owl-carousel owl-nav-style">
                    <!-- Single Item -->

                    <?php
                    $sql = "select * from products where showcat='New Arrivals'";
                    $query = mysqli_query($conn, $sql);
                    while ($show = mysqli_fetch_array($query)) {
                        ?>
                        <form method="post" action="index.php?action=add&id=<?php echo $show["id"]; ?>">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.php?id=<?php echo $show["id"]; ?>" class="thumbnail">
                                        <img class="first-img" src="<?php echo $show['image'] ?>" alt=""
                                            onmouseover="this.src='<?php echo $show['imghov'] ?>'"
                                            onmouseout="this.src='<?php echo $show['image'] ?>'" />
                                    </a>
                                </div>
                                <ul class="product-flag">
                                    <?php
                                    $showcat = $show['showcat'];
                                    $showcat = str_replace(' ', '', $showcat);
                                    ?>
                                    <li class="<?php echo $showcat; ?>"><?php echo $show['showcat'] ?></li>
                                </ul>
                                <div class="product-decs">
                                    <h2><a href="single-product.php?id=<?php echo $show['id']; ?>"
                                            class="product-link"><?php echo $show['name']; ?></a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            <!--<li class="old-price">€18.90</li>-->
                                            <li class="current-price">₹
                                                <?php echo $show['price']; ?>.00
                                            </li>
                                            <!--<li class="discount-price">-5%</li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <input type="hidden" style="width: 56px;float: left;margin-right:10px;"
                                            name="quantity" value="1" class="form-control" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $show["name"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $show["price"]; ?>" />
                                        <li class="cart">
                                            <button class="shop-btn animated" type="submit" name="add_to_cart">
                                                <i style="font-size: 24px;" class="fa fa-shopping-bag"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </form>
                    <?php } ?>
                    <!-- Single Item -->
                </div>
                <!-- New Arrivals Carousel End -->
            </div>
        </section>
        <!-- New Arrivals Slider End -->
        <section class="best-sells-area mb-30px">
            <div class="container">
                <!-- Section Title Start -->
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2>Hot Deals</h2>
                        </div>
                    </div>
                </div>
                <!-- Section Title End -->
                <!-- Hot Deals Slider Carousel Start -->
                <div class="best-sell-slider owl-carousel owl-nav-style">
                    <!-- Single Item -->

                    <?php
                    $sql = "select * from products where showcat='Hot Deals'";
                    $query = mysqli_query($conn, $sql);
                    while ($show = mysqli_fetch_array($query)) {
                        ?>
                        <form method="post" action="index.php?action=add&id=<?php echo $show["id"]; ?>">
                            <article class="list-product">
                                <div class="img-block">
                                    <a href="single-product.php?id=<?php echo $show["id"]; ?>" class="thumbnail">
                                        <img class="first-img" src="<?php echo $show['image'] ?>" alt=""
                                            onmouseover="this.src='<?php echo $show['imghov'] ?>'"
                                            onmouseout="this.src='<?php echo $show['image'] ?>'" />
                                    </a>
                                </div>
                                <ul class="product-flag">
                                    <?php
                                    $showcat = $show['showcat'];
                                    $showcat = str_replace(' ', '', $showcat);
                                    ?>
                                    <li class="<?php echo $showcat; ?>"><?php echo $show['showcat'] ?></li>
                                </ul>
                                <div class="product-decs">
                                    <h2><a href="single-product.php?id=<?php echo $show['id']; ?>"
                                            class="product-link"><?php echo $show['name']; ?></a></h2>
                                    <div class="pricing-meta">
                                        <ul>
                                            <!--<li class="old-price">€18.90</li>-->
                                            <li class="current-price">₹
                                                <?php echo $show['price']; ?>.00
                                            </li>
                                            <!--<li class="discount-price">-5%</li>-->
                                        </ul>
                                    </div>
                                </div>
                                <div class="add-to-link">
                                    <ul>
                                        <input type="hidden" style="width: 56px;float: left;margin-right:10px;"
                                            name="quantity" value="1" class="form-control" />
                                        <input type="hidden" name="hidden_name" value="<?php echo $show["name"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $show["price"]; ?>" />
                                        <li class="cart">
                                            <button class="shop-btn animated" type="submit" name="add_to_cart">
                                                <i style="font-size: 24px;" class="fa fa-shopping-bag"></i>
                                            </button>
                                        </li>
                                    </ul>
                                </div>
                            </article>
                        </form>
                    <?php } ?>
                    <!-- Single Item -->
                </div>
                <div class="clockdiv">
                    <div class="title_countdown">Hurry Up! Offers end in:</div>
                    <div class="countdown" data-countdown="2023/08/01"></div>
                </div>
                <!-- Hot Deals Carousel End -->
            </div>
        </section>
        <!-- Hot Deals Slider End -->
        <section class="best-sells-area mb-30px">
            <div class="container">
                <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-5 col-lg-5 col-xl-4">
                        <div class="row">
                            <div class="col-md-12">
                                <!-- Section Title -->
                                <div class="section-title">
                                    <h2>Customer Reviews <a href="addreview.php"><button
                                                style="font-size: 12px;background-color: #4fb68d;border-radius: 5px;margin-left: 15px;font-weight: bold;padding-top: 3px;border: solid 1px black;color: white;padding-bottom: 3px;">
                                                Add Review </button></a></h2>
                                </div>
                                <!-- Section Title End-->
                            </div>
                        </div>
                        <!-- Hot Deal Slider Start -->
                        <div class="hot-deal owl-carousel owl-nav-style">
                            <?php
                            $sql = "select * from reviews where status='1'";
                            $query = mysqli_query($conn, $sql);
                            while ($show = mysqli_fetch_array($query)) { ?>
                                <!--  Single item -->
                                <article class="list-product">
                                    <div class="img-block">
                                        <a style="margin-top:20px;display:inline-block;" class="thumbnail">
                                            <img class="first-img" src="<?php echo $show['image'] ?>"
                                                style="height: 235px;margin: auto;width: 235px;padding: 5px;/* width: 74%; */border-radius: 50%;border: solid 1px black;"
                                                alt="" />
                                        </a>
                                    </div>
                                    <div class="product-decs" style="height:200px;">
                                        <h2>
                                            <?php echo $show['name']; ?>
                                        </h2>
                                        <div class="pricing-meta">
                                            <p>
                                                <?php echo $show['content']; ?>
                                            </p>
                                        </div>
                                    </div>
                                </article>
                            <?php } ?>
                            <!--  Single item -->
                        </div>
                        <!-- Hot Deal Slider End -->
                    </div>

                    <!-- New Arrivals Area Start -->
                </div>
            </div>
        </section>

        <!-- Footer Area start -->
        <?php include('include/footer.php'); ?>
        <!--  Footer Area End -->
        <!-- Slider Arae End -->
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