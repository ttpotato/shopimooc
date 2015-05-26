<?php
require_once '../include.php';
$page = $_REQUEST['page']?$_REQUEST['page']:1;
$pageSize = 2;
$sql = "select * from imooc_user";
$totalRows = getResultNum($sql);
$totalPage = ceil($totalRows/$pageSize);
$table = 'imooc_user';
$rows = getResultByRows($page, $pageSize, $table);
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>用户列表</title>
</head>
<body>
<table align="center" width="60%" cellspacing="0" cellpadding="6" border="1">
    <thead>
    <tr>
        <th>用户名称</th>
        <th>用户性别</th>
        <th>用户邮箱</th>
        <th>操作</th>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rows as $row): ?>
    <tr>
        <td><?php echo $row['username']; ?></td>
        <td><?php echo $row['sex']; ?></td>
        <td><?php echo $row['email']; ?></td>
        <td><input type="button" name="edit" value="修改" onclick="editUser(<?php echo $row['id']; ?>)">&nbsp<input type="button" name="delete" value="删除" onclick="deleteUser(<?php echo $row['id'] ?>)"></td>
    </tr>
    <?php endforeach ?>
    <?php if($totalRows > $pageSize): ?>
    <tr>
        <td colspan="4"><?php echo showPage($page, $totalPage) ?></td>
    </tr>
    <?php endif; ?>
    </tbody>
</table>
</body>

<script type="text/javascript">
    function editUser(id){
        window.location = "editUser.php?id="+id;
    }
    function deleteUser(id){
        if(window.confirm("确定删除？")){
            window.location = "adminAction?act=deleteUser&id="+id;
        }
    }
</script>

</html>