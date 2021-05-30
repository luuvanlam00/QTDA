<?php


include_once './quantri/connect.php';
$sql = "select  * from sanpham  limit 0,4  ";
$result = mysqli_query($link, $sql);
$sql2 = "select  from sanpham  limit 5,4";
$result2 = mysqli_query($link, $sql2);
$sql1 = "select * from sanpham  order by tensp asc limit 4";
$result1 = mysqli_query($link, $sql1);
$sql3 = "select * from sanpham  order by tensp desc limit 4";
$result3 = mysqli_query($link, $sql3);
function adddotstring($strNum)
{

   $len = strlen($strNum);
   $counter = 3;
   $result = "";
   while ($len - $counter >= 0) {
      $con = substr($strNum, $len - $counter, 3);
      $result = '.' . $con . $result;
      $counter += 3;
   }
   $con = substr($strNum, 0, 3 - ($counter - $len));
   $result = $con . $result;
   if (substr($result, 0, 1) == '.') {
      $result = substr($result, 1, $len + 1);
   }
   return $result;
}
?>
<div class="hom-slider">
   <div class="container">
      <div id="sequence">
         
      </div>
   </div>
   <div class="promotion-banner">
      <div class="container">
         <div class="row">
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="shop/images/28.jpg" alt=""></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="shop/images/29.jpg" alt=""></div>
            </div>
            <div class="col-md-4 col-sm-4 col-xs-4">
               <div class="promo-box"><img src="shop/images/30.jpg" alt=""></div>
            </div>
         </div>
      </div>
   </div>
</div>
<div class="clearfix"></div>
<div class="container_fullwidth">
   <div class="container">
      <div class="hot-products">
         <h3 class="title"><strong>Hot</strong> Products</h3>
         <div class="control"><a id="prev_hot" class="prev" href="#">&lt;</a><a id="next_hot" class="next" href="#">&gt;</a></div>

         <ul id="hot">

            <li>
               <div class="row">
                  <?php
                  while ($r = mysqli_fetch_assoc($result)) {
                  ?>
                     <div class="col-md-3 col-sm-6">
                        <div class="products">
                           <div class="offer">- <?php echo ceil(($r['giaban'] - $r['giakm']) * 100 / $r['giaban']) ?>%</div>
                           <div class="thumbnail"><a href="index.php?page_layout=details&masp=<?php echo $r['masp'] ?>"><img src="quantri/anh/<?php echo $r['anh'] ?>" alt="Product Name" width="230px" height="280px"></a></div>
                           <div class="productname"><?php echo $r['tensp'] ?></div>
                           <h4 class="price"><?php echo adddotstring($r['giakm']) ?> VND</h4>
                           <div class="button_group"><a class="button add-cart" href="index.php?page_layout=details&masp=<?php echo $r['masp'] ?>">Đặt mua</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </li>


            <li>
               <div class="row">
                  <?php
                  while ($r2 = mysqli_fetch_assoc($result2)) {
                  ?>
                     <div class="col-md-3 col-sm-6">
                        <div class="products">
                           <div class="offer">- <?php echo ceil(($r2['giaban'] - $r2['giakm']) * 100 / $r2['giaban']) ?>%</div>
                           <div class="thumbnail"><a href="index.php?page_layout=details&masp=<?php echo $r2['masp'] ?>"><img src="quantri/anh/<?php echo $r2['anh'] ?>" alt="Product Name" width="230px" height="280px"></a></div>
                           <div class="productname"><?php echo $r2['tensp'] ?></div>
                           <h4 class="price"><?php echo adddotstring($r2['giakm']) ?> VND</h4>
                           <div class="button_group"><a class="button add-cart" href="index.php?page_layout=details&masp=<?php echo $r2['masp'] ?>">D</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                        </div>
                     </div>

                  <?php
                  }
                  ?>
               </div>
            </li>
         </ul>

      </div>
      <div class="clearfix"></div>
      <div class="featured-products">
         <h3 class="title"><strong>Featured </strong> Products</h3>
         <div class="control"><a id="prev_featured" class="prev" href="#">&lt;</a><a id="next_featured" class="next" href="#">&gt;</a></div>
         <ul id="featured">
            <li>
               <div class="row">
                  <?php
                  while ($r1 = mysqli_fetch_assoc($result1)) {
                  ?>
                     <div class="col-md-3 col-sm-6">
                        <div class="products">
                           <div class="thumbnail"><a href="index.php?page_layout=details&masp=<?php echo $r1['masp'] ?>"><img src="quantri/anh/<?php echo $r1['anh'] ?>" alt="Product Name" width="230px" height="280px"></a></div>
                           <div class="productname"><?php echo $r1['tensp'] ?></div>
                           <h4 class="price"><?php echo adddotstring($r1['giakm']) ?> VND</h4>
                           <div class="button_group"><a class="button add-cart" href="index.php?page_layout=details&masp=<?php echo $r1['masp'] ?>">Đặt mua</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>
               </div>
            </li>
            <li>
               <div class="row">
                  <?php
                  while ($r3 = mysqli_fetch_assoc($result3)) {
                  ?>
                     <div class="col-md-3 col-sm-6">
                        <div class="products">
                           <div class="thumbnail"><a href="index.php?page_layout=details&masp=<?php echo $r3['masp'] ?>"><img src="quantri/anh/<?php echo $r3['anh'] ?>" alt="Product Name" width="230px" height="280px"></a></div>
                           <div class="productname"><?php echo $r3['tensp'] ?></div>
                           <h4 class="price"><?php echo adddotstring($r3['giakm']) ?> VND</h4>
                           <div class="button_group"><a class="button add-cart" href="index.php?page_layout=details&masp=<?php echo $r3['masp'] ?>">Đặt mua</a><button class="button compare" type="button"><i class="fa fa-exchange"></i></button><button class="button wishlist" type="button"><i class="fa fa-heart-o"></i></button></div>
                        </div>
                     </div>
                  <?php
                  }
                  ?>

               </div>
            </li>
         </ul>
      </div>
      <div class="clearfix"></div>

   </div>
</div>

