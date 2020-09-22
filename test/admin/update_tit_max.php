<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='./index.php'</script>";
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="./js/jquery-1.12.2.js"></script>
    <style>
        .box{ width: 400px; height: 100px; margin: auto; margin-top: 200px;}
        .box label{ display: inline-block; width: 100px; line-height: 25px;}
        .box input[type='text']{ width: 150px; height: 20px;}
        .box input[type='button']{ width:100px; margin-left: 20px; height: 25px; }
    </style>
</head>
<body>
    <div class="box">
        <div id="ms"></div>
        <label>最大题数：</label><input type="text" id="max" /><input type="button" value="修改" onclick="max_set()" />
    </div>
    <script>
       //$('#max').val().load('./max.php');
       $.get('./max.php',function(res){
            $("#max").val(res)
       })
       function max_set(){
            var max = $("#max").val()
            $.get('./php/max_set.php?max='+max,function(res){
                    //console.log(res)
                    if(res=='ok'){
                        alert('修改成功！')
                    }
            })
       }
    </script>
</body>
</html>