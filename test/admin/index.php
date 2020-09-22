<?php
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="./css/public2.css">
    <link rel="stylesheet" href="./css/reg.css">
    <script src="./js/jquery-1.12.2.js"></script>
    <script src="./js/axios.js"></script>
</head>
<body>
    <div class="test_box">
        <div class="content">
             <div>传智远程考试后台登录</div>
             <div>Welcome to your envoy!</div>
             <div class="user_info">
                 
                 <div><label>用户名：</label><input class="user_info_input" id="user" type="text" placeholder="请输入用户名" /></div>
                 <div><label>密码：</label><input id="pass" class="user_info_input" type="password"  placeholder="请输入密码" /></div>
                 <div><input class="user_info_but" type="button" value="登录" onclick="user_check()" /></div>
             </div>
        </div>
    </div>
    
    <script>
        function user_check(){
            var user=$("#user").val()
            var pass=$("#pass").val()
            
            if(user==""){
                alert('用户名为空');
                $("#user").select()
                return
            }
           
            if(pass==""){
                alert('密码不能为空');
                $("#pass").select()
                return
            }
            // 查看数据库有没有身份证号
            const url='./php/index.php?user='+user+'&pass='+pass  //url
            axios.get(url).then(
                res=>{
                    //console.log(res)
                    if(res=='ok'){
                        window.location.href='main.php?user='+user;
                    }else{
                        alert('账号和密码不正确！')
                    }
                }
            )
            
        }
    </script>
</body>
</html>