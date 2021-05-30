<?php
include_once './connect.php';
$ma=$_GET['mancc'];
if(isset($_POST['sua']))
{
    $ten=$_POST['ten'];
    if(isset($ten)){
        $sql= "update ncc set tenncc='$ten' where mancc='$ma'";
        mysqli_query($link,$sql);
       echo '<script>window.location="quantri.php?page_layout=dmncc"</script>';
    }
}
      
?>
<div class="ibox-content">
                                <h1>Sửa nhà cung cấp</h1>
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên nhà cung cấp</label>
                                    <?php 
                                     $sql="select * from ncc where mancc='$ma'";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                        ?>
                                    <div class="col-sm-10"><input type="text" class="form-control"  name="ten"  value="<?php echo $row['tenncc']?>"/></div>
                                    <?php
                                    }?>
                                </div>
                                <div class="hr-line-dashed"></div>
                             
                             
                                <div class="form-group">
                                    <div class="col-sm-4 col-sm-offset-2">
                                    <button class="btn btn-primary" type="submit" name="sua">Sửa</button>
                                   
                                        
                                    </div>
                                </div>
                            </form>
                        </div>
                            
                    


