<?php
     include('./public.php');
     $userId=$_GET['userId'];
     $sql="select * from user_xinxi where user_code='$userId'";
     $res=$connect->query($sql);
     $arr=$res->fetch_array();
     echo $arr['user_name'];
?>