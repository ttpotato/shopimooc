<?php

function showPage($page, $totalPage){
//初始设定page，offset
    if($page < 1 || $page == null || !is_numeric($page)){
        $page = 1;
    }
    if($page >= $totalPage){
        $page = $totalPage;
    }

    $url = $_SERVER['PHP_SELF'];
    $prevPage = ($page >= 1)?$page-1:1;
    $nextPage = ($page <= $totalPage)?$page+1:$totalPage;
    $prev = ($page == 1)?"上一页":"<a href='{$url}?page={$prevPage}'>上一页</a>";
    $next = ($page == $totalPage)?"下一页":"<a href='{$url}?page={$nextPage}'>下一页</a>";

/*    foreach($rows as $row){
        echo "编号:".$row['id'],"<br>";
        echo "名称：".$row['username'],"<hr>";
    }*/

    $p = $prev;
    for($i = 1; $i <= $totalPage; $i++){
        if($page == $i){
            $p.="[{$i}]";
        }else{
            $p.= "<a href='{$url}?page={$i}'>[{$i}]</a>";
        }
    }
    $p .= $next;
    return $p;
}
//showPage(2, "imooc_admin");