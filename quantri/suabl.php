<?php
include_once './connect.php';
$ma=$_GET['id_bl'];
if(isset($_POST['sua']))
{
    $ten=$_POST['ten'];
    $nd=$_POST['nd'];
    $date=$_POST['date'];
    if(isset($ten)&&isset($nd)&&isset($date)){
        $sql= "update binhluan set ten='$ten',noidung='$nd',ngay='$date' where id_bl='$ma'";
        mysqli_query($link,$sql);
       echo '<script>window.location="quantri.php?page_layout=binhluan"</script>';
    }
}
      
?>
<div class="ibox-content">
                                <h1>Sửa bình luận</h1>
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên </label>
                                    <?php 
                                     $sql="select * from binhluan where id_bl='$ma'";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                        ?>
                                    <div class="col-sm-10"><input type="text" class="form-control"  name="ten"  value="<?php echo $row['ten']?>"/></div>
                                    <label class="col-sm-2 control-label">Nội dung </label>
                                    <div class="col-sm-10"><textarea  class="form-control"  name="nd" ><?php echo $row['noidung']?></textarea></div>
                                    <label class="col-sm-2 control-label">Ngày bình luận </label>
                                    <div class="col-sm-10"><input type="date" class="form-control"  name="date"  value="<?php echo $row['ngay']?>"/></div>
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
                            
                    


