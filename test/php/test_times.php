<?php
    include('./public.php');
    date_default_timezone_set('PRC');
    $codes=$_GET['codes'];   // 身份证号
    $sql="select * from user_times where codes='$codes'";
    $res=$conn->query($sql);
    if($res->num_rows>0){
        $arr=$res->fetch_array();
        //print_r($arr);
        
        $time=strtotime(date('Y-m-d H:i:s',strtotime("now")));   //现在时间
        $lastTime=$arr['times'];
        $h=floor(($lastTime-$time)/3600);
        $i=floor(($lastTime-$time)%3600/60);
        $s=floor(($lastTime-$time)%60);
        if($lastTime>$time){
            echo $h."时 ".$i."分 ".$s."秒".','.$arr['names'];
        }else{
            echo "exit";
        }
        
    }
?>