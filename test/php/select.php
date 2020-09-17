<?php
    //判断是否考过试，考过为查询成绩，没考过开始考试
    include('./public.php');
    $codes=$_GET['userId'];
    $sql="select * from user_xinxi where user_code='$codes'";
    $res=$connect->query($sql);
    $arr=$res->fetch_array();
    if($arr['total_grade']==''){
        echo "开始考试";
    }else{
        echo "查询成绩";
    }
?>