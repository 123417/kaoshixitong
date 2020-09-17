<?php
    include('./public.php');
    $codes=$_GET['userId'];
    $sql="select * from myitem_bank where userId='$codes'";
    $res=$connect->query($sql);
    echo $res->num_rows;
?>