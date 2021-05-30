<?php

include_once './quantri/connect.php';
$masp = $_GET['masp'];
$sql = "select * from sanpham where masp='$masp'";
$result = mysqli_query($link, $sql);

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
<style>
  #comment {
    padding: 15px 0;
  }

  #comment h3 {
    font-size: 15px;
    font-weight: bold;
    color: #000;
    text-transform: capitalize;
    margin: 0 0 15px 0;
  }

  #comment input,
  #comment textarea {
    border-radius: 0;
  }

  #comment textarea {
    height: 250px;
  }

  #comments {
    padding: 15px 0;
  }

  #comments ul {
    border-bottom: 1px dotted #ccc;
  }

  #comments ul li {
    list-style: none;
  }

  #comments ul li.comm-name {
    font-weight: bold;
    color: #000;
  }

  #comments ul li.comm-details {
    line-height: 18px;
    padding: 10px 0;
  }
</style>
<div class="container_fullwidth">
  <div class="container">
    <div class="row">
      <div class="col-md-9">
        <div class="products-details">
          <div class="preview_image">
            <div class="preview-small">
              <?php
              $r = mysqli_fetch_assoc($result) 
              ?>
                <img id="zoom_03" src="quantri/anh/<?php echo $r['anh'] ?>" alt="">


            </div>


          </div>
          <div class="products-description">
            <h5 class="name">
              <?php echo $r['tensp'] ?>
            </h5>

            <p>

              <span class=" light-red">
                Tình trạng:Còn hàng
              </span>
            </p>
            <p>
              <?php echo $r['chitiet'] ?>
            </p>
            <hr class="border">
            <div class="price">
              Giá :
              <span class="new_price">
                <?php echo adddotstring($r['giakm']) ?>
                <sup>
                  VND
                </sup>
              </span>
              <span class="old_price">
                <?php echo adddotstring($r['giaban']) ?>
                <sup>
                  VND
                </sup>
              </span>
            </div>

            <hr class="border">
       
            <div class="wided">
              <div class="button_group" style="float: left;">
                <a  href="shop/themhang.php?masp=<?php echo $r['masp'] ?>"><button class="button">Đặt mua</button>
                  
                </a>
                <button class="button compare">
                  <i class="fa fa-exchange">
                  </i>
                </button>
                <button class="button favorite">
                  <i class="fa fa-heart-o">
                  </i>
                </button>
                <button class="button favorite">
                  <i class="fa fa-envelope-o">
                  </i>
                </button>
              </div>
            </div>
            <div class="clearfix">
            </div>
            <hr class="border">
            <img src="images/share.png" alt="" class="pull-right">
          </div>
        </div>
        <div class="clearfix">
        </div>
        <div class="tab-box">
          <div id="tabnav">
            <ul>
              <li>
                <a href="#Descraption">
                  Mô tả
                </a>
              </li>
            </ul>
          </div>
          <div class="tab-content-wrap">
            <div class="tab-content" id="Descraption">
              <p>
                <?php echo $r['mota'] ?>
              </p>

            </div>
          
          <div class="tab-content" id="Reviews">
            <form>
              <table>
                <thead>
                  <tr>
                    <th>
                      &nbsp;
                    </th>
                    <th>
                      1 star
                    </th>
                    <th>
                      2 stars
                    </th>
                    <th>
                      3 stars
                    </th>
                    <th>
                      4 stars
                    </th>
                    <th>
                      5 stars
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <tr>
                    <td>
                      Quality
                    </td>
                    <td>
                      <input type="radio" name="quality" value="Blue" />
                    </td>
                    <td>
                      <input type="radio" name="quality" value="">
                    </td>
                    <td>
                      <input type="radio" name="quality" value="">
                    </td>
                    <td>
                      <input type="radio" name="quality" value="">
                    </td>
                    <td>
                      <input type="radio" name="quality" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Price
                    </td>
                    <td>
                      <input type="radio" name="price" value="">
                    </td>
                    <td>
                      <input type="radio" name="price" value="">
                    </td>
                    <td>
                      <input type="radio" name="price" value="">
                    </td>
                    <td>
                      <input type="radio" name="price" value="">
                    </td>
                    <td>
                      <input type="radio" name="price" value="">
                    </td>
                  </tr>
                  <tr>
                    <td>
                      Value
                    </td>
                    <td>
                      <input type="radio" name="value" value="">
                    </td>
                    <td>
                      <input type="radio" name="value" value="">
                    </td>
                    <td>
                      <input type="radio" name="value" value="">
                    </td>
                    <td>
                      <input type="radio" name="value" value="">
                    </td>
                    <td>
                      <input type="radio" name="value" value="">
                    </td>
                  </tr>
                </tbody>
              </table>
              <div class="row">
                <div class="col-md-6 col-sm-6">
                  <div class="form-row">
                    <label class="lebel-abs">
                      Your Name
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="text" name="" class="input namefild">
                  </div>
                  <div class="form-row">
                    <label class="lebel-abs">
                      Your Email
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="email" name="" class="input emailfild">
                  </div>
                  <div class="form-row">
                    <label class="lebel-abs">
                      Summary of You Review
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <input type="text" name="" class="input summeryfild">
                  </div>
                </div>
                <div class="col-md-6 col-sm-6">
                  <div class="form-row">
                    <label class="lebel-abs">
                      Your Name
                      <strong class="red">
                        *
                      </strong>
                    </label>
                    <textarea class="input textareafild" name="" rows="7">
                            </textarea>
                  </div>
                  <div class="form-row">
                    <input type="submit" value="Submit" class="button">
                  </div>
                </div>
              </div>
            </form>
          </div>
          <div class="tab-content">
            <div class="review">
              <p class="rating">
                <i class="fa fa-star light-red">
                </i>
                <i class="fa fa-star light-red">
                </i>
                <i class="fa fa-star light-red">
                </i>
                <i class="fa fa-star-half-o gray">
                </i>
                <i class="fa fa-star-o gray">
                </i>
              </p>
              <h5 class="reviewer">
                Reviewer name
              </h5>
              <p class="review-date">
                Date: 01-01-2014
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien est, malesuada non interdum id, cursus vel neque.
              </p>
            </div>
            <div class="review">
              <p class="rating">
                <i class="fa fa-star light-red">
                </i>
                <i class="fa fa-star light-red">
                </i>
                <i class="fa fa-star light-red">
                </i>
                <i class="fa fa-star-half-o gray">
                </i>
                <i class="fa fa-star-o gray">
                </i>
              </p>
              <h5 class="reviewer">
                Reviewer name
              </h5>
              <p class="review-date">
                Date: 01-01-2014
              </p>
              <p>
                Lorem ipsum dolor sit amet, consectetur adipiscing elit. Integer a eros neque. In sapien est, malesuada non interdum id, cursus vel neque.
              </p>
            </div>
          </div>
          <div class="tab-content" id="tags">
            <div class="tag">
              Add Tags :
              <input type="text" name="">
              <input type="submit" value="Tag">
            </div>
          </div>
          </div>
        </div>
        <div class="clearfix">
        </div>
        <?php
        if (isset($_POST['submit'])) {
          $ten = $_POST['ten'];
          $binh_luan = $_POST['binh_luan'];
          $ngay_gio = date('Y-m-d H:i:s');

          if (isset($ten) && isset($binh_luan)) {
            $sql = "INSERT INTO binhluan(masp,ten,noidung,ngay) VALUES('$masp','$ten','$binh_luan','$ngay_gio')";
            $query = mysqli_query($link, $sql);
            echo '<script>window.location="index.php?page_layout=details&masp=' . $masp . '" </script>';
          }
        }
        ?>
        <div id="comment" class="col-md-8 col-sm-9 col-xs-12">
          <h3 style="margin-bottom: 30px;">Bình luận sản phẩm</h3>
          <form method="post" action="index.php?page_layout=details&masp=<?php echo $masp; ?>">
            <div class="form-group">
              <label style="margin-bottom:15px;">Tên</label>
              <input type="text" name="ten" required="" class="form-control" placeholder="Tên">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1" style="margin-bottom:15px;">Nội dung</label>
              <textarea class="form-control" name="binh_luan" required="" placeholder="Nội Dung"></textarea>
            </div>
            <button type="submit" name="submit" class="btn btn-default">Bình luận</button>
          </form>
        </div>
        <?php
        if (isset($_GET['page'])) {
          $page = $_GET['page'];
        } else {
          $page = 1;
        }
        $rowPerPage = 3;
        $perRow = $page * $rowPerPage - $rowPerPage;
        $sqlbl = "SELECT * FROM binhluan WHERE masp=$masp  LIMIT $perRow,$rowPerPage";
        $querybl = mysqli_query($link, $sqlbl);

        $totalRow = mysqli_num_rows(mysqli_query($link, "SELECT * FROM binhluan WHERE masp=$masp"));
        $totalPage = ceil($totalRow / $rowPerPage);
        $list_page = "";
        for ($i = 1; $i <= $totalPage; $i++) {
          if ($page == $i) {
            $list_page .= '<li class="active"><a href="index.php?page_layout=details&masp=' . $masp . '&page=' . $i . '">' . $i . '</a></li>';
          } else {
            $list_page .= '<li><a href="index.php?page_layout=details&masp=' . $masp . '&page=' . $i . '">' . $i . '</a></li>';
          }
        }
        $rowbl = mysqli_num_rows($querybl);
        if ($rowbl > 0) {
        ?>
          <div id="comments" class="col-md-12 col-sm-12 col-xs-12">
            <?php
            while ($row = mysqli_fetch_array($querybl)) {
            ?>
              <ul>
                <li class="comm-name"><?php echo $row['ten']; ?></li>
                <li class="comm-time"><?php echo $row['ngay']; ?></li>
                <li class="comm-details">
                  <p>
                    <?php echo $row['noidung']; ?>
                  </p>
                </li>
              </ul>
            <?php
            }
            ?>
          </div>
        <?php
        }
        ?>
        <div id="pagination" class="col-md-12 col-sm-12 col-xs-12" style="margin-left: 790px;">
          <nav aria-label="Page navigation">
            <ul class="pagination">
              <?php
              echo $list_page;
              ?>
            </ul>
          </nav>
        </div>
        <div class="clearfix">
        </div>
      </div>
      <div class="col-md-3">
        <div class="special-deal leftbar">
          <h4 class="title">
            Special
            <strong>
              Deals
            </strong>
          </h4>
          <?php
            $s = "select * from sanpham limit 6";
            $re = mysqli_query($link, $s);
            while ($row = mysqli_fetch_assoc($re)) {
            ?>
          <div class="special-item">
           
              <div class="product-image">
                <a href="#">
                  <img src="quantri/anh/<?php echo $row['anh'] ?>" alt="" style="width: px; height: 60px;">
                </a>
              </div>
              <div class="product-info">
                <p>
                  <?php echo $row['tensp'] ?>
                </p>
                <h5 class="price">
                  <?php echo adddotstring($row['giakm']) ?> VND
                </h5>
              </div>
           
          </div>
          <?php
            }
            ?>
        </div>



      </div>
    </div>
    <div class="clearfix">
    </div>

  </div>
</div>