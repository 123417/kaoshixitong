<?php
    session_start();
    include('./php/public.php');
    if($_GET['user']==''){
        echo "<script>window.location.href='./index.html'</script>";
    }
    $userId=$_GET['user'];
    $sql="select * from admins where user_name='$userId'";
    $res=$connect->query($sql);
    if($res->num_rows>0){
        $_SESSION['name']=$_GET['user'];
    }else{
        echo "<script>window.location.href='./index.html'</script>";
    }
    // echo $_SESSION['name'];
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/public.css">
    <link rel="stylesheet" href="./css/index.min.css">
</head>
<body>
    <div class="header">
        <div class="header-l fl center">
            传智远程考试系统
        </div>
        <div class="header-r fr">
            <span>用户名：</span><span><?php 
                if(isset($_SESSION['name'])){
                    echo $_SESSION['name'];
                    echo "<a href='./php/exit.php'>退出</a>";
                }else{
                    echo "没有登录";
                    echo "<script>window.location.href='./index.html'</script>";
                }
            ?></span>
        </div>      
    </div>
    <div class="main">
        <div class="main-l fl">
                <li>用户管理</li>
                <li><a href="./php/reset_pass.php" target='iframe'>密码重置</a></li>
                <li><a href="./php/set_titles_nums.php" target='iframe'>设置题量</a></li>
                <li><a href="./php/add_titles.php" target="iframe">添加试题</a></li>
                <li><a href='./php/update_titles.php' target="iframe">修改试题</a></li>
                <li><a href='./读取excel导入mysql/bb.php' target="iframe">导入题库</a></li>
                <li><a href='./php/reset_titles.php' target="iframe">重置题库</a></li>
                <li><a href="./php/grades_info.php" target="iframe">成绩统计</a></li>
        </div>
        <div class="main-r fr">
            <div class="main-r-top">
                <iframe src="./读取excel导入mysql/bb.php" frameborder="0" class="iframe" name="iframe"></iframe>
            </div>
            <div class="main-r-bottom">
                Copyright @ 2014-2017 admin 开发维护团队.All rights reserved
            </div>
        </div>
    </div>
</body>
</html>