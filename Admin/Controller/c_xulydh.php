<?php
if(isset($_SESSION['ss_admin'])){
    $user = $db->get('taikhoan', array('id'=>$_SESSION['ss_admin']));
    if(($user[0]['vaitro']=='admin') || ($user[0]['vaitro']=='manager')){
        
        $method = $_GET['method'];
        $id = $_GET['id'];
        switch ($method) {
            case 'status':
                $tt= $_GET['tt'];
                if ($tt==1) {
                    $db->update('donhang',array(
                        'id_tinhtrang'=>2
                    ),array('id_donhang'=>$id));
                }else{
                    $db->update('donhang',array(
                        'id_tinhtrang'=>4
                    ),array('id_donhang'=>$id));
                }
                header('Location: ?controller=donhang');
               
                break;
            case 'xoa':
                $id = $_GET['id'];
                $db->delete('donhang', array('id_donhang'=>$id));
                $db->delete('ctdonhang', array('id_donhang'=>$id));
                header('Location: ?controller=donhang');
                break;

            case 'sua':
                $id = $_GET['id'];
                $donhang=$db->get('donhang',array('id_donhang'=>$id));

                $khachhang = $db->get('khachhang', array('id_kh'=>$donhang[0]['id_kh']));
                
                $ctdonhang=$db->get('ctdonhang',array('id_donhang'=>$donhang[0]['id_donhang']));
                if(isset($_POST['btn_donhang'])){
   
                    $tong = $_POST['dh_tong'];
                    $ghichu = $_POST['ct_ghichu'];
                    $diachi = $_POST['ct_diachi'];
                    $id_tinhtrang = $_POST['dh_tinhtrang'];

                    $loi = array();
                  
                    if($tong == ''){
                        $loi['email'] = 'không được để trống';
                    }

                    if($id_tinhtrang == ''){
                        $loi['vaitro'] = 'không được để trống';
                    }
                    
                    if($diachi == ''){
                        $loi['diachi'] = 'Địa chỉ không được để trống';
                    }
                    if(!$loi){
                        $db->update('ctdonhang',array(
                            'ghichu'=>$ghichu
                            
                        ),array('id_donhang'=>$id));
                        $db->update('khachhang',array(
                            'diachi'=>$diachi
                            
                        ),array('id_kh'=>$donhang[0]['id_kh']));
                        $db->update('donhang',array(
                            'tong'=>$tong,
                            'id_tinhtrang'=>$id_tinhtrang
                        ),array('id_donhang'=>$id));
                        header('location: ?controller=donhang');
                    }
                }
                require 'View_web/v_suadonhang.php';
                break;

            default:

            break;    
        }    
        
    }            
    else
    {
        echo '<script type="text/javascript">alert("Bạn không có quyền hạn");           
        </script>';
    }
}
?>

