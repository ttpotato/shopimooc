<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <title>管理员注册</title>
</head>

<body>
<form method="post" action="adminAction.php?act=addAdmin">
    <table>
        <tr>
            <th>管理员名称：</th>
            <th><input type="text" name="adminName"></th>
        </tr>
        <tr>
            <th>管理员密码：</th>
            <th><input type="password" name="password"></th>
        </tr>
        <tr>
            <th>管理员邮箱：</th>
            <th><input type="text" name="email"></th>
        </tr>
        <tr>
            <th>
                <input type="submit" value="确定" name="submit">
                <input type="reset" value="重置" name="reset">
            </th>
        </tr>
    </table>
</body>
</html>
