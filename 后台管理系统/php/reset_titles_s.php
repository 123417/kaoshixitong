<?php
    include('./public.php');
    $val=$_GET['a'];
    $sql="truncate table $val";
    $res=$connect->query($sql);
    if($res){
        echo 'ok';
    }
?>