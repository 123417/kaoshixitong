<?php
    include('./public.php');
    $userId=$_GET['userId'];
    $pass=md5($_GET['pass']);
    $sql="select * from user_xinxi where user_code='$userId' and user_pass='$pass'";
    $res=$connect->query($sql);
    $num=$res->num_rows;
    if($num>0){
        echo "ok";
    }else{
        echo "no";
    }
?>