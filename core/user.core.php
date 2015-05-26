<?php
function addUser(){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $sex = $_POST['sex'];
    $email = $_POST['email'];
    $regTime = time();
    $activeFlag = 0;

    $array = array("username" => $username, "password" => $password, "sex" => $sex, "email" => $email, "regTime" => $regTime, "activeFlag" => $activeFlag);

    $table = 'imooc_user';
    $id = insert($table, $array);

    if($id != 0){
        $mes = "添加成功<br><a href='addUser.php'>继续添加</a>|<a href='listUser.php'>用户列表</a>";
    }else{
        $mes = "添加失败！";
    }
    return $mes;
}

function editUser($id){
    $username = $_POST['username'];
    $email = $_POST['email'];
    $table = 'imooc_user';
    $array = array('username'=>$username, 'email'=>$email);
    $where = "id = {$id}";
    $result = update($table, $array, $where);
    if ($result != 1) {
        $mes = "编辑失败";
    } else {
        $mes = "编辑成功<br><a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}

function deleteUser($id){
    $table = 'imooc_user';
    $where = "id = {$id}";
    $result = delete($table, $where=null);
    if ($result != 1) {
        $mes = "删除失败";
    } else {
        $mes = "删除成功<br><a href='listAdmin.php'>管理员列表</a>";
    }
    return $mes;
}