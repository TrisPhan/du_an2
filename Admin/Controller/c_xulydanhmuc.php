<?php
if(isset($_SESSION['ss_admin'])){
    $user = $db->get('taikhoan', array('id'=>$_SESSION['ss_admin']));
    if(($user[0]['vaitro']=='admin')){
        
        $method = $_GET['method'];
        $id = $_GET['id'];
        switch ($method) {
            case 'xoa':
                $id = $_GET['id'];   
                $db->delete('danhmuc',array('id_danhmuc'=>$id)) ;      
                $db->delete('sanpham', array('id_danhmuc'=>$id));  
                header('Location: ?controller=danhmuc');
                break;
            case 'sua':
                $id = $_GET['id'];
                $data_danhmuc = $db->get('danhmuc', array('id_danhmuc'=>$id));
                if(isset($_POST['btn_suadanhmuc'])){
                    $id_danhmuc = $_POST['id_danhmuc'];
                    $tendanhmuc = $_POST['danhmuc'];
                    
                    $loi = array();
                    if($id_danhmuc == ''){
                        $loi['id_danhmuc'] = 'Mã danh mục không được để trống';
                    }

                    if($tendanhmuc == ''){
                        $loi['danhmuc'] = 'Tên danh mục không được để trống';
                    }

                    
                    if(!$loi){
                        $db->update('danhmuc',array(
                            'id_danhmuc'=>$id_danhmuc,  
                            'danhmuc' =>$tendanhmuc
                            
                        ),array('id_danhmuc'=>$id));
                    header('location: ?controller=danhmuc');
                    }  
                }
                require 'View_web/v_suadanhmuc.php';
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

