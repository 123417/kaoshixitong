<?php
include('../public.php');
$title=$_POST['title'];
$A=$_POST['A'];
$B=$_POST['B'];
$C=$_POST['C'];
$D=$_POST['D'];
$R=$_POST['R'];
$select=$_POST['select'];
$sql="insert into item_pool(titles,types,A,B,C,D,rights) values('$title','$select','$A','$B','$C','$D','$R')";
$res=$conn->query($sql);
if($res){
    echo "<script>alert('添加成功')</script>";
    echo "<script>window.location.href='../add_title.php'</script>";
}else{
    echo 'no';
}

?>