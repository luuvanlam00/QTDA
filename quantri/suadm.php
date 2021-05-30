<?php
include_once './connect.php';
$ma=$_GET['maloai'];
if(isset($_POST['sua']))
{
    $ten=$_POST['ten'];
    if(isset($ten)){
        $sql= "update loaisp set tenloai='$ten' where maloai='$ma'";
        mysqli_query($link,$sql);
       echo '<script>window.location="quantri.php?page_layout=dmsp"</script>';
    }
}
      
?>
<div class="ibox-content">
                                <h1>Sửa danh mục</h1>
                            <form method="post" class="form-horizontal">
                                <div class="form-group"><label class="col-sm-2 control-label">Tên danh mục</label>
                                    <?php 
                                     $sql="select * from loaisp where maloai='$ma'";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_array($result)){
                                        ?>
                                    <div class="col-sm-10"><input type="text" class="form-control"  name="ten"  value="<?php echo $row['tenloai']?>"/></div>
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
                            
                    


