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
$numrow=mysqli_num_rows(mysqli_query($link,"select * from hdn"));
$totalpage=ceil($numrow/$rowpage);
$listpage="";
for ($i=1; $i<=$totalpage ; $i++) { 
    if($page==$i){
        $listpage.=' <li class="btn btn-white  active"><a href="quantri.php?page_layout=hdn&page='.$i.'">'.$i.'</a></li>';
    }
    else{
        $listpage.=' <li class="btn btn-white "><a href="quantri.php?page_layout=hdn&page='.$i.'">'.$i.'</a></li>';
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
                            <h1>Quản lý hóa đơn nhập</h1>
                            <td><a href="quantri.php?page_layout=themhdn"><button type="button" class="btn btn-primary ">Thêm mới</button></a></td>
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
                                <thead >
                                <tr>
                                    <th >ID</th>
                                    <th >Nhà cung cấp </th>
                                    <th >Ngày nhập</th>
                                    <th >Tên người giao</th>
                                    <th >Nội dung</th>
                                    <th >Sửa</th>
                                    <th >Xóa</th>
                                    <th >Chi tiết</th>
                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $sql="select * from hdn  INNER JOIN ncc ON hdn.mancc=ncc.mancc limit $row,$rowpage";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['id_hd']?></td>
                                    <td><?php echo $row['tenncc']?></td>
                                    <td><?php echo $row['ngaynhap']?></td>
                                    <td><?php echo $row['ten']?></td>
                                    <td><?php echo $row['noidung']?></td>
                                  
                                    <td><a   href="quantri.php?page_layout=suahdn&id_hd=<?php echo $row['id_hd']?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                                    <td><a onclick="return xoa();" href="xoahdn.php?id_hd=<?php echo $row['id_hd']?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                                    <td><a   href="quantri.php?page_layout=cthdn&id_hd=<?php echo $row['id_hd']?>"><button type="button" class="btn btn-primary btn-sm">Chi tiết</button></a></td>
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
        

