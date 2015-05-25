<?php
require_once '../include.php';
$rows = listAllAdmin();
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
        <th>管理员id</th>
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