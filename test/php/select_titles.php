<?php
    include('./public.php');
    $codes=$_GET['userId'];
    $num=$_GET['nums'];
    $sql="select * from myitem_bank where userId='$codes' and titleNum_self='$num'";
    $res=$connect->query($sql);
    $arr=$res->fetch_assoc();
    $title_num=$arr['titleNum'];
    $sql="select * from item_bank where id='$title_num'";
    $res=$connect->query($sql);
    $arr=$res->fetch_assoc();
    array_pop($arr);
    $arr['title_num']=$num;
    echo json_encode($arr);
?>