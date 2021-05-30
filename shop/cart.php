<?php

include_once './quantri/connect.php';
  
 
?>
<div class="container_fullwidth">

  <div class="container shopping-cart">
    <div class="row">
      <?php



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
      if (isset($_SESSION['giohang'])) {
        if (isset($_POST['sl'])) {
          foreach ($_POST['sl'] as $masp => $sl) {
            if ($sl == 0) {
              unset($_SESSION['giohang'][$masp]);
            } else if ($sl > 0) {
              $_SESSION['giohang'][$masp] = $sl;
            }
          }
        }
        $arrid = array();
        foreach ($_SESSION['giohang'] as $masp => $so) {
          $arrid[] = $masp;
        }
        $strid = implode(',', $arrid);
        $sql = "SELECT * FROM sanpham WHERE masp IN($strid) ORDER BY masp DESC";
        $query = mysqli_query($link, $sql);
      ?>
        <div class="col-md-12">
          <h3 class="title">
            Giỏ hàng
          </h3>

          <div class="clearfix">
          </div>
          <form id="giohang" method="post">
            <table class="shop-table">

              <thead>
                <tr>
                  <th>
                    Ảnh
                  </th>
                  <th>
                    Chi tiết
                  </th>
                  <th>
                    Giá bán
                  </th>
                  <th>
                    Số lượng
                  </th>
                  <th>
                    Tổng tiền
                  </th>
                  <th>
                    Xóa
                  </th>
                </tr>
              </thead>
              <tbody>
                <?php
                $totalPriceAll = 0;
                while ($row = mysqli_fetch_array($query)) {
                  $totalPrice = $row['giaban'] * $_SESSION['giohang'][$row['masp']];
                ?>
                  <tr>
                    <td>
                      <img src="quantri/anh/<?php echo $row['anh'] ?>" alt="">
                    </td>
                    <td>
                      <div class="shop-details">
                        <div class="productname">
                          <?php echo $row['tensp'] ?>
                        </div>
                        <p>
                          <img alt="" src="images/star.png">
                          <a class="review_num" href="#">
                            <?php echo $row['chitiet'] ?>
                          </a>
                        </p>

                        <p>
                          Mã sản phẩm :
                          <strong class="pcode">
                            <?php echo $row['masp'] ?>
                          </strong>
                        </p>
                      </div>
                    </td>
                    <td>
                      <h5>
                        <?php echo adddotstring($row['giaban']) ?>
                      </h5>
                    </td>
                    <td>
                      <input name="sl[<?php echo $row['masp']; ?>]" type="number" value="<?php echo $_SESSION['giohang'][$row['masp']]; ?>" min="1" max="" name="sl" style="width: 80px;" />
                    </td>
                    <td>
                      <h5>
                        <strong class="red">
                          <?php echo adddotstring($totalPrice) ?>
                      </h5>
                      </strong>
                      </h5>
                    </td>
                    <td>
                      
                      <a href="shop/xoahang.php?masp=<?php echo $row['masp'] ?>">
                        <img src="shop/images/remove.png" alt="">
                      </a>
                    </td>
                  </tr>

              </tbody>
            <?php
                  $totalPriceAll += $totalPrice;
                }
            ?>
            <tfoot>
              <tr>
                <td colspan="6">
                  
                    <button >
                      <a href="index.php">Tiếp tục mua hàng</a>
                    </button>
                  
                  <a onclick="document.getElementById('giohang').submid();"><button class=" pull-right">
                      Cập nhật giỏ hàng
                    </button></a>
                </td>
              </tr>
            </tfoot>
            </table>
          </form>
          <div class="row">
            <div class="col-md-4 col-sm-6" style="float: right;">
              <div class="shippingbox">

                <div class="grandtotal">
                  <h5>
                    Tổng tiền
                  </h5>
                  <span>
                    <?php echo adddotstring($totalPriceAll) ?>
                  </span>
                </div>
                <button style="margin-left: 50px;">
                <a href="index.php?page_layout=muahang">Thanh toán</a>
                </button>
              </div>
            </div>
          </div>
          <div class="clearfix">
          </div>
        

        </div>
        <?php
      } 
     ?>
    </div>
    <div class="clearfix">
    </div>

  </div>
  <?php
  if(!isset($_SESSION['giohang'])){
    ?>

      <h3>Không có sản phẩm trong giỏ hảng!</h3>
      <a href="index.php?page_layout=product"><button type="button" class="btn btn-primary btn-sm">Quay lại mua hàng</button></a>
  <?php
  }
?>
</div>