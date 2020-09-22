<?php
    include('./public.php');
    $id=$_GET['id'];
    $pass=md5(666666);
    $sql="update users set pass='$pass' where id='$id'";
    $res=$conn->query($sql);
    if($res){
        echo "<script>alert('密码重置成功,新密码：66666')</script>";
        echo "<script>window.location.href='./reset_pass.php'</script>";
    }
?>