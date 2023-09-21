<?php
if(isset($_SESSION['ss_admin'])){
    $user=$db->get('taikhoan', array('id'=>$_SESSION['ss_admin']));

    if(($user[0]['vaitro']=='admin')){
        if(isset($_POST['btn_adddanhmuc'])){
            $id_danhmuc = $_POST['id_danhmuc'];
            $tendanhmuc = $_POST['danhmuc'];
            
            $loi=array();
            if($id_danhmuc == ''){
                $loi['id_danhmuc'] = 'Mã danh mục không được để trống';
            }
            if($tendanhmuc == ''){
                $loi['danhmuc'] = 'Tên danh mục không được để trống';
            }

            $danhmuc = $db->get('danhmuc', array('id_danhmuc'=>$id_danhmuc));
            if($danhmuc){
                $loi['id_danhmuc'] = 'Mã danh mục đã được sử dụng';
            }
            
            if(!$loi){
                        
                $db->insert('danhmuc',array(
                    'id_danhmuc'=>$id_danhmuc,
                    'danhmuc'=>$tendanhmuc
                ));
                header('location: ?controller=danhmuc');
            }
                
            }
        }
    }else{
    header('location: ?controller=login');
    }

    require 'View_web/v_adddanhmuc.php';
?>