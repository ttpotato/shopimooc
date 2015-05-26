<?php
require_once '../include.php';
$id = $_REQUEST['id'];
$sql = "select username,email from imooc_user where id = {$id}";
$row = fetchOne($sql);
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html" charset="utf-8" />
    <title>编辑用户信息</title>
</head>
<body>
<form method="post" action="adminAction.php?act=editUser&id=<?php echo $row['id'] ?>" />
<table>
    <tr>
        <th>用户名</th>
        <td><input type="text" name="username" value=<?php echo $row['username']?></td>
    </tr>
    <tr>
        <th>邮箱</th>
        <td><input type="text" name="email" value=<?php echo $row['email']?> </td>
    </tr>
    <tr>
        <td colspan="2">
            <input type="submit" value="确定" name="submit">
            <input type="reset" value="重置" name="reset">
        </td>
    </tr>
</table>
</body>
</html>