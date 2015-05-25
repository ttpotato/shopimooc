<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <title>管理员注册</title>
</head>

<body>
<form method="post" action="adminAction.php?act=addAdmin">
    <center>
    <table width="50%" cellpadding="5" cellspacing="0" border="2">
        <tr>
            <th>管理员名称：</th>
            <td><input type="text" name="adminName"></td>
        </tr>
        <tr>
            <th>管理员密码：</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th>管理员邮箱：</th>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <td></td>
            <td>
                <input type="submit" value="确定" name="submit">
                <input type="reset" value="重置" name="reset">
            </td>
        </tr>
    </table>
    </center>
</body>
</html>
