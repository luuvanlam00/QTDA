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
$numrow=mysqli_num_rows(mysqli_query($link,"select * from khachhang"));
$totalpage=ceil($numrow/$rowpage);
$listpage="";
for ($i=1; $i<=$totalpage ; $i++) { 
    if($page==$i){
        $listpage.=' <li class="btn btn-white  active"><a href="quantri.php?page_layout=khachhang&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listpage.=' <li class="btn btn-white "><a href="quantri.php?page_layout=khachhang&page='.$i.'">'.$i.'</a></li>';
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
                      <h1>Quản lý khách hàng</h1>
                      <td><a href="quantri.php?page_layout=themkh"><button type="button" class="btn btn-primary ">Thêm mới</button></a></td>
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
                              <th>Tên khách hàng</th>
                              <th>Email</th>
                              <th>Số điện thoại</th>
                              <th>Sửa</th>
                              <th>Xóa</th>
                          </tr>
                          </thead>
                          <tbody>
                          <tr>
                              <?php
                             $sql="select * from khachhang  limit $row,$rowpage";     
                            $result=mysqli_query($link,$sql);
                              while($row=mysqli_fetch_array($result)){
                              ?>
                              <td><?php echo $row['id_kh']?></td>
                              <td><?php echo $row['tenkh']?></td>
                              <td><?php echo $row['email']?></td>
                              <td><?php echo $row['sdt']?></td>
                              <td><a   href="quantri.php?page_layout=suakh&id_kh=<?php echo $row['id_kh']?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                              <td><a onclick="return xoa();" href="xoakh.php?id_kh=<?php echo $row['id_kh']?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                            
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
     

