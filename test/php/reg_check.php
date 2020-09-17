<?php
    include('./public.php');
    $codes=$_GET['userId'];
    $sql="select * from user_xinxi where user_code='$codes'";
    $res=$connect->query($sql);
    $num=$res->num_rows;
    if($num>0){
        echo "no";
    }else{
        echo "ok";
    }
?>