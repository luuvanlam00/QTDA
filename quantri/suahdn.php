<?php
include_once './connect.php';
$ma = $_GET['id_hd'];
$sql = "select * from hdn where id_hd='$ma'";
$result=mysqli_query($link,$sql);
$sqlncc = "select * from ncc ";
$resultncc = mysqli_query($link, $sqlncc);

if (isset($_POST['sua'])) {
  
        $ten = $_POST['ten'];
        $ncc = $_POST['ncc'];
        $ngay=$_POST['ngay'];
        $nd= $_POST['nd'];
        $sql = "update hdn set mancc='$ncc',ngaynhap='$ngay',ten='$ten',noidung='$nd ' where id_hd=$ma";
        mysqli_query($link, $sql);
        echo '<script>window.location="quantri.php?page_layout=hdn"</script>';
        
    }

?>


<div class="ibox-content">
    <h1>Sửa hóa đơn nhập</h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
        ?>
            <div class="form-group"><label class="col-sm-2 control-label">Nhà cung cấp</label>
                <div class="col-sm-10"><select class="form-control m-b" name="ncc">
                        <?php

                        while ($rowncc = mysqli_fetch_array($resultncc)) {
                        ?>
                            <option <?php
                                    if ($row['mancc'] == $rowncc['mancc']) {
                                        echo 'selected="selected"';
                                    } ?> value="<?php echo $rowncc['mancc'] ?>"><?php echo $rowncc['tenncc'] ?></option>

                        <?php
                        }
                        ?>
                    </select>
                </div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Ngày nhập</label>

                <div class="col-sm-10"><input type="date" class="form-control" name="ngay"  value="<?php echo $row['ngaynhap']?>"/></div>
            </div>
            <div class="form-group"><label class="col-sm-2 control-label">Tên người giao</label>

                <div class="col-sm-10"><input type="text" required="" class="form-control" name="ten"  value="<?php echo $row['ten']?>"/></div>
            </div>

            <div class="form-group"><label class="col-sm-2 control-label">Nội dung</label>

                <div class="col-sm-10"><textarea require="" class="form-control" name="nd"> <?php echo $row['noidung']?></textarea></div>
            </div>
        <?php
        }
        ?>

        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit" name="sua">Sửa</button>

            </div>
        </div>
    </form>
</div>