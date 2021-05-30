<?php
include_once './connect.php';
if(isset($_POST['them']))
{   
  $ten=$_POST['ten'];
  $mk=$_POST['mk'];
  $vaitro=$_POST['vaitro'];

  if(isset($ten))
  {       
    $sql="insert into nguoidung values('$ten','$mk','$vaitro')";
    $result=mysqli_query($link,$sql);
    echo '<script>window.location="quantri.php?page_layout=dstk"</script>'; 
  }

}
if(isset($_POST['lm']))
{ 

  $ten="";
  $mk="";
                  
}                
?>                           
                <div class="ibox-content">
                                <h1>Thêm mới Tài Khoản</h1>
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên tài khoản</label>

                                    <div class="col-sm-10"><input type="text" required="" class="form-control"  name="ten"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Mật khẩu</label>

                                <div class="col-sm-10"><input type="text" required="" class="form-control"  name="mk"/></div>
                                </div>
                                <div class="form-group"><label class="col-sm-2 control-label">Vai trò</label>

                                <div class="col-sm-10"><select class="form-control m-b" name="vaitro">
                                    <option>admin</option>
                                    <option>user</option>
                                    
                                </select>

                                   
                                </div>
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
                            