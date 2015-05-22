<?php
function addAdmin(){
    $adminName = $_POST["adminName"];
    $password = $_POST["password"];
    $email = $_POST["email"];

    $link = connect();
    $table = "imooc_admin";
    $array = array("username" => $adminName, "passwordshopimooc" => $password, "email" => $email);
    #var_dump($array);
    $result = insert($link, $table, $array);
    if ($result == 0) {
        $mes = "添加失败";
    } else {
        $mes = "添加成功<br><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}

function listAllAdmin(){
    $link = connect();
    $sql = "select * from imooc_admin";
    $rows = fetchAll($link, $sql, $result_type = MYSQL_ASSOC);
    return $rows;
}

function deleteAdmin($id){
    $link = connect();
    $table = "imooc_admin";
    $where = "id = $id";
    $result = delete($link, $table, $where);
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

    $link = connect();
    $table = "imooc_user";
    $array = array("username" => $adminName, "password" => $password, "email" => $email);
    #var_dump($array);
    $result = insert($link, $table, $array);
    if ($result == 0) {
        $mes = "添加失败";
    } else {
        $mes = "添加成功<br><a href='addAdmin.php'>继续添加</a>|<a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}


