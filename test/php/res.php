<?php
    //身份证号  题号  答案
    include('./public.php');  //引入公共文件
    $codes=$_GET['codes'];   //身份证
    $title_num=$_GET['title_num'];  //题号
    $res=$_GET['res'];   //答案
    $max_num=$_GET['max_num'];    //总题数
    $sql="select * from user_pool where codes='$codes' and title_num_self='$title_num'";
    $r=$conn->query($sql);
    $arr=$r->fetch_array();
    //转成数组看看答案是否是空的，空的是提交，有的话修改
    if($arr['results']==''){
        echo '提交答案!';
    }else{
        echo '更新答案！';
    }
    if($res!='' and $res!='undefined'){   //防止提交不能识别的答案
        $sql="update user_pool set results='$res' where codes='$codes' and title_num_self='$title_num'";
        $conn->query($sql);
    }
   
    $id=$arr['title_num'];  // 总题库id
    $sql2="select * from item_pool where id='$id'";
    $r2=$conn->query( $sql2);
    $arr2=$r2->fetch_array();
    $rights=$arr2["rights"];  // 正确答案
    //比对答案，看看考了多少题，计算出每道题多少分
    $fs=100/$max_num;   //每道题分数
    $fs2=0;  //不得分
    if($rights==$res){   //正确答案和传递的答案相同，给分
        $sql="update user_pool set grades='$fs' where codes='$codes' and title_num_self='$title_num'";
        $conn->query($sql);
    }else{
        $sql="update user_pool set grades='$fs2' where codes='$codes' and title_num_self='$title_num'";
        $conn->query($sql);
    } 
?>