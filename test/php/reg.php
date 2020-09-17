<?php
    include('./public.php');
    $name=$_GET['user'];
    $pass=md5($_GET['pass']);
    $userId=$_GET['userId'];
    $sql="insert into user_xinxi(user_name,user_pass,user_code) values('$name','$pass','$userId')";
    $inser=$connect->query($sql);
    if($inser){
        echo "ok";
    }else{
        echo "no";
    }
?>