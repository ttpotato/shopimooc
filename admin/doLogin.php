<?php
require_once '..\include.php';
$username = $_POST["username"];
$password = $_POST["password"];
$verify = $_POST["verify"];
$verifyString = $_SESSION["verifyString"];

if(strcasecmp($verify, $verifyString) == 0) {
    $link = connect();
    echo $sql="select * from imooc_admin where username='{$username}' and passwordshopimooc='{$password}'";
    $result = fetchOne($link, $sql);
    if ($result == null){
        alarmAndReturn("用户名密码错误，重新登陆", "login.php");
    }else{
        echo "success";
        alarmAndReturn("登录成功", "index.php");
    }
}else{
    alarmAndReturn("验证码错误", "login.php");
}

#header("Content-type:text/html;charset=utf-8");