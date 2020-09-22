<?php
session_start();
if(!isset($_SESSION['admin'])){
    echo "<script>window.location.href='../index.php';</script>";
}
 include('./public.php');
 if(isset($_GET['id'])){
     $id=$_GET['id'];
 }
 if(isset($_POST['submit'])){
     $id=$_POST['id'];
 }
 if(!isset($id)){
     $id=1;
 }
?>
<meta charset="UTF-8">
<link href="./css/public.css" rel="stylesheet" />
<link href="./css/reset_pass.css" rel="stylesheet" />
<link rel="stylesheet" href="./css/add_title.css">   
<script src="./js/jquery-1.12.2.js"></script>

<form method='post' action="#" onsubmit="return formCheck()" name='form1'>
    <div class="reset_view">
        <li><label>id:</label><input id="id" type="text" name="id" value="<?php echo $id; ?>" /></li>
        <li><input type="submit" value="查询" name="submit" id="submit" /> </li>
    </div>
</form>

<form method="post" name="form2" action="./php/edit_title.php">
    <table class='table'  border='1' cellspacing='0' width='800'>
<?php
        $sql="select * from item_pool where id='$id'";
        $res=$conn->query($sql);
        $arr=$res->fetch_array();
        if($arr){
?>
            <tr>
                <td>题目：</td>
                <td><input type="text" id="title" name="title" value="<?php echo $arr['titles']; ?>"  placeholder='请输入题目'></td>
            </tr>
            <tr>
                <td>题型：</td>
                <td style="text-align: left; padding-left:30px">
                    <select id="select" name="select">
                       <?php
                            if($arr['types']=='单选'){
                                echo "<option selected value='单选'>单选</option>";
                                echo "<option value='多选'>多选</option>";
                            }else{
                                echo "<option selected value='多选'>多选</option>";
                                echo "<option value='单选'>单选</option>";
                            }
                       ?>
                    </select>
                </td>
            </tr>
            <tr>
                <td>A选项：</td>
                <td>
                    <input type="text" id="A" name="A" placeholder='格式：A:××××××' value=" <?php echo $arr['A']; ?>">
                    <input type="hidden" name="ids" value="<?php echo $arr['id']  ?>" />
                </td>
            </tr>
            <tr>
                <td>B选项：</td>
                <td><input type="text" id="B"  name="B" placeholder='格式：B:××××××' value=" <?php echo $arr['B']; ?>"></td>
            </tr>
            <tr>
                <td>C选项：</td>
                <td><input type="text" id="C" name="C" placeholder='格式：C:××××××' value=" <?php echo $arr['C']; ?>"></td>
            </tr>
            <tr>
                <td>D选项：</td>
                <td><input type="text" id="D" name="D" placeholder='格式：D:××××××' value="<?php echo $arr['D']; ?>"></td>
            </tr>
            <tr>
                <td>正确答案：</td>
                <td><input type="text" id="R" name="R" placeholder='复选答案请用英文逗号分隔，如：A,B,C' value="<?php echo $arr['rights']; ?>"></td>
            </tr>
            <tr style="height:50px">
                <td colspan='2'>
                    <input type="submit" name='sub2' value="修改" style="width:100px; height:30px" />
                </td>
            </tr>
    <?php
        }else{
    ?>
        <tr>
            <td colspan='2'>没有查到数据</td>
        </tr>
    <?php
        }
    ?>
    </table>
</form>
<script>
    function formCheck(){
        var id=$('#id').val()
        if(id==''){
            alert('输入的题号为空！')
            return false
        }
    }
</script>