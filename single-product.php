<?php include('connect.php'); 
	session_start();
	if(isset($_GET['id'])){
	$image_id=$_GET['id'];
}

	if(isset($_POST["add_to_cart"]))
{
	if(isset($_SESSION["shopping_cart"]))
	{
		$item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
		if(!in_array($_GET["id"], $item_array_id))
		{
			$count = count($_SESSION["shopping_cart"]);
			$item_array = array(
				'item_id'			=>	$_GET["id"],
				'item_name'			=>	$_POST["hidden_name"],
				'item_price'		=>	$_POST["hidden_price"],
				'item_quantity'		=>	$_POST["quantity"]
			);
			$_SESSION["shopping_cart"][$count] = $item_array;
		}
		else
		{
			echo '<script>alert("Item Already Added")</script>';
		}
	}
	else
	{
		$item_array = array(
			'item_id'			=>	$_GET["id"],
			'item_name'			=>	$_POST["hidden_name"],
			'item_price'		=>	$_POST["hidden_price"],
			'item_quantity'		=>	$_POST["quantity"]
		);
		$_SESSION["shopping_cart"][0] = $item_array;
	}
}

if (isset($_POST["buy_now"])) {
    if (isset($_SESSION["shopping_cart"])) {
        $item_array_id = array_column($_SESSION["shopping_cart"], "item_id");
        if (!in_array($_GET["id"], $item_array_id)) {
            $count = count($_SESSION["shopping_cart"]);
            $item_array = array(
                'item_id'			=>	$_GET["id"],
                'item_name'			=>	$_POST["hidden_name"],
                'item_price'		=>	$_POST["hidden_price"],
                'item_quantity'		=>	$_POST["quantity"]
            );
            $_SESSION["shopping_cart"][$count] = $item_array;
        } else {
            echo '<script>alert("Item Already Added")</script>';
        }
    } else {
        $item_array = array(
            'item_id'			=>	$_GET["id"],
            'item_name'			=>	$_POST["hidden_name"],
            'item_price'		=>	$_POST["hidden_price"],
            'item_quantity'		=>	$_POST["quantity"]
        );
        $_SESSION["shopping_cart"][0] = $item_array;
    }

    // Redirect to checkout.php
    header("Location: checkout.php");
    exit();
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
                                <h1 class="breadcrumb-hrading">Single Product</h1>
                                <ul class="breadcrumb-links">
                                    <li><a href="index.php">Home</a></li>
                                    <li>Single Product</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Breadcrumb Area End -->
            <!-- Shop details Area start -->
            <section class="product-details-area mtb-60px">
                <div class="container">
                    <div class="row">
					<?php
                        $sql1 = "SELECT * from products where id='$image_id'";
                        $result1 = mysqli_query($conn,$sql1);
                        $rowc1 = mysqli_fetch_assoc($result1);	
                    ?>
                        <div class="col-xl-6 col-lg-6 col-md-12">
                            <div class="product-details-img product-details-tab">
                                <div class="zoompro-wrap zoompro-2">
                                    <div class="zoompro-border zoompro-span">
                                        <img class="zoompro" src="<?php echo $rowc1['image']; ?>" data-zoom-image="<?php echo $rowc1['image']; ?>" alt="" />
                                    </div>
                                </div>
                               <!-- <div id="gallery" class="product-dec-slider-2">
                                    <a class="active" data-image="assets/images/product-image/organic/product-11.jpg" data-zoom-image="assets/images/product-image/organic/zoom/1.jpg">
                                        <img src="assets/images/product-image/organic/product-11.jpg" alt="" />
                                    </a>
                                    <a data-image="assets/images/product-image/organic/product-9.jpg" data-zoom-image="assets/images/product-image/organic/zoom/2.jpg">
                                        <img src="assets/images/product-image/organic/product-9.jpg" alt="" />
                                    </a>
                                    <a data-image="assets/images/product-image/organic/product-20.jpg" data-zoom-image="assets/images/product-image/organic/zoom/3.jpg">
                                        <img src="assets/images/product-image/organic/product-20.jpg" alt="" />
                                    </a>
                                    <a data-image="assets/images/product-image/organic/product-19.jpg" data-zoom-image="assets/images/product-image/organic/zoom/4.jpg">
                                        <img src="assets/images/product-image/organic/product-19.jpg" alt="" />
                                    </a>
                                </div>-->
                            </div>
                        </div>
                        <div class="col-xl-6 col-lg-6 col-md-12">
						    <form method="post" action="single-product.php?action=add&id=<?php echo $rowc1["id"]; ?>">
                                <div class="product-details-content" style="color: black">
                                    <h1><?php echo $rowc1['name']; ?></h1>
                                    <div class="pricing-meta">
                                        <ul>
                                            <!--<li class="old-price">€18.90</li>-->
                                            <li class="current-price" style="font-size: 25px">₹<?php echo $rowc1['price'];  ?>.00</li>
                                            <!--<li class="discount-price">-5%</li>-->
                                            <p style="color: grey">(Inclusive of all taxes)</p>
                                        </ul>
                                    </div>
                                    <p class="product-desc-wrap"><?php echo $rowc1['descr']; ?></p>
                                    <h4>Quantity</h4>
                                        <input style="width: 60px; margin-top: 5px;" type="number" name="quantity" value="1" class="form-control"  min="1" max="5">
                                        <input type="hidden" name="hidden_name" value="<?php echo $rowc1["name"]; ?>" />
                                        <input type="hidden" name="hidden_price" value="<?php echo $rowc1["price"]; ?>" />
                                        <button class="shop-bttn animated" type="submit" name="add_to_cart"><i style="font-size: 24px;" class="fa fa-shopping-bag"></i>
                                            Add To Basket
                                        </button>
                                        <button class="shop-bttn animated" type="submit" name="buy_now"><i style="font-size: 24px; position: relative; top:4px" class="fas fa-money-check-alt"></i>
                                            Buy Now
                                        </button>
                                        
                                </div>
                                <div class="pro-details-policy">
                                    <p><i class="fas fa-shipping-fast" style="color: #ecb37e" alt=""></i> Free Delivery on all orders within India</p>
                                    <p><i class="fas fa-people-carry" style="color: #ecb37e"></i><a href="refund-policy.php"> Returns & Exchange</a></p>
                                
                                    <div class="section-break" style="font-size: 17px; margin: 20px 0 10px;">
                                        <span>Product Details</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-icon-P1l">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <table style="border-collapse: collapse; width: 50%;">
                                        <tbody style="background-color: #ffffff85;">
                                            <tr>
                                            <th style="border: 1px solid black; padding: 8px;">Material</th>
                                            <td class="product-material" style="border: 1px solid black; padding: 8px;"><?php echo $rowc1["material"]; ?></td>
                                            </tr>
                                            <tr>
                                            <th style="border: 1px solid black; padding: 8px;">Embroidery Style</th>
                                            <td class="product-material" style="border: 1px solid black; padding: 8px;"><?php echo $rowc1["subcategory"]; ?></td>
                                            </tr>
                                            <tr>
                                            <th style="border: 1px solid black; padding: 8px;">Occasion</th>
                                            <td class="product-material" style="border: 1px solid black; padding: 8px;"><?php echo $rowc1["category"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>

                                    <div class="section-break" style="font-size: 17px; margin: 20px 0 10px;">
                                        <span>Wash Care</span>
                                        <span>
                                            <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" viewBox="0 0 24 24" fill="none" stroke="currentColor" stroke-width="2" stroke-linecap="round" stroke-linejoin="round" class="icon-icon-P1l">
                                                <line x1="5" y1="12" x2="19" y2="12"></line>
                                            </svg>
                                        </span>
                                    </div>
                                    <table style="border-collapse: collapse; width: 50%;">
                                        <tbody style="background-color: #ffffff85;">
                                            <tr>
                                            <th style="border: 1px solid black; padding: 8px;">Fabric Care</th>
                                            <td class="product-material" style="border: 1px solid black; padding: 8px;"><?php echo $rowc1["care"]; ?></td>
                                            </tr>
                                        </tbody>
                                    </table>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </section>
            <!-- Shop details Area End -->
            <!-- product details description area start -->
            
           
            <?php include('include/footer.php'); ?>
            <!--  Footer Area End -->
        </div>
        <!-- Scripts to be loaded  -->
        <!-- JS============================================ -->
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
