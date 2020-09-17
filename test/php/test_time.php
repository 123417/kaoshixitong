<?php
    date_default_timezone_set("PRC");//中国时区
    $codes=$_GET['userId'];
    include('./public.php');
    $sql="select * from user_time where userId='$codes'";
    $res=$connect->query($sql);
    if($res->num_rows>0){
        $arr=$res->fetch_array();
        // print_r($arr);
        $lasttimes=$arr['user_time'];
        $nowTimes=strtotime(date("Y-m-d H:i:s"));
        $h=floor(($lasttimes-$nowTimes)/3600);
        $i=floor(($lasttimes-$nowTimes)%3600/60);
        $m=floor(($lasttimes-$nowTimes)%60);
        if($lasttimes>$nowTimes){
             echo $h."小时".$i."分钟".$m."秒";
        }else{
            echo "exit";
        }
       
    }
?>