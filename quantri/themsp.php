<?php
include_once './connect.php';

if(isset($_POST['them']))
{   
    $ten=$_POST['ten'];
    $mota=$_POST['mota'];
    $ct=$_POST['ct'];
    $gb=$_POST['gb'];
    $gkm=$_POST['gkm'];
    $lsp=$_POST['lsp'];
    $ncc=$_POST['ncc'];
    if($_FILES['anh_sp']['name']==''){
        $error_anh_sp='<span style="color: red;">(*)</span>';
    }
    else{
        $anh_sp=$_FILES['anh_sp']['name'];
        $tmp_name=$_FILES['anh_sp']['tmp_name'];
    }

    
    
    if(isset($ten)&&isset($anh_sp)&&isset($mota)&&isset($ct)&&isset($gb)&&isset($gkm)&&isset($lsp)&&isset($ncc)){
        move_uploaded_file($tmp_name, 'anh/'.$anh_sp);
        $sql="insert into sanpham(tensp,anh,mota,chitiet,giaban,giakm,maloai,mancc) values('$ten','$anh_sp','$mota','$ct','$gb','$gkm','$lsp','$ncc')";
        mysqli_query($link,$sql);
        echo '<script>window.location="quantri.php?page_layout=sanpham"</script>'; 

    }

}
if(isset($_POST['lm']))
{
    $ten="";
    $mota="";
    $ct="";
    $gb="";
    $gkm="";
  
}


?>   
                <div class="ibox-content">
                                <h1>Thêm mới sản phẩm</h1>
                            <form method="post" class="form-horizontal" enctype="multipart/form-data">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên sản phẩm</label>

                                    <div class="col-sm-10"><input type="text" required="" class="form-control"  name="ten"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Ảnh sản phẩm</label>

                                <div class="col-sm-10"><input type="file"  class="form-control"  name="anh_sp"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mô tả</label>

                                <div class="col-sm-10"><textarea   require="" class="form-control"  name="mota"> </textarea></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                             
                                  <div class="form-group"><label class="col-sm-2 control-label">Chi tiết</label>

                                    <div class="col-sm-10"><textarea required="" class="form-control"  name="ct"></textarea></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Giá bán </label>

                                <div class="col-sm-10"><input type="text" required="" class="form-control"  name="gb"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Giá khuyến mại</label>

                                <div class="col-sm-10"><input type="text" required="" class="form-control"  name="gkm"/></div>
                                </div>
                                <div class="hr-line-dashed"></div>
                                <div class="form-group"><label class="col-sm-2 control-label">Loại sản phẩm</label>

                                <div class="col-sm-10"><select class="form-control m-b" name="lsp">
                                    <?php
                                    $sql="select * from loaisp";
                                    $result= mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['maloai']?>"><?php echo $row['tenloai']?></option>
                                    
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Nhà cung cấp</label>
                                <div class="col-sm-10"><select class="form-control m-b" name="ncc">
                                    <?php
                                    $sql="select * from ncc";
                                    $result= mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                    ?>
                                    <option value="<?php echo $row['mancc']?>"><?php echo $row['tenncc']?></option>
                                    
                                    <?php
                                    }
                                    ?>
                                </select>
                                </div>
                                </div>
                             
                             
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" name="them">Thêm mới</button>
                                    <button class="btn btn-primary" type="submit" name="lm">Làm mới</button>
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                            