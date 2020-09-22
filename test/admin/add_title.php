<?php
    session_start();
    if(!isset($_SESSION['admin'])){
        echo "<script>window.location.href='./index.php';</script>";
    }
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="./css/add_title.css" rel="stylesheet" />
    <script src="./js/jquery-1.12.2.js"></script>
</head>
<body>
    <?php
         include('./public.php');
         $sql="select * from item_pool";
         $res=$conn->query($sql);
         $num=$res->num_rows;
    ?>
    <div id="ms"><span>题库题数是：</span><span><?php echo $num; ?></span></div>
    <form action="./php/add_title.php" method="post" name="form">
        <table class='table'  border='1' cellspacing='0' width='800'>
            <tr>
                <td>题目：</td>
                <td><input type="text" id="title" name="title"  placeholder='请输入题目'></td>
            </tr>
            <tr>
                <td>题型：</td>
                <td style="text-align: left; padding-left:30px">
                    <select id="select" name="select">
                        <option value="单选">单选</option>
                        <option value="多选">多选</option>
                    </select>
                </td>
            </tr>
            <tr>
                <td>A选项：</td>
                <td><input type="text" id="A" name="A" placeholder='格式：A:××××××'></td>
            </tr>
            <tr>
                <td>B选项：</td>
                <td><input type="text" id="B"  name="B" placeholder='格式：B:××××××'></td>
            </tr>
            <tr>
                <td>C选项：</td>
                <td><input type="text" id="C" name="C" placeholder='格式：C:××××××'></td>
            </tr>
            <tr>
                <td>D选项：</td>
                <td><input type="text" id="D" name="D" placeholder='格式：D:××××××'></td>
            </tr>
            <tr>
                <td>正确答案：</td>
                <td><input type="text" id="R" name="R" placeholder='复选答案请用英文逗号分隔，如：A,B,C'></td>
            </tr>
        </table>
        <div class="submit_box">
            <input type="submit" value="试题提交" id="sub" onclick="return check()">
        </div>
    </from>
    <script>
       function check(){
          var title=$("#title").val()
          if(title==''){
              alert('试题不能为空！')
              $("#title").select()
              return false
          }
          var A=$("#A").val()
          if(A==''){
              alert('A答案不能为空！')
              $("#A").select()
              return false
          }
          var B=$("#B").val()
          if(B==''){
              alert('B答案不能为空！')
              $("#B").select()
              return false
          }
          var C=$("#C").val()
          if(C==''){
              alert('C答案不能为空！')
              $("#C").select()
              return false
          }
          var D=$("#D").val()
          if (D == ''){
				alert('D答案不能为空！')
				$("#D").select()
				return false
			}
          var R=$("#R").val()
          if (R == ''){
				alert('正确答案不能为空！')
				$("#R").select()
				return false
			}
       } 
    </script>
</body>
</html>