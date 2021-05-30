<?php
include_once './connect.php';
$ma=$_GET['id_hd'];
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
                            <td><a href="quantri.php?page_layout=themcthdn&id_hd=<?php echo $ma ?>"><button type="button" class="btn btn-primary ">Thêm</button></a></td>
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
                                    <th >Mã hóa đơn nhập </th>
                                    <th >Sản phẩm </th>
                                    <th >Số lượng </th>
                                    <th >Đơn giá </th>
                                    <th >Sửa</th>
                                    <th >Xóa</th>

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $sql="select * from cthdn  INNER JOIN sanpham ON cthdn.masp=sanpham.masp  where id_hd=$ma";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['id_cthd']?></td>
                                    <td><?php echo $row['id_hd']?></td>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo $row['soluong']?></td>
                                    <td><?php echo $row['dongia']?></td>
                                  
                                    <td><a   href="quantri.php?page_layout=suacthdn&id_cthd=<?php echo $row['id_cthd']?>&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Sửa</button></a></td>
                                    <td><a onclick="return xoa();" href="xoacthdn.php?id_cthd=<?php echo $row['id_cthd']?>&id_hd=<?php echo $row['id_hd'] ?>"><button type="button" class="btn btn-primary btn-sm">Xóa</button></a></td>
                                    
                                </tr>
                                <?php
                                    }
                                    ?>
                                </tbody>
                            </table>

                        </div>
    
           
                    </div>
                </div>

            </div>
        

