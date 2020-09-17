<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script src="../js/jquery-1.12.2.js"></script>
    <style>
        form{
            display:block;
            width:300px;
            margin:50px auto;
        }
        h3{
            text-align: center;
        }
        label{
            display:block;
            margin:10px 0;
        }
        .first input{
            margin-left:35px
        }
        .second select{
            margin-left:30px
        }
        .xuanxiang input{
            margin-left:25px
        }
    </style>
</head>
<body>
    <form action="#" method="post">
        <h3>请添加试题</h3>
        <label for="" class="first"><span>题目：</span><input type="text" name="title"></label>
        <label for="" class="second">
            <span>类型：</span>
            <select name="sels" >
                <option value="单选题" name="danxuan">单选题</option>
                <option value="多选题" name="duoxuan">多选题</option>
            </select>
        </label>
        <label for="" class="xuanxiang"><span>A选项：</span><input type="text" name="A"></label>
        <label for="" class="xuanxiang"><span>B选项：</span><input type="text" name="B"></label>
        <label for="" class="xuanxiang"><span>C选项：</span><input type="text" name="C"></label>
        <label for="" class="xuanxiang"><span>D选项：</span><input type="text" name="D"></label>
        <label for="">
            <span>正确答案：</span>
            <select name="rights" id="sels">
                <option value="A" name="A">A</option>
                <option value="B" name="B">B</option>
                <option value="C" name="C">C</option>
                <option value="D" name="D">D</option>
            </select>
        </label>
        <input type="submit" name="sub" value="提交">
    </form>
</body>
</html>
<?php
    include('./public.php');
    if(isset($_POST['sub'])){
        $names=$_POST['title'];
        $sels=$_POST['sels'];
        $A=$_POST['A'];
        $B=$_POST['B'];
        $C=$_POST['C'];
        $D=$_POST['D'];
        $rights=$_POST['rights'];
        $sql="insert into item_bank(titles,item_type,A,B,C,D,item_right) values('$names','$sels','$A','$B','$C','$D','$rights')";
        $res=$connect->query($sql);
        if($res){
            echo "<script>alert('添加成功')</script>";
        }
    }
    
?>
