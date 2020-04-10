<?php
    header("concent-type:text/html;charset=utf-8");
    // 1.接受客户端给我的用户名和密码
    // 以GET方式发送的请求我们用GET接受
    // $_GET所有GET请求的请求体都在这个里面
    // $_GET我们可以理解为array('username'=>'admin')
    $username = $_GET['username'];
    $password = $_GET['password'];
    // 去数据库里面看看有没有这个东西
    $conn = mysqli_connect("localhost",'root','root');
    if(!$conn){
        die("error for connect".mysqli_error($conn));
    }
    mysqli_select_db($conn,'test2020');
    // 写条件查询语句 
    $sql = "select * from `login` 
            where `username` = '$username'
            and `password` = '$password'";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    // 如果$row是false证明没有匹配的内容
    // 如果$row是一个数据证明数据库里面由你传递的用户名和密码匹配的内容
    if($row){
        //登录成功
        // header('location:./login.html')
        echo '你好'.$username;
    }else{
        echo '你的用户名或密码输入错误';
    }
?>