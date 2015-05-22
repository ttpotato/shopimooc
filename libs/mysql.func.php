<?php

function connect(){
    $link = mysqli_connect(DB_HOST, DB_USER, DB_PASSWORD) or die("连接数据库失败");
    mysqli_select_db($link,DB_NAME) or die("打开数据库失败");
    return $link;
}
#INSERT INTO $table ($keys) VALUES ('$values');
function insert($link, $table, $array){
    $keys = join(",",array_keys($array));
    $values="'".join("','",array_values($array))."'";
    $sql = "INSERT INTO $table ($keys) VALUES ($values)";
    mysqli_query($link, $sql);
    return mysqli_insert_id($link);
}

#DELETE FROM $table WHERE $where;
function delete($link, $table, $where=null){
    $where = $where==null?null:"WHERE $where";
    $sql = "DELETE FROM $table $where";
    mysqli_query($link, $sql);
    return mysqli_affected_rows($link);
}

#UPDATE $table SET $keys=$values,$keys=$values WHERE $where;
function update($link, $table, $array, $where){
    $str = "";
    if(count(array_keys($array)) >= 1) {
        foreach ($array as $key => $val) {
            $str = $str.$key ."= \"{$val}\",";
        }
        $str = substr($str, 0, count($str)-2);
    }else{
        $str = array_keys($array)."=".array_values($array);
    }
    $where = $where==null?null:"WHERE $where";
    $sql = "UPDATE $table SET $str $where";
    mysqli_query($link, $sql);
    echo $sql;
    return mysqli_affected_rows($link);
}

function fetchOne($link, $sql, $result_type = MYSQL_ASSOC){
    $result = mysqli_query($link, $sql);
    if (!$result) {
        printf("Error: %s\n", mysqli_error($link));
        exit();
    }
    $row = mysqli_fetch_array($result, $result_type);
    return $row;
}

function fetchAll($link, $sql, $result_type = MYSQL_ASSOC){
    $result=mysqli_query($link, $sql);
    while($row=mysqli_fetch_array($result,$result_type)){
        $rows[]=$row;
    }
    return $rows;
}