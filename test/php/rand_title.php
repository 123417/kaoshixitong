<?php
    include('./public.php');
    $codes=$_GET['userId'];
    $title_id=$_GET['title_id'];//前台传过来的当前的题号加一
    $sql4="select * from myitem_bank where userId='$codes' and titleNum_self='$title_id'";//找出答题库中是否有这个下一题
    $res4=$connect->query($sql4);
    if($res4->num_rows>0){//如果有则会查询题库输出到前台，给下一题
        $arr=$res4->fetch_array();
        $titleNum=$arr['titleNum'];//题库中的题号
        $sql="select * from item_bank where id='$titleNum'";
        $res=$connect->query($sql);
        $arr=$res->fetch_assoc();
        array_pop($arr);
        $arr['title_num']=$title_id;
        echo json_encode($arr);
    }else{//如果没有则会继续随机下一题
        $sql="select * from item_bank";//查询题库总数
        $res=$connect->query($sql);
        $counts=$res->num_rows;
        $rand=rand(1,$counts);
        $sql="select * from user_xinxi where user_code='$codes'";//查询用户名
        $res=$connect->query($sql);
        $arr=$res->fetch_array();
        $names=$arr['user_name'];
        $sql="select * from myitem_bank where userId='$codes' and titleNum='$rand'";//查询答题库中是否有这个，查重
        $res=$connect->query($sql);
        if($res->num_rows>0){
            $sql="select * from myitem_bank where userId='$codes'";
            $res=$connect->query($sql);
            $num=$res->num_rows;
            if($counts>$num){//如果题库大于答题库重新查询
                echo "ok";
            }else{
                echo 'no';
            }
        }else{
            $sql="select * from item_bank where id='$rand'";
            $res=$connect->query($sql);
            $arr=$res->fetch_assoc();//关联数组
            //获取身份证总个数，来得出num总个数---来得出自己题库的题号
            $sql2="select * from myitem_bank where userId='$codes'";
            $res=$connect->query($sql2);
            $num=$res->num_rows+1;
            array_pop($arr);//删除尾部
            $arr['title_num']=$num;
            echo json_encode($arr);
            //确定题库的题号
            
            //插入答题库
            $sql="insert into myitem_bank(user_name,userId,titleNum_self,titleNum) values('$names','$codes','$num','$rand')";
            $connect->query($sql);
        }
    }
    
?>