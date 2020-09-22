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
            margin: 20px auto;
            text-align: center;
        }
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
        #form{
            display:none
        }
        #box1{
            width:600px;
            height:40px;
            line-height: 40px;
            margin:0px auto;
            text-align:center;
            border:1px solid #ccc
        }
    </style>
</head>
<?php
    include('./public.php');
    if(isset($_POST['sub'])){
        $id=$_POST['title_num'];
        $names=$_POST['title'];
        $sels=$_POST['sels'];
        $A=$_POST['A'];
        $B=$_POST['B'];
        $C=$_POST['C'];
        $D=$_POST['D'];
        $rights=$_POST['rights'];
        $sql="update item_bank(titles,item_type,A,B,C,D,item_right) values('$names','$sels','$A','$B','$C','$D','$rights')";
        $sql="update item_bank set titles='$names',item_type='$sels',A='$A',B='$B',C='$C',D='$D',item_right='$rights' where id='$id'";
        $res=$connect->query($sql);
        if($res){
            echo "<script>alert('修改成功')</script>";
        }
    } 
?>

<body>
    <div class="box">
        <input type="text" placeholder="输入你要修改的题号" id="title_cha" > 
        <input type="button" value="查询" onclick="chaxunfn()">
    </div>
    <div id="box1">
        现在没有数据，请查询！
    </div>
    <form action="#" method="post" id="form">
        <input type="hidden" name="title_num" id="title_num" >
        <label for="" class="first"><span>题目：</span><input type="text" name="title" id="title"></label>
        <label for="" class="second">
            <span>类型：</span>
            <select name="sels" id="sels">
                <option value="单选题" name="danxuan">单选题</option>
                <option value="多选题" name="duoxuan">多选题</option>
            </select>
        </label>
        <label for="" class="xuanxiang"><span>A选项：</span><input type="text" name="A" id="A"></label>
        <label for="" class="xuanxiang"><span>B选项：</span><input type="text" name="B" id="B"></label>
        <label for="" class="xuanxiang"><span>C选项：</span><input type="text" name="C" id="C"></label>
        <label for="" class="xuanxiang"><span>D选项：</span><input type="text" name="D" id="D"></label>
        <label for="">
            <span>正确答案：</span>
            <input type="text" name="rights" id="sels_right">
        </label>
        <input type="submit" name="sub" value="修改">
    </form>
</body>
</html>
<script>
    function chaxunfn(){
        let title_cha=$('#title_cha').val();
        if(title_cha==''){
            alert("你输入的内容为空")
            $('#box1').show()
            $('#form').hide()
            return false
        }
        $('#box1').hide()
        $('#form').show()
        $.get('./titles_cha.php?title_cha='+title_cha,function(res){
            console.log(JSON.parse(res))
            let lists=JSON.parse(res);
            $('#title').val(lists.titles)
            $('#sels').val(lists.item_type)
            $('#A').val(lists.A)
            $('#B').val(lists.B)
            $('#C').val(lists.C)
            $('#D').val(lists.D)
            $('#sels_right').val(lists.item_right)
            $('#title_num').val(lists.id)
        })
    }
</script>


