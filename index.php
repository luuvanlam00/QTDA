<?php
session_start();
?>
<!DOCTYPE html>
<html>

<head>
   <meta http-equiv="Content-Type" content="text/html;charset=utf-8" />
   <meta name="description" content="">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <link rel="shortcut icon" href="images/favicon.png">
   <title>Welcome </title>
   <link href="shop/css/bootstrap.css" rel="stylesheet">
   <link href='http://fonts.googleapis.com/css?family=Roboto:400,300,300italic,400italic,500,700,500italic,100italic,100' rel='stylesheet' type='text/css'>
   <link href="shop/css/font-awesome.min.css" rel="stylesheet">
   <link rel="stylesheet" href="shop/css/flexslider.css" type="text/css" media="screen" />
   <link href="shop/css/sequence-looptheme.css" rel="stylesheet" media="all" />
   <link href="shop/css/style.css" rel="stylesheet">
   <!--[if lt IE 9]><script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script><script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script><![endif]-->
</head>

<body id="home">
   <div class="wrapper">
      <div class="header">
         <div class="container">
            <div class="row">
               <div class="col-md-2 col-sm-2">
                  <div class="logo"><a href="index.php?page_layout=home"><img src="shop/images/40.png" alt="xgear" style="width: 124px;height: 63px;"></a></div>
               </div>
               <div class="col-md-10 col-sm-10">
                  <div class="header_top">
                     <div class="row">
                        <div class="col-md-3">
                           <ul class="option_nav">
                              <li class="dorpdown">
                                 <a href="#">Eng</a>
                                 <ul class="subnav">
                                    <li><a href="#">Eng</a></li>
                                    <li><a href="#">Vns</a></li>
                                    <li><a href="#">Fer</a></li>
                                    <li><a href="#">Gem</a></li>
                                 </ul>
                              </li>
                              <li class="dorpdown">
                                 <a href="#">USD</a>
                                 <ul class="subnav">
                                    <li><a href="#">USD</a></li>
                                    <li><a href="#">UKD</a></li>
                                    <li><a href="#">FER</a></li>
                                 </ul>
                              </li>
                           </ul>
                        </div>
                        <div class="col-md-6">
                           <ul class="topmenu">
                              <li><a href="#">About Us</a></li>
                              <li><a href="#">News</a></li>
                              <li><a href="#">Service</a></li>
                              <li><a href="#">Recruiment</a></li>
                              <li><a href="#">Media</a></li>
                              <li><a href="#">Support</a></li>
                           </ul>
                        </div>
                        <div class="col-md-3">
                           <ul class="usermenu">
                              <li><a href="quantri/index.php" class="log">Login</a></li>
                              <li><a href="quantri/register.php" class="reg">Register</a></li>
                           </ul>
                        </div>
                     </div>
                  </div>
                  <div class="clearfix"></div>
                  <div class="header_bottom">
                     <ul class="option">
                        <li id="search" class="search">
                           <form method="post" action="index.php?page_layout=productsearch"><input class="search-submit" type="submit" value=""><input class="search-input" placeholder="Enter your search term..." type="text" value="" name="search"></form>
                        </li>
                        <?php

                        include_once './shop/carty.php';
                        ?>
                     </ul>
                     <div class="navbar-header"><button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse"><span class="sr-only">Toggle navigation</span><span class="icon-bar"></span><span class="icon-bar"></span><span class="icon-bar"></span></button></div>
                     <div class="navbar-collapse collapse">
                        <ul class="nav navbar-nav">
                           <li>
                              <a href="index.php?page_layout=home">Trang chủ</a>

                           </li>
                           <li><a href="index.php?page_layout=product">Sản phẩm</a></li>
                           <li><a href="#">Tin tức </a></li>
                           <li><a href="#">Liên hệ</a></li>
                        </ul>
                     </div>
                  </div>
               </div>
            </div>
         </div>
      </div>
      <div class="clearfix"></div>
      <?php
      if (isset($_GET['page_layout'])) {

         switch ($_GET['page_layout']) {
            case 'home':
               include_once './shop/home.php';
               break;
            case 'cart':
               include_once './shop/cart.php';
               break;
            case 'checkout':
               include_once './shop/checkout.php';
               break;
            case 'checkout2':
               include_once './shop/checkout2.php';
               break;
            case 'details':
               include_once './shop/details.php';
               break;
            case 'product':
               include_once './shop/product.php';
               break;
            case 'productprice':
               include_once './shop/productprice.php';
               break;
            case 'productsearch':
                  include_once './shop/productsearch.php';
                  break;
            case 'muahang':
               include_once './shop/muahang.php';
               break;
            case 'hoanthanh':
               include_once './shop/hoanthanh.php';
               break;
         }
      } else {
         include_once './shop/home.php';
      }

      ?>
      <div class="clearfix"></div>
      <div class="footer">
         <div class="footer-info">
            <div class="container">
               <div class="row">
                  <div class="col-md-3">
                     <div class="footer-logo"><a href="#"><img src="shop/images/40.png" alt=""></a></div>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h4 class="title">Contact <strong>Info</strong></h4>
                     <p>No. 08, Nguyen Trai, Hanoi , Vietnam</p>
                     <p>Call Us : (084) 1900 1008</p>
                     <p>Email : michael@leebros.us</p>
                  </div>
                  <div class="col-md-3 col-sm-6">
                     <h4 class="title">Customer<strong> Support</strong></h4>
                     <ul class="support">
                        <li><a href="#">FAQ</a></li>
                        <li><a href="#">Payment Option</a></li>
                        <li><a href="#">Booking Tips</a></li>
                        <li><a href="#">Infomation</a></li>
                     </ul>
                  </div>
                  <div class="col-md-3">
                     <h4 class="title">Get Our <strong>Newsletter </strong></h4>
                     <p>Lorem ipsum dolor ipsum dolor.</p>
                     <form class="newsletter">
                        <input type="text" name="" placeholder="Type your email....">
                        <input type="submit" value="SignUp" class="button">
                     </form>
                  </div>
               </div>
            </div>
         </div>
         <div class="copyright-info">
            <div class="container">
               <div class="row">
                  <div class="col-md-6">
                     <p>Copyright © 2012. Designed by <a href="#">Michael Lee</a>. All rights reseved</p>
                  </div>
                  <div class="col-md-6">
                     <ul class="social-icon">
                        <li><a href="#" class="linkedin"></a></li>
                        <li><a href="#" class="google-plus"></a></li>
                        <li><a href="#" class="twitter"></a></li>
                        <li><a href="#" class="facebook"></a></li>
                     </ul>
                  </div>
               </div>
            </div>
         </div>
      </div>
   </div>

   <!-- Bootstrap core JavaScript==================================================-->
   <script type="text/javascript" src="shop/js/jquery-1.10.2.min.js"></script>
   <script type="text/javascript" src="shop/js/jquery.easing.1.3.js"></script>
   <script type="text/javascript" src="shop/js/bootstrap.min.js"></script>
   <script type="text/javascript" src="shop/js/jquery.sequence-min.js"></script>
   <script type="text/javascript" src="shop/js/jquery.carouFredSel-6.2.1-packed.js"></script>
   <script defer src="shop/js/jquery.flexslider.js"></script>
   <script type="text/javascript" src="shop/js/script.min.js"></script>
</body>

</html>