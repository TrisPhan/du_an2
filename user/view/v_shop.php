<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Shop | E-Shopper</title>
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/font-awesome.min.css" rel="stylesheet">
    <link href="../css/prettyPhoto.css" rel="stylesheet">
    <link href="../css/price-range.css" rel="stylesheet">
    <link href="../css/animate.css" rel="stylesheet">
    <link href="../css/main.css" rel="stylesheet">
    <link href="../css/responsive.css" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <style>
        *{
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        :root{
            --black: black;
            --white: #fff;
            --yellow: #F5A623;
            --grey: grey;
            --smoke: rgb(220, 220, 220);
        }

        h4{
            float: left; 
            color: crimson;
        }

        h5{
            color: black; 
            position: absolute; 
            margin-top: 10px; 
        }

        h6{
            float: left;
            position: absolute;
            margin-top: 35px;
            margin-left: 10px;
        }

        .product-image-wrapper{
            height: 360px;
            padding: 5px;
            border: 1px solid black;
        }

        .product-image-wrapper:hover{
            cursor: pointer;
            box-shadow: 0 0 10px;
        }

        .product-image-wrapper .single-products a button.watch{
            border: none; 
            border-radius: 18px;
            background: orange;
        }

        .bottom{
            margin-top:45px; 
            width: 100%; 
            height: 100%; 
            position: absolute;
        }

        .navigation{
            height: 60px;
            width: 200px;
            background: var(--black);
            border-radius: 10px ;          
        }

        .navigation.active{
            height: 100%;
            overflow: hidden;
        }

        .navigation ul{
            position: relative;
            top: 0;
            left: 0;
            width: 100%;
        }

        .navigation ul li{
            position: relative;
            width: 100%;
            list-style: none;
            cursor: pointer;
        }

        /* .navigation ul li:hover,
        .navigation ul li.hovered{
            background: var(--white);
        } */

        .navigation ul li:nth-child(1){
            margin-bottom: 40px;
            pointer-events: none;
        }

        .navigation ul li a{
            position: relative;
            width: 100%;
            display: flex;
            text-decoration: none;
            color: var(--white);
        }

        .navigation ul li a .title{
            position: relative;
            padding: 0 10px;
            line-height: 60px;
            text-align: start;
            white-space: nowrap;
        }
        .main{
            position: absolute;
            margin-left: 200px;
            bottom: 100%;
            background: var(--white);
        }

        .topbar{
            position: absolute;
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
        }

        .topbar.active{
            top: 0;
            bottom: 0;
        }

        .toggle{
            position: relative;
            top: 0;
            height: 60px;
            width: 60px;
            background: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 2.5rem;
            cursor: pointer;
        }
    </style>
</head>
<!--/head-->

<body>
    <header id="header">
        <div class="header-middle">
            <!--header-middle-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="logo pull-left">
                            <a href="?controller=home"><img src="../images/home/logo.png" alt="" /></a>
                        </div>
                    </div>
                    <div class="col-sm-8">
                        <div class="shop-menu pull-right">
                            <ul class="nav navbar-nav">
                            <li><a href="?controller=account"><i class="fa fa-user"></i> Tài khoản</a></li>
                                <li><a href="?controller=checkout"><i class="fa fa-crosshairs"></i>Thanh toán</a></li>
                                <li><a href="?controller=cart"><i class="fa fa-shopping-cart"></i>Giỏ hàng</a></li>
                                <li><?php if (isset($_SESSION['ss_user'])) {
                                    echo "<a href='?controller=logout'><i class='fa fa-lock'></i>Đăng xuất</a>";
                                }else{
                                    echo "<a href='?controller=login'><i class='fa fa-lock'></i>Đăng nhập</a>";
                                } ?></li>
                             </ul>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!--/header-middle-->

        <div class="header-bottom">
            <!--header-bottom-->
            <div class="container">
                <div class="row">
                    <div class="col-sm-9">
                        <div class="navbar-header">
                            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
								<span class="sr-only">Toggle navigation</span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
								<span class="icon-bar"></span>
							</button>
                        </div>
                        <div class="mainmenu pull-left">
                            <ul class="nav navbar-nav collapse navbar-collapse">
                                <li><a href="?controller=home">Trang chủ</a></li>
                                <li class="dropdown"><a href="?controller=shop" class="active">Cửa hàng<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?controller=checkout">Thủ tục thanh toán</a></li>
                                        <li><a href="?controller=cart">Giỏ hàng</a></li>
                                    </ul>
                                </li>
                                <li class="dropdown"><a href="#">Blog<i class="fa fa-angle-down"></i></a>
                                    <ul role="menu" class="sub-menu">
                                        <li><a href="?controller=blog">Blog List</a></li>
                                    </ul>
                                </li>
                                <li><a href="?controller=contact">Liên hệ</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3">
                    <form action="" method="get">
                        <div class="search_box pull-right">
                            <input type="hidden" name="controller" value="shop">
                            <input type="text"  name="keywork" value="<?php  isset($_GET['keywork']) ? $_GET['keywork'] : '' ?>"  placeholder="Search..."/>
                            <button><span> &#8689;</span></button>
                        </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </header>

    <section id="advertisement">
        <div class="container">
            <img src="../images/shop/advertisement.jpg" alt="" />
        </div>
    </section>

    <section>
        <div class="container">
            <div class="row">
                <div class="col-sm-3">
                    <div class="left-sidebar">
                        <div class="navigation">
                            <ul>
                                <li>
                                    <a href="#">
                                        <p style="width:100%; text-align:center; padding-top:20px; margin-bottom:-20px; text-transform:uppercase;" class="r">Danh mục</p>
                                    </a>
                                </li>
                                <?php 
                                    foreach($data_danhmuc as $key => $value){
                                ?>
                                <li>
                                    <a href="?controller=shop&id_dm=<?php echo $value['id_danhmuc']?>">
                                        <span class="title"><?php echo $value['danhmuc']?></span>
                                    </a>
                                </li>
                                <?php }?>
                            </ul>
                        </div>

                        <div class="main">
                            <div class="topbar">
                                <div class="toggle">
                                    <i class='bx bx-menu'></i>
                                </div>
                            </div>
                        </div>
                        <div class="shipping text-center">
                            <img src="../images/home/shipping.jpg" alt="" />
                        </div>
                    </div>
                </div>

                <div class="col-sm-9 padding-right">
                    <div class="features_items" >
                        <!--features_items-->
                        <h2 class="title text-center">Cửa hàng</h2>
                        <?php
                            $i = 0;
                            foreach ($sanpham as $key => $value) {
                              
                                // Hiển thị sản phẩm
                                ?>
                                <div class="col-sm-4"> 
                                    <div class="product-image-wrapper">
                                        <div class="single-products">
                                            <div class="productinfo text-center">
                                                <img class="img-responsive" style="width:100%; height:250px; object-fit: cover;" src="../images/sanpham/<?php echo $value['anh_chinh']?>" alt="" />
                                                <h5><?php echo $value['tensanpham']?></h5>

                                            </div>
                                            <div class="bottom">
                                                <h4><sup>đ</sup><?php echo number_format($value['gia'])?></h4>
                                                <h6>Đã bán: <?php echo $value['daban']?></h6>
                                                <a href="?controller=product-detail&id=<?php echo $value['id_sanpham']?>">
                                                <button class="watch" style="float:right; margin-top:30px; margin-left:20px">Xem ngay</button>
                                            </a>
                                            </div>
                                            
                                        </div>
                                    </div>
                                </div>
                                <?php }?>


                        <ul class="pagination">
                            <?php 
                                if (isset($total_pages)) {
                                    for ($i = 1; $i <= $total_pages; $i++) {
                                        if ($i == $current_page) {
                                            echo "<li class='active'><a href='?controller=shop&page=$i'>$i</a></li>";
                                        }else{
                                            echo "<li><a href='?controller=shop&page=$i'>$i</a></li>";
                                            // echo "<li><a href='?controller=shop&page=$i'>&raquo;</a></li>";
                                        }
                                    }  
                                }
                            ?>
                        </ul>
                        </div>
                    </div>
                    <!--features_items-->
                </div>
            </div>
        </div>
    </section>

    <footer id="footer">
        <!--Footer-->
        <div class="footer-widget">
            <div class="container">
                <div class="row">
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Dịch vụ</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Hỗ trợ trực tuyến</a></li>
                                <li><a href="">Liên hệ chúng tôi</a></li>
                                <li><a href="">Tình trạng đặt hàng</a></li>
                                <li><a href="">Thay đổi địa điểm</a></li>
                                <li><a href="">câu hỏi thường gặp</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Quock Shop</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Áo thun</a></li>
                                <li><a href="">Nam</a></li>
                                <li><a href="">Nữ</a></li>
                                <li><a href="">Thẻ quà tặng</a></li>
                                <li><a href="">Giày</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>chính sách</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Điều khoản sử dụng</a></li>
                                <li><a href="">Chính sách bảo mật</a></li>
                                <li><a href="">Chính sách hoàn tiền</a></li>
                                <li><a href="">Hệ thống thanh toán</a></li>
                                <li><a href="">hệ thống vé</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-2">
                        <div class="single-widget">
                            <h2>Giới thiệu về người mua hàng</h2>
                            <ul class="nav nav-pills nav-stacked">
                                <li><a href="">Thông tin công ty</a></li>
                                <li><a href="">nghề nghiệp</a></li>
                                <li><a href="">Vị trí cửa hàng</a></li>
                                <li><a href="">Chương trình liên kết</a></li>
                                <li><a href="">bản quyền</a></li>
                            </ul>
                        </div>
                    </div>
                    <div class="col-sm-3 col-sm-offset-1">
                        <div class="single-widget">
                            <h2>Giới thiệu về người mua hàng</h2>
                            <form action="#" class="searchform">
                                <input type="text" placeholder="Your email address" />
                                <button type="submit" class="btn btn-default"><i class="fa fa-arrow-circle-o-right"></i></button>
                                <p>Nhận các bản cập nhật mới nhất từ <br />trang web của chúng tôi và tự cập nhật cho chính bạn...</p>
                            </form>
                        </div>
                    </div>

                </div>
            </div>
        </div>

        <div class="footer-bottom">
            <div class="container">
                <div class="row">
                    <p class="pull-left">bản quyền © 2013 E-Shopper. All rights reserved.</p>
                    <p class="pull-right">Thiết kế bởi <span><a target="_blank" href="http://www.themeum.com">Themeum</a></span></p>
                </div>
            </div>
        </div>

    </footer>
    <!--/Footer-->



    <script src="../js/jquery.js"></script>
    <script src="../js/price-range.js"></script>
    <script src="../js/jquery.scrollUp.min.js"></script>
    <script src="../js/bootstrap.min.js"></script>
    <script src="../js/jquery.prettyPhoto.js"></script>
    <script src="../js/main.js"></script>
    <script>
            
        let toggle = document.querySelector(".toggle");
        let navigation = document.querySelector(".navigation");
        let main = document.querySelector(".main");
        let topbar = document.querySelector(".topbar");

        toggle.onclick = function(){
            navigation.classList.toggle("active");
            main.classList.toggle("active");
            topbar.classList.toggle("active");
        }
    </script>
</body>

</html>