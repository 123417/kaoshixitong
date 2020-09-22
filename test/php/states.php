<?php
     include('./public.php');  //引入公共文件
    // 身份证号 题号 
    $codes=$_GET['codes'];   // 身份证号
    $title_num=$_GET['title_num'];   //自己做的题号
    $sql="select * from user_pool where codes='$codes' and title_num_self='$title_num'";
    $res=$conn->query($sql);
    $arr=$res->fetch_array();
    @$results=$arr['results'];
    //echo '自己的答案'.$title_num.$results=$arr['results'];   //自己的答案
    //echo $results=$arr['results']; 
    if($results==''){
        echo "empty";
    }else{
       echo $results;
    }
?>