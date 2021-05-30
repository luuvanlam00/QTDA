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
            if ($_SESSION['giohang']) {
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
                $sql = "SELECT * FROM sanpham WHERE masp IN($strid) ";
                $query = mysqli_query($link, $sql);
               
                if (isset($_POST['submit'])) {
                    $ten = $_POST['name'];
                    $email = $_POST['email'];
                    $sdt = $_POST['dt'];
                    $diachi = $_POST['add'];
                    $sql = "insert into khachhang(tenkh,email,sdt) values('$ten','$email','$sdt')";
                    mysqli_query($link, $sql);
        
                    $tt="Xác nhận";
                    $ngay = date('Y-m-d H:i:s');
                    $sql1="insert into hoadon(thoigian,tenkh,diachi,trangthai) values('$ngay','$ten','$diachi','$tt')";
                    mysqli_query($link, $sql1);
                    $sql2="select * from hoadon order by id_hd desc";
                    $r12=mysqli_query($link, $sql2);
                    if($r=mysqli_fetch_assoc($r12)){
                        $id_hd=$r['id_hd'];
                        while ($row = mysqli_fetch_array($query)){
                        $masp=$row['masp']; 
                        $soluong=$_SESSION['giohang'][$row['masp']];
                        $giaban=$row['giaban'];
                        $sql3="insert into cthd(id_hd,masp,giaban,soluong) values('$id_hd','$masp','$giaban','$soluong')";
                        mysqli_query($link, $sql3);}
                    }
                   
                   
                    
                }
                
            ?>
                <div class="col-md-12">
                    <h3 class="title">
                        Xác nhận đơn thanh toán
                    </h3>

                    <div class="clearfix">
                    </div>
                    <form id="giohang" method="post">
                        <table class="shop-table">

                            <thead>
                                <tr>
                                    <th>
                                        Tên sản phẩm
                                    </th>
                                    <th>
                                        Giá bán
                                    </th>
                                    <th>
                                        Số lượng
                                    </th>
                                    <th>
                                        Thành tiền
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

                                            <div class="productname">
                                                <?php echo $row['tensp'] ?>
                                            </div>


                                        </td>
                                        <td>
                                            <h5>
                                                <?php echo adddotstring($row['giaban']) ?>
                                            </h5>
                                        </td>

                                        <td>
                                            <h5>

                                                <?php echo $_SESSION['giohang'][$row['masp']]; ?>
                                            </h5>

                                            </h5>
                                        </td>
                                        <td>
                                            <h5> <?php echo adddotstring($row['giaban']) ?></h5>
                                        </td>
                                    </tr>

                            </tbody>
                        <?php
                                    $totalPriceAll += $totalPrice;
                                }
                        ?>
                        <tfoot>
                            <tr>

                                <td>
                                    <H5>Tổng giá trị hóa đơn:</H5>
                                </td>
                                <td colspan="2"></td>
                                <td><b><span>
                                            <h5><?php echo adddotstring($totalPriceAll); ?></h5>
                                        </span></b></td>


                            </tr>
                        </tfoot>
                        </table>
                    </form>

                    <div class="clearfix">
                    </div>


                </div>
            <?php
            }
            ?>
            <?php
            if (isset($_POST['submit'])) {
                $ten = $_POST['name'];
                $email = $_POST['email'];
                $sdt = $_POST['dt'];
                $diachi = $_POST['add'];
                if (isset($ten) && isset($email) && isset($sdt) && isset($diachi)) {
                    if (isset($_SESSION['giohang'])) {
                        $arrid = array();
                        foreach ($_SESSION['giohang'] as $masp => $sl) {
                            $arrid[] = $masp;
                        }
                        $strId = implode(',', $arrid);
                        $sql = "SELECT * FROM sanpham WHERE masp IN($strId) ORDER BY masp DESC";
                        $query = mysqli_query($link, $sql);
                        
                        unset($_SESSION['giohang']);
                        echo '<script>window.location="index.php?page_layout=hoanthanh"</script>';
                    }
           
                    }
                }
            
            ?>
        </div>
     
        <div class="clearfix">
        </div>
        <div id="custom-form" class="col-md-6 col-sm-8 col-xs-12" style="margin-top: 20px;">
            <form method="post">
                <div class="form-group">
                    <label>
                        <h6>Tên khách hàng</h6>
                    </label>
                    <input required type="text" class="form-control" name="name">
                </div>
                <div class="form-group">
                    <label>
                        <h6>Địa chỉ Email</h6>
                    </label>
                    <input required type="text" class="form-control" name="email">
                </div>
                <div class="form-group">
                    <label>
                        <h6>Số điện thoại</h6>
                    </label>
                    <input required type="text" class="form-control" name="dt">
                </div>
                <div class="form-group">
                    <label>
                        <h6>Địa chỉ nhận hàng</h6>
                    </label>
                    <input required type="text" class="form-control" name="add">
                </div>
                <button class="btn btn-info" name="submit">Mua hàng</button>
            </form>
        </div>

    </div>

</div>