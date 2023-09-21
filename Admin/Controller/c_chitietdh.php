<?php
    //Kiểm tra xem người dùng đã đăng nhập chưua
    if (isset($_SESSION['ss_admin'])) {
        //Nếu đã đăng nhập thì lấy thông tin người dùng theo ss
       // $user = $db->get('khachhang',array('id'=>$_SESSION['ss_admin']));
        //Kiểm tra người dùng có phải admin không
       // if ($user[0]['level']==0) {
            //Nếu là admin thì lấy id trên url
            $id = $_GET['id'];
            //Lấy dữ liệu chi tiết order tương ứng
            $ctdonhang = $db->get('ctdonhang', array('id_donhang'=>$id));
            //Lấy dữ liệu chi tiết order_detail tương ứng
        // $data_order_detail = $db->get('order_detail', array('order_id'=>$id));
       // }else{
            //Nếu không phải admin thì cho người dùng về trang order
       //     header('location: ?controller=donhang');
       // }
    }else{
        //Nếu chưa đăng nhập thì sẽ cho người dùng về trang login
        header('location: ?controller=login');
    } 

    require_once 'View_web/v_chitietdh.php';
?>