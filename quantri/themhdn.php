<?php
include_once './connect.php';

if (isset($_POST['them'])) {
    $ten = $_POST['ten'];
    $ncc = $_POST['ncc'];
    $ngay=$_POST['ngay'];
    $nd= $_POST['nd'];
    $sql = "insert into hdn(mancc,ngaynhap,ten,noidung) values('$ncc','$ngay','$ten','$nd')";
    mysqli_query($link, $sql);
    echo '<script>window.location="quantri.php?page_layout=hdn"</script>';
    
}
if (isset($_POST['lm'])) {
    $ten = "";
    $ngay = "";
    $nd = "";
   
}


?>
<div class="ibox-content">
    <h1>Thêm mới hóa đơn nhập</h1>
    <form method="post" class="form-horizontal" enctype="multipart/form-data">
        <div class="form-group"><label class="col-sm-2 control-label">Nhà cung cấp</label>
            <div class="col-sm-10"><select class="form-control m-b" name="ncc">
                    <?php
                    $sql = "select * from ncc";
                    $result = mysqli_query($link, $sql);
                    while ($row = mysqli_fetch_array($result)) {
                    ?>
                        <option value="<?php echo $row['mancc'] ?>"><?php echo $row['tenncc'] ?></option>

                    <?php
                    }
                    ?>
                </select>
            </div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Ngày nhập</label>

            <div class="col-sm-10"><input type="date" class="form-control" name="ngay" /></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Tên người giao</label>

            <div class="col-sm-10"><input type="text" required="" class="form-control" name="ten" /></div>
        </div>

        <div class="form-group"><label class="col-sm-2 control-label">Nội dung</label>

            <div class="col-sm-10"><textarea require="" class="form-control" name="nd"> </textarea></div>
        </div>
        <div class="hr-line-dashed"></div>
        <div class="form-group">
            <div class="col-sm-4 col-sm-offset-2">
                <button class="btn btn-primary" type="submit" name="them">Thêm mới</button>
                <button class="btn btn-primary" type="submit" name="lm">Làm mới</button>

            </div>
        </div>
    </form>
</div>