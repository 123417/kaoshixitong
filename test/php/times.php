<?php
    date_default_timezone_set("PRC");//中国时区
    include('./public.php');
    $code=$_GET['userId'];
    $sql="select * from user_xinxi where user_code='$code'";
    $res=$connect->query($sql);
    if($res->num_rows>0){
        $arr=$res->fetch_array();
        // print_r($arr);
        $names=$arr['user_name'];
        $sql="select * from user_time where userId='$code'";
        $res=$connect->query($sql);
        if(!$res->num_rows>0){
            $time=strtotime(date('Y-m-d H:i:s'));
            // echo $time.'<br/>';
            $lasttime=strtotime(date('Y-m-d H:i:s',strtotime('+1 hour +29 minute +59 second')));
            // echo $lasttime;
            $sql="insert into user_time(user_name,userId,user_time) values('$names','$code','$lasttime')";
            $ins=$connect->query($sql);
            if($ins){
                echo "ok";
            }else{
                echo "no";
            }
        }else{
            echo "ok";
        }
    }else{
        echo "reg";
    }
?>