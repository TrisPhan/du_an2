
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./assets/css/donhang.css">
    <title>Document</title>
    <style>
        @import url('https://fonts.googleapis.com/css2?family=Ubuntu:wght@300;400;500;700&display=swap');

        *{
            font-family: 'Ubuntu', sans-serif;
            margin: 0;
            padding: 0;
            box-sizing: border-box;
        }

        :root{
            --black: black;
            --white: #fff;
            --yellow: #F5A623;
            --grey: grey;
            --smoke: rgb(220, 220, 220);
        }

        body{
            min-height: 100vh;
            overflow-x: hidden;
        }

        .details{
            position: relative;
            width: 100%;
            padding: 20px;
            display: grid;
            grid-gap: 30px;
            margin-top: 10px;
        }

        .details .recentstaff{
            position: relative;
            display: grid;
            min-height: 500px;
            background: var(--white);
            padding: 20px;
            box-shadow: 0 7px 25px var(--black);
            border-radius: 20px;
        }

        .details .cardHeader{
            display: flex;
            justify-content: space-between;
            align-items: flex-start;
        }

        .cardHeader h2{
            font-weight: 600;
            color: var(--black);
        }

        .cardHeader .btn{
            position: absolute;
            bottom: 30px;
            right: 30px;
            padding: 5px 10px;
            background: var(--yellow);
            text-decoration: none;
            color: var(--white);
            border-radius: 6px;
        }

        .details table{
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }

        .details table thead td{
            font-weight: 600;
        }

        .details .recentstaff table tr{
            color: var(--grey);
            border-bottom: 1px solid var(--black);
        }

        .details .recentstaff table tr:last-child{
            border-bottom: none;
        }

        .details .recentstaff table tbody tr:hover{
            background: var(--yellow);
            color: var(--black );
        }

        .details .recentstaff table tr td{
            padding: 10px;
        }

        .details .recentstaff table tr td:last-child{
            text-align: start;
        }

        .details .recentstaff table tr td:nth-child(2),
        .details .recentstaff table tr td:nth-child(3),
        .details .recentstaff table tr td:nth-child(4),
        .details .recentstaff table tr td:nth-child(5),
        .details .recentstaff table tr td:nth-child(6),
        .details .recentstaff table tr td:nth-child(7),
        .details .recentstaff table tr td:nth-child(8),
        .details .recentstaff table tr td:nth-child(9){
            text-align: center;
        }

        .status.delivered{
            padding: 2px 4px;
            background: greenyellow;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.pending{
            padding: 2px 4px;
            background: rgb(255, 111, 0);
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.return{
            padding: 2px 4px;
            background: red;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .status.inProgress{
            padding: 2px 4px;
            background: #1795ce;
            color: var(--white);
            border-radius: 4px;
            font-size: 14px;
            font-weight: 500;
        }

        .main{
            position: absolute;
            width: calc(100% - 300px);
            left: 300px;
            min-height: 100vh;
            background: var(--white);
            transition: 0.5s;
        }

        .topbar{
            width: 100%;
            height: 60px;
            display: flex;
            justify-content: space-between;
            align-items: center;
            padding: 0 10px;
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

        .user{
            position: relative;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            overflow: hidden;
            cursor: pointer;
        }

        .user img{
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            object-fit: cover;
        }
        .table{
            width: 100%;
            text-align: center;
        }

        table, th, td {
            border: 1px solid black;
        }
        .msp{
            width: 100px;
        }
    </style>
</head>
<body>
    <div class="topbar">
        <div class="toggle">
            
        </div>


        <div class="user">
            <img src="./img/iconE.png" alt="">
        </div>
    </div>

    <div class="details">
        <div class="recentstaff">
        <h2>Trạng thái đơn hàng</h2>
        <a href="?controller=donhang">Quay lại</a>
        <form action="" method="post">
           
            
        <div class="chitiet">
        <?php
            if (isset($_SESSION['ss_admin'])) {

                ?>
				<div class="row">
					<h3 class="text-center col-md-12">Chi tiết đơn hàng</h3>
				</div>
				
				<div class="row">
					<table class="table">
					    <thead>
                            <tr>
                                <th scope="col">Tên sản phẩm</th>
                                <th class="msp">Mã sản phẩm</th>
                                <th scope="col">Ảnh</th>
                                <th scope="col">Loại sản phẩm</th>
                                <th scope="col">size</th>
                                <th scope="col">Số lượng</th>
                                <th scope="col">Ngày đặt</th>
                                <th scope="col">Giá gốc</th>    
                                <th scope="col">Tổng</th>
                                <th scope="col">Ghi chú</th>
                            </tr>
					    </thead>

					    <tbody>
                            <?php foreach ($ctdonhang as $key => $value) {
                                //Lấy dữ liệu sản phẩm tương ứng
                                $sanpham = $db->get('sanpham',array('id_sanpham'=>$value['id_sanpham']));
                            ?>
                            <tr>
                                <td><?php echo $sanpham[0]['tensanpham']?></td>
                                <td><?php echo $value['id_sanpham']?></td>
                                <td scope="row">
                                    <img height="100" width="100"  src="../images/sanpham/<?php echo $sanpham[0]['anh_chinh']?>" > 
                                </td>
                                <td><?php echo $value['loai_sp']?></td>
                                <td style="text-transform: uppercase"><?php echo $value['size']?></td>
                                <td><?php echo $value['soluongsp']?></td>
                                <td><?php echo $value['ngaydat']?></td>
                                <td><?php echo number_format($sanpham[0]['gia'])?>đ</td>
                                <td><?php echo number_format($sanpham[0]['gia']*$value['soluongsp'])?>đ</td>
                                <td style="max-width:300px"><?php echo $value['ghichu']?></td>	      
                            </tr>
                            <?php } ?>
					    </tbody>
					</table>
				</div>
				
			<?php }
             ?>
			
    </div>  
            </form>
        </div>
    </div>
</body>
</html>