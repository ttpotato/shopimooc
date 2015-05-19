<?php
require_once 'include.php';

$link = connect();
$table = "imooc_admin";
#$array = array("username"=>"test4", "passwordshopimooc"=>"123456","email"=>"123@baidu.com");
$sql = "select * from imooc_admin";
var_dump(fetchAll($link, $sql, $result_type = MYSQL_ASSOC));
