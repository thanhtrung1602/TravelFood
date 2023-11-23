<?php
    if (isset($_SESSION['cart'])){
        // echo var_dump($_SESSION['cart']);
?>
<nav>
    <section class="navbar">
        <article>
            <table>
                <thead>
                    <tr>
                        <th>Tên</th>
                        <th>Hình ảnh</th>
                        <th>Số lượng</th>
                        <th>Giá</th>
                        <th>Chức năng</th>
                    </tr>
                </thead>
                <?php
                    $i = 0;
                    $tong = 0;
                    foreach($_SESSION['cart'] as $sp) {
                        // extract($sp);
                        $thanhtien = $sp[3] * $sp[5];
                        $tong += $thanhtien;
                        $linkDel = 'index.php?page=delCart&ind='.$i;
                        echo '
                            <tbody>
                                <tr>
                                    <td><h2>'.$sp[1].'</h2></td>
                                    <td><img src="layout/img/sanpham/'.$sp[2].'" alt=""></td>
                                    <td>
                                        <span>'.$sp[5].'</span>
                                    </td>
                                    <td><span>'.number_format($thanhtien).'</span></td>
                                    <td><button><a href="'.$linkDel.'">xoa</a></button></td>
                                </tr>
                            </tbody>
                            ';
                            $i++;
                        }
                        ?>
                </table>
        </article>
    </section>
</nav>
<main>
    <section class="main">
        <article>
            <div class="form-address">
                
                <h2>Thông tin nhận hàng</h2>

                <form action="index.php?page=addBill" method="post" enctype="multipart/form-data">
                    <div class="sex">
                        <div class="male">
                            <input type="radio" name="sex" id=""> 
                            <label for="">Giao tận nhà</label>
                        </div>
    
                        <div class="female">
                            <input type="radio" name="sex" id="">
                            <label for="">Lấy tại cửa hàng</label>
                        </div>
                    </div>
                    <div class="form-inp">
                        <div class="name-voucher">
                            <input type="text" name="nameUser" id="nameUser" placeholder="Họ và tên" class="nameUser">
                            <input type="text" name="" id="" placeholder="Nhập voucher">
                        </div>
    
                        <div class="form-middle">
                            <div class="left-inp">
                                <input type="text" name="phone" id="" placeholder="Số điện thoại" class="phone">
                                <input type="text" name="addressUser" id="" placeholder="Nhập địa chỉ nhà, tên đường" class="addressUser">
                                <input type="text" name="note" id="" placeholder="Nhập ghi chú nếu có" class="note">
                            </div>
    
                            <div class="right-total">
                                <div class="food-price">
                                    <span>Tiền món ăn</span>
                                    <span>30.000 VND</span>
                                </div>
    
                                <div class="food-transport">
                                    <span>Vận chuyển: </span>
                                    <span>20.000 VND</span>
                                </div>
    
                                <div class="food-voucher">
                                    <span>Voucher</span>
                                    <span>-20.000 VND</span>
                                </div>
    
                                <div class="food-total">
                                    <span>Tổng</span>
                                    <span><?=number_format($tong,0,",",".")?></span>
                                </div>
    
                            </div>
                        </div>
                        <input type="hidden" name="id" value="<?=$sp[0]?>">
                        <input type="submit" value="Đặt hàng" name="sub" class="order">
                    </div>
                </form>
            </div>
        </article>
    </section>
</main>
<script src="layout/shoppingCart/shoppingCart.js"></script>
<?php
    }
?>