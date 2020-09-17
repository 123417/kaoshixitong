<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../css/public.css">
    <style>
        html{
            height:100%
        }
        .pass_box{
            width:100%;
            height:auto;
        }
        .pass_box form{
            width:600px;
            display:block;
            margin:10px auto;
        }
        .pass_box form li{
            height:40px;
            line-height:40px;
            float:left;
            margin-left:10px
        }
        table{
            margin:30px auto;
            border:1px solid #ccc;
        }
        td{
            padding:5px 15px;
            text-align:center;
        }
    </style>
    <script src="../js/jquery-1.12.2.js"></script>
    <script src="../js/vue.js"></script>
    <script src="../js/axios.js"></script>
</head>
<body>
    
    <div class="pass_box">
        <form action="#" method="get" onsubmit="return subfn()">
            <li>
                <span>姓名：</span>
                <input type="text" name="names" id="names">
            </li>
            <li>
                <span>身份证号：</span>
                <input type="text" name="userId" id="userId">
            </li>
            <li>
                <input type="submit" name="sub" value="查询" id="sub">
            </li>
        </form>
    </div><br/>
    <table cellspacing="0" border="1">
        <tr>
            <td>编号</td>
            <td>姓名</td>
            <td>身份证号</td>
            <td>密码重置</td>
            <td>删除用户</td>
        </tr>
        <?php
        include('./public.php');
        if(isset($_GET['sub'])){
            $names=$_GET['names'];
            $codes=$_GET['userId'];
            if($names==''){
                $sql="select * from user_xinxi where user_code='$codes'";
            }
            if($codes==''){
                $sql="select * from user_xinxi where user_name='$names'";
            }
            if($names!='' && $codes!=''){
                $sql="select * from user_xinxi where user_code='$codes' and user_name='$names'";
            }
            $res=$connect->query($sql);
            while($arr=$res->fetch_array()){
        ?>
            <tr>
                <td><?php echo $arr['id'] ?></td>
                <td class="name"><?php echo $arr['user_name'] ?></td>
                <td class="pass"><?php echo $arr['user_code'] ?></td>
                <td onclick="resetfn(<?php echo $arr['id'] ?>)">重置</td>
                <td onclick="delfn(<?php echo $arr['id'] ?>)">删除</td>
            </tr>
        <?php
            }
        }
        ?>
    </table>
    <script>
        function subfn(){
            let names=$("#names").val()
            let userId=$("#userId").val()
            if(names=='' && userId==''){
                alert('用户名或密码为空')
                return
            }
        }
        function resetfn(id){
            let resetVal=prompt("输入你要修改的密码")
            console.log(id)
            $.get('./chongmingm.php?id='+id+'&abc='+resetVal,function(res){
                if(res=='ok'){
                    alert('修改成功')
                }
            })
        }
        function delfn(id){
            $.get('./shanchu.php?id='+id,function(res){
                if(res=='ok'){
                    alert('删除成功')
                }
            })
        }
    </script>
</body>
</html>
