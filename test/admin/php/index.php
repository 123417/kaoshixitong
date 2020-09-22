<?php
    include('../public.php');  //引入公共文件
    // 接受省份证号
    $user=$_GET['user'];
    $pass=$_GET['pass'];
    $sql="select * from admins where user='$user' and pass='$pass'";
    $res=$conn->query($sql);  //记录集
    if($res->num_rows>0){
        echo "ok";
    }else{
        echo 'no';
    }
?>