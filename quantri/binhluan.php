<?php
include_once './connect.php';
if(isset($_GET['page'])){
    $page=$_GET['page'];
}
else{
    $page=1;
}
$rowpage=5;
$row=$page*$rowpage-$rowpage;
$numrow=mysqli_num_rows(mysqli_query($link,"select * from binhluan"));
$totalpage=ceil($numrow/$rowpage);
$listpage="";
for ($i=1; $i<=$totalpage ; $i++) { 
    if($page==$i){
        $listpage.=' <li class="btn btn-white  active"><a href="quantri.php?page_layout=binhluan&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listpage.=' <li class="btn btn-white "><a href="quantri.php?page_layout=binhluan&page='.$i.'">'.$i.'</a></li>';
    }
}
?>
<script>

function xoa(){

  var con =confirm("Bạn có muốn xóa không!");
  return con;
}
</script>  
<style>
    th,td{
        text-align: center;
    }
</style>
<div class="row">
          <div class="col-lg-12">
              <div class="ibox float-e-margins">
                  <div class="ibox-title">
                      <h1>Quản lý bình luận</h1>
                      
                      <div class="ibox-tools">
                          <a class="collapse-link">
                              <i class="fa fa-chevron-up"></i>
                          </a>
                          <a class="dropdown-toggle" data-toggle="dropdown" href="#">
                              <i class="fa fa-wrench"></i>
                          </a>
                          <ul class="dropdown-menu dropdown-user">
                              <li><a href="#">Config option 1</a>
                              </li>
                              <li><a href="#">Config option 2</a>
                              </li>
                          </ul>
                          <a class="close-link">
                              <i class="fa fa-times"></i>
                          </a>
                      </div>
                  </div>
                  <div class="ibox-content">

                      <table class="table table-bordered">
                          <thead>
                          <tr>
                              <th>ID</th>
                              <th>Mã sản phẩm</th>
                              <th>Tên </th>
                              <th>Nội dung </th>
                              <th>Thời gian </th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php
                             $sql="select * from binhluan  limit $row,$rowpage";     
                            $result=mysqli_query($link,$sql);
                              while($row=mysqli_fetch_array($result)){
                              ?>
                              <td><?php echo $row['id_bl']?></td>
                              <td><?php echo $row['masp']?></td>
                              <td><?php echo $row['ten']?></td>
                              <td><?php echo $row['noidung']?></td>
                              <td><?php echo $row['ngay']?></td>
                              <td><a   href="quantri.php?page_layout=suabl&id_bl=<?php echo $row['id_bl']?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                              <td><a onclick="return xoa();" href="xoabl.php?id_bl=<?php echo $row['id_bl']?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                            
                          </tr>
                          <?php
                              }
                              ?>
                          </tbody>
                      </table>

                  </div>
                  <div class="btn-group" style="float: right;">
                                    <ul>
                                    <li class="btn btn-white"><i class="fa fa-chevron-left"></i></li>
                                <?php
                                echo $listpage;
                                ?>
                                <li class="btn btn-white"><i class="fa fa-chevron-right"></i> </li>

                                    </ul>
                               
            </div>
           
              </div>
          </div>

      </div>
     

