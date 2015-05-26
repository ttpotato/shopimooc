<?php
require_once '../include.php';
$page = $_REQUEST['page']?(int)$_REQUEST['page']:1;
$pageSize = 2;
$table = "imooc_admin";
$rows = getResultByRows($page, $pageSize, $table);

$sql = "select * from imooc_admin";
$totalRows = getResultNum($sql);
$totalPage = ceil($totalRows/$pageSize);

?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html"; charset="utf-8" />
    <title>管理员列表</title>
</head>

<body>
    <center>
<table width="50%" cellpadding="5" cellspacing="0" border="1">
    <thead>
    <tr>
        <th>管理员编号</th>
        <th>管理员姓名</th>
        <th>管理员邮箱</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td align="center"><input type="button" value="修改" onclick="editAdmin(<?php echo $row['id']; ?>)">&nbsp<input type="button" value="删除" onclick="deleteAdmin(<?php echo $row['id'];?>)"></td>
        </tr>
    <?php endforeach; ?>
    <?php if($totalRows > $pageSize): ?>
    <tr>
        <td content="4"><?php echo showPage($page, $totalPage) ?></td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
    <center>
</body>

<script type="text/javascript">
    function deleteAdmin(id){
        if(window.confirm("确定要删除？")){
            window.location="adminAction.php?act=deleteAdmin&id="+id;
        }
    }
    function editAdmin(id){
        window.location="editAdmin.php?id="+id;
    }
</script>
</html>