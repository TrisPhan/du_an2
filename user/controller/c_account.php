<?php
if(isset($_SESSION['ss_user'])){
    $account = $db->get('taikhoan', array('id'=>$_SESSION['ss_user']));
    $khachhang=$db->get('khachhang',array('sdt'=>$account[0]['sdt']));
    if (isset($_POST['sua_btn_form'])) {
        $full_name = $_POST['full_name'];
            $username = $_POST['username'];
            $sdt = $_POST['sdt'];
            $email = $_POST['email'];
            $diachi = $_POST['diachi'];
            if(!empty($full_name) &&!empty($username)  && !empty($sdt) && !empty($diachi)){
            $db->update('taikhoan',array(
                'full_name'=>$full_name,
                'username'=>$username,
                'email'=>$email,
                'sdt'=>$sdt,
                'diachi'=>$diachi

            ),array('id'=>$_SESSION['ss_user']));
            header('location: ?controller=account');
    }
}
if (isset($_POST['huy_dh'])) {
    if (isset($_POST['id_dh'])) {
        $id_dh=$_POST['id_dh'];
    }
    $db->update('donhang',array(
        'id_tinhtrang'=>4
    ),array('id_donhang'=>$id_dh));
}
  
}else{
    echo "<script>alert('Chức năng này cần đăng nhập')</script>";
    echo "<script>window.location.href = '?controller=login';</script>";
}

    require("view/v_account.php") ;
?>