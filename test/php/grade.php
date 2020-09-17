<?php
    date_default_timezone_set("PRC");//中国时区
    $time=strtotime(date('Y-m-d H:i:s'));
    include('./public.php');
    $codes=$_GET['userId'];
    $sql="select * from myitem_bank where userId='$codes'";
    $res=$connect->query($sql);
    $grades=0;
    $names='';
    while($arr=$res->fetch_array()){
        $grades+=intval($arr['grades']);
        $names=$arr['user_name'];
    }
    $msg=[];
    // echo $names;
    $msg['name']=$names;
    $msg['grades_user']=$grades;
    echo json_encode($msg);
    $sql="update user_xinxi set total_grade='$grades' where user_code='$codes'";
    $connect->query($sql);
    $sql="update user_time set user_time='$time' where userId='$codes'";
    $connect->query($sql);
?>