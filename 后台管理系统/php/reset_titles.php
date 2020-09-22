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
            width:200px;
            height:200px;
            margin:30px auto
        }
        .box>button{
            display:block;
            width:100%;
            height:30px;
            margin:10px 0;
        }
    </style>
</head>
<body>
    <div class="box">
        <button onclick="reset_tiku('item_bank')">重置考试题库</button>
        <button onclick="reset_tiku('user_time')">重置考试时间</button>
        <button onclick="reset_tiku('user_xinxi')">重置考试成绩</button>
        <button onclick="reset_tiku('myitem_bank')">重置答题库</button>
    </div>
    <script>
        function reset_tiku(val){
            if(confirm('你确定要重置吗？')){
                $.get('./reset_titles_s.php?a='+val,function(res){
                    console.log(res)
                    if(res=='ok'){
                        alert('重置成功')
                    }
                })
            }
        }
    </script>
</body>
</html>
