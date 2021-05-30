<?php  
	session_start();
	$masp=$_GET['masp'];
	

	if (isset($_SESSION['giohang'][$masp])) {
		$_SESSION['giohang'][$masp]=$_SESSION['giohang'][$masp]+1;
	}else{
		$_SESSION['giohang'][$masp]=1;
	}
	
	 header('location: ../index.php?page_layout=cart');
?>					
                    

                     
                     