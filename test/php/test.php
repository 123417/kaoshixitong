<?php
    include('./public.php');
    $codes=$_GET['userId'];
    $nums=$_GET['nums'];
    $sql2="select * from myitem_bank where userId='$codes' and titleNum_self='$nums'";
    $ins=$connect->query($sql2);
    $arr=$ins->fetch_array();
    @$results=$arr['myItem_right'];
    if($results==''){
        echo 'empty';
    }else{
        echo $results;
    }
    
?>