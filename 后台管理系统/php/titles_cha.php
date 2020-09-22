<?php
    include('./public.php');
    $title_cha=$_GET['title_cha'];
    $sql="select * from item_bank where id='$title_cha'";
    $res=$connect->query($sql);
    $arr=$res->fetch_assoc();
    echo json_encode($arr);
?>