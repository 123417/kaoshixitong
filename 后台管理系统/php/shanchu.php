<?php
    include('./public.php');
    if(isset($_GET['id'])){
        $id=$_GET['id'];
        $sql="delete from user_xinxi where id='$id'";
        $res=$connect->query($sql);
        if($res){
            echo 'ok';
        }
    }
?>