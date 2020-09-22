<?php
include('./public.php');
$id=$_GET['id'];
$sql="delete from users where id='$id'";

$res=$conn->query($sql);
    if($res){
        echo "<script>alert('删除成功！')</script>";
        echo "<script>window.location.href='./reset_pass.php'</script>";
}
?>