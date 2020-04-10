<?php
    $username = $_POST['username'];
    $password = $_POST['password'];
    $conn = mysqli_connect("localhost","root","root");
    mysqli_select_db($conn,"test2020");
    $sql ="
        select *
        from `login`
        where `username` = '$username'
        and `password` = '$password'
    ";
    $res = mysqli_query($conn,$sql);
    $row = mysqli_fetch_assoc($res);
    if($row){
        echo '登录成功';
    }else{
        echo '登录失败';
    }
?>