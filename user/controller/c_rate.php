<?php
if (isset($_SESSION['ss_user'])) {
if (isset($_GET['id'])) {
    $loi=[];
    $date_oder = date("d/m/y");
    $account = $db->get('taikhoan', array('id'=>$_SESSION['ss_user']));
    $khachhang=$db->get('khachhang',array('sdt'=>$account[0]['sdt']));
   $id_dh=$_GET['id_dh'];
    $id = $_GET['id'];
    $gender_rate=null;
    $content_rate=null;
    if (isset($_POST['btn_rate_sp'])) {
        $gender_rate=$_POST['gender'];
       
        if (isset($_POST['content_rate'])) {
            $content_rate=$_POST['content_rate'];
        }
        if($gender_rate == ''){
            $loi['gender_rate'] = 'Hãy chọn đánh giá';
        }
if (!$loi) {
 $rate_buy=5;

        
    $db->insert('rate_sp',array(
        'id_sanpham'=>$id,
        'rate_rating'=>$gender_rate,
        'rate_content'=>$content_rate,
        'id_taikhoan'=>$_SESSION['ss_user'],
        'Date_rate'=> $date_oder
            ));
            
           
                
           foreach ($khachhang as $key => $value) {
          
            $db->update('donhang',array(
                'id_tinhtrang'=>$rate_buy        
            ),array('id_donhang'=>$id_dh,'id_kh'=>$value['id_kh']),);
        
        }
header('location: ?controller=product-detail&id='.$id);
           }}
}
}    
    
    require "view/v_rate.php";
?>