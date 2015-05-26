<?php
require_once '..\include.php';
$username = $_POST["username"];
$password = $_POST["password"];
$verify = $_POST["verify"];
$verifyString = $_SESSION["verifyString"];

if(strcasecmp($verify, $verifyString) == 0) {
    echo $sql="select * from imooc_admin where username='{$username}' and passwordshopimooc='{$password}'";
    $result = fetchOne($sql);
    if ($result == null){
        alarmAndReturn("用户名密码错误，重新登陆", "login.php");
    }else{
        echo "success";
        $_SESSION['adminName'] = $result['username'];
        $_SESSION['adminId'] = $result['id'];
        alarmAndReturn("登录成功", "index.php");
    }
}else{
    alarmAndReturn("验证码错误", "login.php");
}

#header("Content-type:text/html;charset=utf-8");