<?php

function addCate(){
    $table = "imooc_cate";
    $cateName = $_POST['cateName'];
    $array = array("cateName" => $cateName);

    $result = insert($table, $array);
    if ($result == 0) {
        $mes = "添加失败";
    } else {
        $mes = "添加成功<br><a href='addCate.php'>继续添加</a>|<a href='listCate.php'>分类列表</a>";
    }
    return $mes;
}

function deleteCate($id){
    $table = "imooc_cate";
    $where = "id = {$id}";
    $result = delete($table, $where);
    if($result == 1){
        $mes = "删除成功<br><a href='listCate.php'>分类列表</a>";
    }else{
        $mes = "删除失败<br><a href='listCate.php'>分类列表</a>";
    }
    return $mes;
}

