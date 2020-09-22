<?php
session_start();   //启动会话
include('./public.php');  //引入公共文件
if(!isset($_GET['user'])){
    echo "<script>window.location.href='./index.php'</script>";
}
$user=$_GET['user'];
$sql="select * from admins where user='$user'";
$res=$conn->query($sql);  //记录集
if($res->num_rows>0){
    $_SESSION['admin']=$user;
}else{
    echo "<script>window.location.href='./index.php'</script>";
}

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/index.css" rel="stylesheet" />
    <link href="./css/public.css" rel="stylesheet" />
    
</head>
<body>
    <div class="header">
        <div class="header_l">
            传智远程考试管理系统
        </div>
        <div class="header_r">
            <span>
                <?php
                    if(isset($_SESSION['admin'])){
                        echo $_SESSION['admin'];
                        echo "<a href='./php/exit.php'>退出</a>";
                    }else{
                       //echo "没有登录";
                        echo "<script>window.location.href='./index.php'</script>";
                    }
                ?>
            </span>
        </div>
    </div>
    <div class="content">
        <div class="content_l">
            <li>用户管理</li>
            <li><a href="reset_pass.php" target='iframe'>密码重置</a></li>
            <li><a href="update_tit_max.php" target='iframe'>设置题量</a></li>
            <li><a href="add_title.php" target='iframe'>添加试题</a></li>
            <li><a href="./edit_title.php" target='iframe'>修改试题</a></li>
            <li><a href="./import_excel/import_test.php" target='iframe'>导入题库</a></li>
            <li><a href="./grades.php" target='iframe'>成绩统计</a></li>
            <li><a href="./del_title.php" target='iframe'>重置题库</a></li>
        </div>
        <div class="content_r">
            <div class="content_r_top">
                <iframe class="iframe" frameborder='1' src='./grades.php' name="iframe">
                </iframe>
            </div>
            <div class="content_r_bot">copyright@2018-2019 波波开发团队 1331366366147</div>
        </div>
    </div>
</body>
</html>