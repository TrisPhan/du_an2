<?php
if(isset($_SESSION['ss_admin'])){
    $danhmuc = $db->get('danhmuc', array('id_danhmuc'=>$_SESSION['ss_admin']));
    
    if (isset($_POST['search'])) {
        $search_codition=$_POST['search_codition'];
        $content=$_POST['content'];
        $data_danhmuc = $db->get_like('danhmuc',$search_codition,$content,array());
    }else {
        $data_danhmuc = $db->get('danhmuc', array()); 
    }
    
}else{
    header('location: ?controller=login');
}
    require 'View_web/v_danhmuc.php';
?>