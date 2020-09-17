<?php
    include('./public.php');
    $codes=$_GET['userId'];
    $nums=$_GET['nums'];
    $result=$_GET['res'];
    // echo $result;
    // 查找序号
    $sql2="select * from myitem_bank where userId='$codes' and titleNum_self='$nums'";
    $ins=$connect->query($sql2);
    $arr=$ins->fetch_array();
    if($arr['myItem_right']==''){
        echo 'ok';
    }else{
        echo 'no';
    }
    $tiku_num=$arr['titleNum'];
    // 插入自己的答案
    if($result!='' and $result!='undefined'){
        $sql1="update myitem_bank set myitem_right='$result' where userId='$codes' and titleNum_self='$nums'";
        $a=$connect->query($sql1);
    }
    // 查询题库得出正确答案
    $sql3="select * from item_bank where id='$tiku_num'";
    $ins3=$connect->query($sql3);
    $arr3=$ins3->fetch_array();
    $rights=$arr3['item_right'];
    // 插入分数
    $each_num=2;
    $each_num1=0;
    if($rights==$result){
        $sql="update myitem_bank set grades='$each_num' where userId='$codes' and titleNum_self='$nums'";
        $connect->query($sql);
    }else{
        $sql="update myitem_bank set grades='$each_num1' where userId='$codes' and titleNum_self='$nums'";
        $connect->query($sql);
    }
?>