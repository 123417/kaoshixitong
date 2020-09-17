<?php
    $codes=$_GET['userId'];
    include('./public.php');
    $sql="select * from user_time where userId='$codes'";
    $res=$connect->query($sql);
    $arr=$res->fetch_array();
    if(isset($_GET['userName'])){
        echo $arr['user_name'];
    }else{
        echo $arr['user_time'];
    }   
?>