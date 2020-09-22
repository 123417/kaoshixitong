<?php
session_start();
if(!$_SESSION['admin']==''){

?>

<meta charset="UTF-8">
<link href="./css/public.css" rel="stylesheet" />
<link href="./css/reset_pass.css" rel="stylesheet" />
<script src="./js/jquery-1.12.2.js"></script>
<div class="reset_view">
    <form method='post' action="#" onsubmit="return formCheck()">
        <li><label>姓名:</label><input id="names" type="text" name="names" /></li>
        <li><label>身份证号：</label><input id="codes" type="text" name="codes" /></li>
        <li><input type="submit" value="查询" name="submit" id="submit" /> </li>
    </form>
</div>

<script>
    function formCheck(){
        var names=$('#names').val()
        var codes=$('#codes').val()
        if(names=='' && codes==''){
            alert('输入的姓名或身份证号为空！')
            return false
        }
    }

</script>
<table border='1' cellspacing='0'>
    <tr>
        <td>编号</td>
        <td>姓名</td>
        <td>身份证号</td>
        <td>密码重置</td>
        <td>删除用户</td>
    </tr>
    <?php
    include('./public.php');
    if(isset($_POST['submit'])){
        $names=$_POST['names'];
        $codes=$_POST['codes'];
        if($names==''){
            $sql="select * from users where codes='$codes'";
        }
        if($codes==''){
            $sql="select * from users where names='$names'";
        }
        if($names!='' and $codes!=''){
            $sql="select * from users where names='$names' and codes='$codes'";
        }
        $res=$conn->query($sql);
        while($arr=$res->fetch_array()){
  
?>
    <tr>
        <td><?php  echo $arr['id']  ?></td>
        <td><?php  echo $arr['names']  ?></td>
        <td><?php  echo $arr['codes']  ?></td>
        <td><a href="reset_action.php?id=<?php echo $arr['id']; ?>">重置</a></td>
        <td><a href="del_action.php?id=<?php echo $arr['id']; ?>">删除</a></td>
    </tr>

    <?php
                  
                }
            }
  }else{
      echo "<script>window.location.href='./index.php'</script>";
  }
    ?>
</table>