<?php
    include('../public.php');
    $max=$_GET['max'];
    $sql="update systems set max_num='$max' where id='1'";
    $res=$conn->query($sql);
    if($res){
        echo "ok";
    }else{
        echo "no";
    }
?>