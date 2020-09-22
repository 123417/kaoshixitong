<?php
    include('./public.php');
    $userId=$_GET['userId'];
    $pass=$_GET['pass'];
    $sql="select * from admins where user_name='$userId' and user_pass='$pass'";
    $res=$connect->query($sql);
    if($res){
        echo 'ok';
    }
?>