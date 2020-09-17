<?php
    include('./public.php');
    if(isset($_GET['abc'])){
        $id=$_GET['id'];
        $pass=md5($_GET['abc']);
        $sql="update user_xinxi set user_pass='$pass' where id='$id'";
        $res=$connect->query($sql);
        if($res){
            echo 'ok';
        }
    }
?>