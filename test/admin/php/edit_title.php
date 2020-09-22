<?php
    include('../public.php');
    $id=$_POST['ids'];
    $title=$_POST['title'];
    $A=$_POST['A'];
    $B=$_POST['B'];
    $C=$_POST['C'];
    $D=$_POST['D'];
    $R=$_POST['R'];
    $select=$_POST['select'];
    $sql="update item_pool set titles='$title',types='$select',A='$A',B='$B',C='$C',D='$D',rights='$R' where id='$id'";
    $res=$conn->query($sql);
    if($res){
        echo "<script>alert('更新成功')</script>";
        echo "<script>window.location.href='../edit_title.php?id='+$id</script>";
    }
?>