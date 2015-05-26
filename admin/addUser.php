<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <title>用户注册</title>
</head>

<body>
<form method="post" action="adminAction.php?act=addUser">
    <table>
        <tr>
            <th>用户名称：</th>
            <td><input type="text" name="username"></td>
        </tr>
        <tr>
            <th>用户密码：</th>
            <td><input type="password" name="password"></td>
        </tr>
        <tr>
            <th>用户邮箱：</th>
            <td><input type="text" name="email"></td>
        </tr>
        <tr>
            <th>性别：</th>
            <td>
                <input type="radio" name="sex" value="male">男
                <input type="radio" name="sex" value="female">女
            </td>
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
