<?php include('connect.php'); ?>

<meta charset="UTF-8" />

  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <meta http-equiv="X-UA-Compatible" content="ie=edge" />
  <title>Nitid Knotz</title>
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="images/Icon.png" />
  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,600,600i,700,700i,800&display=swap" rel="stylesheet" />
  <link href="https://fonts.googleapis.com/css?family=Allura&display=swap" rel="stylesheet">
  <link href="https://fonts.googleapis.com/css2?family=Tangerine&display=swap" rel="stylesheet">



  <!-- All CSS Flies   -->

  <!--===== Main Css Files =====-->
    <link rel="stylesheet" href="assets/css/style.css" /> 

  <!--====== Use the minified version files listed below for better performance and remove the files listed above ======-->
  <link rel="stylesheet" href="assets/css/vendor/plugins.min.css">
  <link rel="stylesheet" href="assets/css/style.min.css">
  <link rel="stylesheet" href="assets/css/responsive.min.css">
  <style>

    .current-price {
    color: #4fb68d;
    font-size: 20px;
    font-weight: bold;
}

  .dropbtn {
    background-color: #ffffff;
    color: #253237;
    font-weight: bold;
    font-size: 15px;
    /* line-height: 34px; */
    /* margin-top: 15px; */
    border: none;
    padding: 15px 11px 18px 16px;
  }

  .dropdown {
    position: relative;
    display: inline-block;
    top: 0px;
  }

  .dropdown-content {
    display: none;
    position: absolute;
    background-color: #253237;
    min-width: 112px;
    box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
    z-index: 1;
  }

  .dropdown-content a {
    color: white;
    padding: 12px 16px;
    font-weight:bold;
    text-decoration: none;
    display: block;
    border-top:solid 1px white;
  }

  .dropdown-content a:hover {
    color:#4fb68d;
  }

  .menu-dropdown:hover .dropdown-content {
    display: block;
    position: absolute;
    z-index: 2;
  }

  .dropdown:hover .dropbtn {
    color:#4fb68d;
  }
  
  </style>