<?php include('connect.php');
session_start();
$name = '';
if (isset($_GET['name'])) {
    $name = $_GET['name'];
}
$sql1 = "select * from subcategory where name='" . $name . "'";
$query111 = mysqli_query($conn, $sql1);
$show11 = mysqli_fetch_array($query111);
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
                            <h1 class="breadcrumb-hrading">Shop</h1>
                            <ul class="breadcrumb-links">
                                <li><a href="index.php">Home</a></li>
                                <li>
                                    <?php echo $show11['name']; ?>
                                </li>
                            </ul>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <!-- Breadcrumb Area End -->
        <!-- Shop Category Area End -->
        <div class="shop-category-area">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 order-lg-last col-md-12 order-md-first">
                        <!-- Shop Top Area Start -->
                        <div class="section-title">
                            <h2 style="text-align: center;text-transform: uppercase;font-size: 30px;font-weight: bold;">
                                <?php echo $show11['name']; ?>
                            </h2>
                        </div>
                        <!-- Shop Top Area End -->
                        <!-- Shop Bottom Area Start -->
                        <div class="shop-bottom-area mt-35">
                            <!-- Shop Tab Content Start -->
                            <div class="tab-content jump">
                                <!-- Tab One Start -->
                                <div id="shop-1" class="tab-pane active">
                                    <div class="row">
                                        <?php
                                        $sql = "select * from products where subcategory='" . $name . "'";
                                        $query = mysqli_query($conn, $sql);
                                        while ($show = mysqli_fetch_array($query)) {
                                        ?>
                                        <div class="col-xl-3 col-md-6 col-lg-4 col-sm-6 col-xs-12">
                                            <form method="post"
                                                action="shop.php?action=add&id=<?php echo $show["id"]; ?>">
                                                <article class="list-product">
                                                <div class="img-block">
                                <a href="single-product.php?id=<?php echo $show["id"]; ?>" class="thumbnail">
                                    <img class="first-img" src="<?php echo $show['image']?>" alt="" onmouseover="this.src='<?php echo $show['imghov']?>'" 
     onmouseout="this.src='<?php echo $show['image']?>'" />
                                                        </a>
                                                        <!--<div class="quick-view">
                                                        <a class="quick_view" href="#" data-link-action="quickview" title="Quick view" data-toggle="modal" data-target="#exampleModal<?php echo $show['id']; ?>">
                                                            <i class="ion-ios-search-strong"></i>
                                                        </a>
                                                    </div>-->
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
                                                                class="product-link"><?php echo $show['name']; ?></a>
                                                        </h2>
                                                        <div class="pricing-meta">
                                                            <ul>
                                                                    <!--<li class="old-price">€18.90</li>-->
                                                                    <li class="current-price">₹<?php echo $show['price'];  ?>.00</li>
                                                                    <!--<li class="discount-price">-5%</li>-->
                                                                </ul>
                                                            </div>
                                                        </div>
                                                        <div class="add-to-link">
                                                            <ul>
                                                            <input type="hidden" style="width: 56px;float: left;margin-right:10px;" name="quantity" value="1" class="form-control" />
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
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <!-- Tab One End -->
                                <!-- Tab Two Start -->
                                <!-- Tab Two End -->
                            </div>
                            <!-- Shop Tab Content End -->
                            <!--  Pagination Area Start -->
                            <!--<div class="pro-pagination-style text-center">
                                    <ul>
                                        <li>
                                            <a class="prev" href="#"><i class="ion-ios-arrow-left"></i></a>
                                        </li>
                                        <li><a class="active" href="#">1</a></li>
                                        <li><a href="#">2</a></li>
                                        <li>
                                            <a class="next" href="#"><i class="ion-ios-arrow-right"></i></a>
                                        </li>
                                    </ul>
                                </div>-->
                            <!--  Pagination Area End -->
                        </div>
                        <!-- Shop Bottom Area End -->
                    </div>
                    <!-- Sidebar Area Start -->
                    <!-- Sidebar Area End -->
                </div>
            </div>
        </div>
        <!-- Shop Category Area End -->
        <!-- Footer Area start -->
        <?php include('include/footer.php'); ?>
        <!--  Footer Area End -->
    </div>
    <?php
    $sql = "select * from products";
    $query = mysqli_query($conn, $sql);
    $show = mysqli_fetch_array($query);
    ?>
    <!-- Modal -->
    <div class="modal fade" id="exampleModal1<?php echo $show['id']; ?>" tabindex="-1" role="dialog">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span
                            aria-hidden="true">x</span></button>
                </div>
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-5 col-sm-12 col-xs-12">
                            <div class="tab-content quickview-big-img">
                                <div id="pro-1" class="tab-pane fade show active">
                                    <img src="<?php echo $show['image'] ?>" alt="" />
                                </div>
                                <div id="pro-2" class="tab-pane fade">
                                    <img src="<?php echo $show['image'] ?>" alt="" />
                                </div>
                                <div id="pro-3" class="tab-pane fade">
                                    <img src="<?php echo $show['image'] ?>" alt="" />
                                </div>
                                <div id="pro-4" class="tab-pane fade">
                                    <img src="<?php echo $show['image'] ?>" alt="" />
                                </div>
                            </div>
                            <!-- Thumbnail Large Image End -->
                            <!-- Thumbnail Image End -->
                            <div class="quickview-wrap mt-15">
                                <div class="quickview-slide-active owl-carousel nav owl-nav-style owl-nav-style-2"
                                    role="tablist">
                                    <a class="active" data-toggle="tab" href="#pro-1"><img
                                            src="<?php echo $show['image'] ?>" alt="" /></a>
                                    <a data-toggle="tab" href="#pro-2"><img src="<?php echo $show['image'] ?>"
                                            alt="" /></a>
                                    <a data-toggle="tab" href="#pro-3"><img src="<?php echo $show['image'] ?>"
                                            alt="" /></a>
                                    <a data-toggle="tab" href="#pro-4"><img src="<?php echo $show['image'] ?>"
                                            alt="" /></a>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-7 col-sm-12 col-xs-12">
                            <div class="product-details-content quickview-content">
                                <h2>Originals Kaval Windbr</h2>
                                <div class="pro-details-rating-wrap">
                                    <div class="rating-product">
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                        <i class="ion-android-star"></i>
                                    </div>
                                    <span class="read-review"><a class="reviews" href="#">Read reviews (1)</a></span>
                                </div>
                                <div class="pricing-meta">
                                    <ul>
                                        <li class="old-price not-cut">
                                            <?php echo $show['price']; ?>
                                        </li>
                                    </ul>
                                </div>
                                <div class="pro-details-size-color">
                                    <div class="pro-details-color-wrap">
                                        <span>Color</span>
                                        <div class="pro-details-color-content">
                                            <ul>
                                                <li class="blue"></li>
                                                <li class="maroon active"></li>
                                            </ul>
                                        </div>
                                    </div>
                                </div>
                                <div class="pro-details-quality">
                                    <div class="cart-plus-minus">
                                        <input class="cart-plus-minus-box" type="text" name="qtybutton" value="1" />
                                    </div>
                                    <div class="pro-details-cart btn-hover">
                                        <a href="#"> + Add To Cart</a>
                                    </div>
                                </div>
                                <div class="pro-details-wish-com">
                                    <div class="pro-details-wishlist">
                                        <a href="#"><i class="ion-android-favorite-outline"></i>Add to wishlist</a>
                                    </div>
                                    <div class="pro-details-compare">
                                        <a href="#"><i class="ion-ios-shuffle-strong"></i>Add to compare</a>
                                    </div>
                                </div>
                                <div class="pro-details-social-info">
                                    <span>Share</span>
                                    <div class="social-info">
                                        <ul>
                                            <li>
                                                <a href="#"><i class="ion-social-facebook"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-twitter"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-google"></i></a>
                                            </li>
                                            <li>
                                                <a href="#"><i class="ion-social-instagram"></i></a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal end -->
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