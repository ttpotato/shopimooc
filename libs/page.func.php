<?php
require_once '../include.php';

$pageSize = 2;
$sql = "select * from imooc_admin";
$totalRows = getResultNum($sql);
echo "totalRows=".$totalRows."<br>";
$totalPage = ceil($totalRows/$pageSize);
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
if($page < 1 || $page == null || !is_numeric($page)){
    $page = 1;
}
if($page >= $totalPage){
    $page = $totalPage;
}
echo "page=".$page;

$offset = ($page - 1) * $pageSize;

$sql = "select * from imooc_admin limit {$offset},{$pageSize}";
$rows = fetchAll($sql);
print_r($rows);

$url = $_SERVER['PHP_SELF'];
for($i = 1; $i <= $totalPage; $i++){
    if($page == $i){
        $p.="[{$i}]";
    }else{
        $p.= "<a href='{$url}?page={$i}'>[{$i}]</a>";
    }
}
echo $p;