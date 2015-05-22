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
<table>
    <thead>
    <tr>
        <td>管理员id</td>
        <td>管理员姓名</td>
        <td>管理员邮箱</td>
    </tr>
    </thead>
    <tbody>
    <?php foreach($rows as $row): ?>
        <tr>
            <td><?php echo $row["id"]; ?></td>
            <td><?php echo $row["username"]; ?></td>
            <td><?php echo $row["email"]; ?></td>
            <td><input type="button" value="删除" onclick="deleteAdmin(<?php echo $row['id'];?>)"></td>
        </tr>
    <?php endforeach; ?>
    </tbody>
</table>
</body>

<script type="text/javascript">
    function deleteAdmin(id){
        if(window.confirm("确定要删除？")){
            window.location="adminAction.php?act=deleteAdmin&id="+id;
        }
    }
</script>
</html>