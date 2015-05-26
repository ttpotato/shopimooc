<?php
require_once '../include.php';
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
$pageSize = 2;
$sql = "select * from imooc_cate";
$totalRows = getResultNum($sql);
$totalPage = ceil($totalRows/$pageSize);

$table = "imooc_cate";
$rows = getResultByRows($page, $pageSize, $table);
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>分类列表</title>
</head>
<body>
<center>
    <table width="50%" cellpadding="5" cellspacing="0" border="1">
        <thead>
        <tr>
            <th>分类名称</th>
            <th>操作</th>
        </tr>
        </thead>
        <tbody>
        <?php foreach($rows as $row): ?>
            <tr>
                <td><?php echo $row["cateName"]; ?></td>
                <td align="center"><input type="button" value="删除" onclick="deleteCate(<?php echo $row['id'];?>)"></td>
            </tr>
        <?php endforeach; ?>
        <?php if($totalRows > $pageSize): ?>
            <tr>
                <td colspan="2" align="center"><?php echo showPage($page, $totalPage) ?></td>
            </tr>
        <?php endif; ?>
        </tbody>
    </table>
    <center>
</body>


<script type="text/javascript">
    function deleteCate(id){
        if(window.confirm("确认删除？")){
            window.location = "adminAction.php?act=deleteCate&id="+id;
        }
    }
</script>
</html>