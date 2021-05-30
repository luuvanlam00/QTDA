<?php
include_once './connect.php';
if (isset($_POST['them'])) {
    $ten = $_POST['ten'];
    $email=$_POST['email'];
    $sdt=$_POST['sdt'];

    if (isset($ten)) {
        $sql = "insert into khachhang(tenkh,email,sdt) values('$ten','$email','$sdt')";
        $result = mysqli_query($link, $sql);
        echo '<script>window.location="quantri.php?page_layout=khachhang"</script>';
    }
}
if (isset($_POST['lm'])) {

    $ten = "";
    $email="";
    $sdt="";
}
?>
<div class="ibox-content">
    <h1>Thêm mới khách hàng</h1>
    <form method="post" class="form-horizontal">
        <div class="form-group"><label class="col-sm-2 control-label">Tên khách hàng</label>

            <div class="col-sm-10"><input type="text" required="" class="form-control" name="ten" /></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Email</label>

            <div class="col-sm-10"><input type="email" required="" class="form-control" name="email" /></div>
        </div>
        <div class="form-group"><label class="col-sm-2 control-label">Số điện thoại</label>

            <div class="col-sm-10"><input type="text" required="" class="form-control" name="sdt" /></div>
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