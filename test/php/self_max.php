<?php
 include('./public.php');  //引入公共文件
 $codes=$_GET['codes'];
 $sql="select * from user_pool where codes='$codes'";
 $res=$conn->query($sql);
 echo $res->num_rows;
?>