<?php
function addAdmin(){
    $adminName = $_POST["adminName"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $table = "imooc_admin";
    $array = array("username" => $adminName, "passwordshopimooc" => $password, "email" => $email);
    #var_dump($array);
    $result = insert($table, $array);
    if ($result == 0) {
        $mes = "添加失败";
    } else {
        $mes = "添加成功<br><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}

function listAllAdmin(){
    $sql = "select * from imooc_admin";
    $rows = fetchAll($sql, $result_type = MYSQL_ASSOC);
    return $rows;
}

function deleteAdmin($id){
    $table = "imooc_admin";
    $where = "id = $id";
    $result = delete($table, $where);
    if($result == 1){
        return $mes = "删除成功";
    }else{
        return $mes = "删除失败";
    }
}

function addUser(){
    $adminName = $_POST["adminName"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $table = "imooc_user";
    $array = array("username" => $adminName, "password" => $password, "email" => $email);
    #var_dump($array);
    $result = insert($table, $array);
    if ($result == 0) {
        $mes = "添加失败";
    } else {
        $mes = "添加成功<br><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}

function checkLogined(){
    if($_SESSION['adminId'] == ""){
        alarmAndReturn("请先登录", "doLogin.php");
    }
}

function logout(){
    $_SESSION = array();
    if(isset($_COOKIE[session_name()])){
        setcookie(session_name(), "", time()-1);
    }
    if(isset($_COOKIE['adminId'])){
        setcookie("adminId", "", time()-1);
    }
    if(isset($_COOKIE['adminName'])){
        setcookie("adminName", "", time()-1);
    }
    session_destroy();
    header("location:login.php");
}

function editAdmin($id){
    $adminName = $_POST["adminName"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $table = "imooc_admin";
    $array = array("username" => $adminName, "passwordshopimooc" => $password, "email" => $email);
    #var_dump($array);
    $where = "id = '{$id}'";
    $result = update($table, $array, $where);
    echo $result;
    if ($result != 1) {
        $mes = "编辑失败";
    } else {
        $mes = "编辑成功<br><a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}
