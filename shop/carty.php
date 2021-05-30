
<li class="option-cart">
    <a href="index.php?page_layout=cart" class="cart-icon">cart <span class="cart_no"><?php if (isset($_SESSION['giohang'])) {
                                                                                            echo count($_SESSION['giohang']);
                                                                                        } else {
                                                                                            echo 0;
                                                                                        } ?></span></a>
    
</li>