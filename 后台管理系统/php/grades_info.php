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
    
</body>
</html>