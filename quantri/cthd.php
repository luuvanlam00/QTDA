<?php
include_once './connect.php';
$ma=$_GET['id_hd'];
?>

  
    <style>
    th,td{
        text-align: center;
    }
</style>

    <div class="row">
                <div class="col-lg-12">
                    <div class="ibox float-e-margins">
                        <div class="ibox-title">
                            <h1>Quản lý hóa đơn bán</h1>
                            
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
                                    <th >Mã hóa đơn </th>
                                    <th >Sản phẩm </th>
                                    <th >Số lượng </th>
                                    <th >Đơn giá </th>
                                    

                                </tr>
                                </thead>
                                <tbody>
                                <tr>
                                    <?php
                                    $sql="select * from cthd  INNER JOIN sanpham ON cthd.masp=sanpham.masp  where id_hd=$ma";
                                    $result=mysqli_query($link,$sql);
                                    while($row=mysqli_fetch_assoc($result)){
                                    ?>
                                    <td><?php echo $row['id_cthd']?></td>
                                    <td><?php echo $row['id_hd']?></td>
                                    <td><?php echo $row['tensp']?></td>
                                    <td><?php echo $row['soluong']?></td>
                                    <td><?php echo $row['giaban']?></td>
                                  
                                  
                                    
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
        

