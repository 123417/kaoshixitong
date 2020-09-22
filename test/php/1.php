<?php
 
require_once 'curl.func.php';
 
$appkey = '467c32efd3faa020';//你的appkey
$type = 'A3';// 驾照类型 A1,A3,B1,A2,B2,C1,C2,C3,D,E,F
$subject = 4;// 1：科目一  4：科目四
$pagenum = 1;
$pagesize = 800;
$sort = 'normal';// normal：顺序查询 rand：随机查询
$url = "https://api.jisuapi.com/driverexam/query?appkey=$appkey&type=$type&subject=$subject&pagenum=$pagenum&pagesize=$pagesize&sort=$sort";
$result = curlOpen($url, ['ssl'=>true]);
$jsonarr = json_decode($result, true);
//exit(var_dump($jsonarr));
 
if($jsonarr['status'] != 0)
{
    echo $jsonarr['msg'];
    exit();
}
 
$result = $jsonarr['result'];
 include("./public.php"); //引入公共文件
// echo $result['total'].' '.$result['pagenum'].' '.$result['pagesize'].' '.$result['subject'].' '.$result['type'].' '.$result['sort'];
foreach($result['list'] as $val)
{  
	$pic=$val['pic'];
	if($pic==""){
		$question=$val['question'];
		$option1=$val['option1']==''?'√':$val['option1'];
		$option2=$val['option2']==''?'×':$val['option2'];
		$option3=$val['option3']==''?'无':$val['option3'];
		$option4=$val['option4']==''?'无':$val['option4'];
		$answer=$val['answer']=="对"?'A':'B';
		$pic=$val['pic'];
		echo $question.'<br>'.$option1.'<br>'.$option2.'<br>'.$option3.'<br>'.$option4.'<br>'.$answer.'<br>'.$pic;
		$sql="insert into item_pool(titles,types,A,B,C,D,rights) values('$question','单选','$option1','$option2','$option3','$option4','$answer')";
		$conn->query($sql);
	}
	
	// echo $val['pic'].'<br>';
	
}
?>