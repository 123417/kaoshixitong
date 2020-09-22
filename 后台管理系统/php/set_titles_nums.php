<?php
    include('./public_test.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-1.12.2.js"></script>
    <style>

        .box{
            width:300px;
            margin:50px auto;
        }
    </style>
</head>
<body>
    <div class="box">
        <h3>请设置考试试题的数量</h3>
        <p>考试题数：<span id="nums"></span></p>
        <form action="#" method="get">
            <input type="text" name="num">
            <input type="submit" value="修改" name="sub">
        </form>
    </div>
    <?php
        include('./public.php');
        if(isset($_GET['sub'])){
            $num=$_GET['num'];
            $sql="update systems set max_num='$num'";
            $res=$connect->query($sql);
            if($res){
                echo "<script>alert('修改成功')</script>";
            }
        }
    ?>
    <script>
        $('#nums').load('./pre_max_num.php')
    </script>
</body>
</html>