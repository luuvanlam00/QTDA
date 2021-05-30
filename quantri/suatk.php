<?php
include_once './connect.php';
$ma=$_GET['taikhoan'];
if(isset($_POST['sua']))
{   
 
  $mk=$_POST['mk'];
  $vaitro=$_POST['vaitro'];

  if(isset($mk))
  {       
    $sql="update nguoidung set matkhau='$mk',vaitro='$vaitro' where taikhoan='$ma'";
    $result=mysqli_query($link,$sql);
    echo '<script>window.location="quantri.php?page_layout=dstk"</script>'; 
  }

}             
?>                           
                <div class="ibox-content">
                                <h1>Thêm mới Tài Khoản</h1>
                                <?php
                                $sql1="select * from nguoidung where taikhoan='$ma'";
                                $result1=mysqli_query($link,$sql1);
                                while($r=mysqli_fetch_assoc($result1)){
                                ?>
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên tài khoản</label>

                                    <div class="col-sm-10"><input type="text" required="" class="form-control" value="<?php echo $r['taikhoan'] ?>" name="ten"  readonly/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu</label>

                                <div class="col-sm-10"><input type="text" required="" class="form-control" value="<?php echo $r['matkhau'] ?>" name="mk"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Vai trò</label>

                                <div class="col-sm-10"><select class="form-control m-b"  name="vaitro">
                                    <option>admin</option>
                                    <option>user</option>
                                    
                                </select>

                                   
                                </div>
                                </div>

                                <div class="hr-line-dashed"></div>
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
                            