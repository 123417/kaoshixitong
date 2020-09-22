<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        echo "<script>window.location.href='../index.php';</script>";
    }
?>
<meta charset="UTF-8">
<link href="./css/public.css" rel="stylesheet" />
<link href="./css/reset_pass.css" rel="stylesheet" />
<script src="./js/jquery-1.12.2.js"></script>

<table border='1' cellspacing='0'>
    <tr>
        <td>ID</td>
        <td>姓名</td>
        <td>身份证号</td>
        <td>成绩</td> 
    </tr>
    <?php
    include('./public.php');
    $sql="select * from users";
    $res=$conn->query($sql);
    while($arr=$res->fetch_array()){
?>
    <tr>
        <td><?php echo $arr['id']  ?></td>
        <td><?php echo $arr['names']  ?></td>
        <td><?php echo '\''.$arr['codes'];  ?></td>
        <td><?php echo $arr['grades']  ?></td>
    </tr>
<?php
    }
?>
</table>
<div style="width:100%; height:50px; line-height:50px;text-align:center;">
    <a>导出excel文件</a>
</div>
<script>
//获取html元素，包含table，设置编码，防止乱码
var html="<html><head><meta charset='utf-8' /></head><body>"+document.getElementsByTagName('table')[0].outerHTML+"</body></html>";
var blob=new Blob([html],{type:"application/vnd.ms-excel"});
var a=document.getElementsByTagName('a')[0];
a.href=URL.createObjectURL(blob);
a.download='学生成绩表.xls';
</script>
