<?php
session_start();
include_once './connect.php';
if(isset($_POST["dn"]))
{   
    $user=$_POST["user"];
    $pass=$_POST["pass"];
    if(isset($user)&&isset($pass))
    {
        $sql="select * from nguoidung where taikhoan='$user'and matkhau='$pass'  and vaitro='admin'";
        $result=mysqli_query($link,$sql);
        $sql1="select * from nguoidung where taikhoan='$user'and matkhau='$pass'  and vaitro='user'";
        $result1=mysqli_query($link,$sql1);
       
        if( $row=mysqli_num_rows($result)>0)
        {
            $_SESSION["user"]=$user;
            $_SESSION["pass"]=$pass;
            echo '<script>window.location="quantri.php"</script>'; 
        }
        if( $row1=mysqli_num_rows($result1)>0)
        {
            $_SESSION["user"]=$user;
            $_SESSION["pass"]=$pass;
            echo '<script>window.location="../index.php?page_layout=home"</script>'; 
        }
       
    }

}
?>
<!DOCTYPE html>
<html>

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">

    <title>INSPINIA | Login</title>

    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="font-awesome/css/font-awesome.css" rel="stylesheet">

    <link href="css/animate.css" rel="stylesheet">
    <link href="css/style.css" rel="stylesheet">

</head>

<body class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>

                <h1 class="logo-name">IN+</h1>

            </div>
            <h3>Welcome to IN+</h3>
            <p>Perfectly designed and precisely prepared admin theme with over 50 pages with extra new web app views.
                <!--Continually expanded and constantly improved Inspinia Admin Them (IN+)-->
            </p>
            <p>Login in. To see it in action.</p>
            <form class="m-t"   method="post">
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Username" required="" name="user">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="pass">
                    
                </div>
                <button type="submit" class="btn btn-primary block full-width m-b"  name="dn">Login</button>

                <a href="#"><small>Forgot password?</small></a>
                <p class="text-muted text-center"><small>Do not have an account?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.php">Create an account</a>
            </form>
            <p class="m-t"> <small>Inspinia we app framework base on Bootstrap 3 &copy; 2014</small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-2.1.1.js"></script>
    <script src="js/bootstrap.min.js"></script>

</body>

</html>
