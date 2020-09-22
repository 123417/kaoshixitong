<?php
    include('./public.php');
    $sql="select * from systems";
    $res=$conn->query($sql);
    $arr=$res->fetch_array();
    echo $arr['max_num'];
?>
