<?php
include('../public.php');
if($_GET['test']=='1'){   // 清空题库
    $sql="truncate table item_pool";
    $res=$conn->query($sql);
}
if($_GET['test']=='2'){   // 清空题库
    $sql="truncate table user_times";
    $res=$conn->query($sql);
}
if($_GET['test']=='3'){   // 清空题库
    $sql="truncate table users";
    $res=$conn->query($sql);
}
if($_GET['test']=='4'){   // 清空题库
    $sql="truncate table user_pool";
    $res=$conn->query($sql);
}
if($res){
    echo "ok";
}else{
    echo "no";
}
?>