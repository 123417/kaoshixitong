<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        echo "<script>window.location.href='../index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/del_title.css" rel="stylesheet" />
    <script src="./js/jquery-1.12.2.js"></script>
</head>
<body>
    <div class='box'>
        <button onclick="reset_test(1)">重置试题</button>
        <button onclick="reset_test(2)">重置考试时间</button>
        <button onclick="reset_test(3)">重置考生</button>
        <button onclick="reset_test(4)">重置答题库</button>
    </div>
    <script>
        function reset_test(value){
            var enter=window.confirm('你确定要重置吗？')
            if(enter){
                //ajax
                $.get('./php/reset_test.php?test='+value,function(res){
                    if(res=='ok'){
                        alert('重置成功！')
                    }
                })
            }
        }

    </script>
</body>
</html>