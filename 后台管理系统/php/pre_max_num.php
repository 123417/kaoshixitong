<?php
    include('./public.php');
    $sql="select * from systems";
    $res=$connect->query($sql);
    $arr=$res->fetch_array();
    echo $arr['max_num'];
?>