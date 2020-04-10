<?php
    header("content-type:text/html;charset=utf-8");
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost",'root','root');
    mysqli_select_db($conn,"test2020");
    $repeat ="
        select *
        from `login`
        where `username` = '$username'
        and `password` = '$password'
    ";
    $res1 = mysqli_query($conn, $repeat);
    $row = mysqli_fetch_assoc($res1);
    if($row){
        echo '已经被注册';
        die();
    }else{
        $sql = "
         insert
         into login(username,password)
         values('$username','$password')
         ";
      $res = mysqli_query($conn,$sql);
      if($res){
          echo '注册成功';
      }else{
          echo '失败';
      }
    }
?>