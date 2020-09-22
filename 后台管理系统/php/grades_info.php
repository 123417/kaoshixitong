<?php
    include('./public_test.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        table{
            width:600px;
            margin:30px auto;
        }
        td{
            text-align: center;
        }
    </style>
</head>
<body>
    <table border="1" cellspacing="0">
        <tr>
            <td>序号</td>
            <td>用户名</td>
            <td>身份证号</td>
            <td>总成绩</td>
        </tr>
        <?php
            include('./public.php');
            $sql="select * from user_xinxi";
            $res=$connect->query($sql);
            while($arr=$res->fetch_array()){
        ?>
            <tr>
                <td><?php echo $arr['id'] ?></td>
                <td><?php echo $arr['user_name'] ?></td>
                <td><?php echo $arr['user_code'] ?></td>
                <td><?php echo $arr['total_grade'] ?></td>
            </tr>
        <?php
            }
        ?>
        
    </table>
    <div style="width:100%;height:50px;text-align:center;line-height:50px">
        <a>导出excel文件</a>
    </div>
    <script>
        var html="<html><head><meta charset='utf-8'></head><body>"+document.getElementsByTagName('table')[0].outerHTML+"</body></html>"
        var blob=new Blob([html],{type:"application/vnd.ms-excel"})
        var a=document.getElementsByTagName('a')[0]
        a.href=URL.createObjectURL(blob)
        a.download="学生成绩表.xls"
    </script>
</body>
</html>