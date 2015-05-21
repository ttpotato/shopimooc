<html>
<head>
    <meta http-equiv="Content-Type" content="text/html"; charset="utf-8" />
    <title>管理员注册</title>
</head>

<body>
<form method="post" action="addAdmin.php">
    <table>
        <tr>
            <th>管理员名称：</th>
            <th>
                <input type="text" name="adminName">
            </th>
        </tr>
        <tr>
            <th>密码：</th>
            <th>
                <input type="password" name="password">
            </th>
        </tr>
        <tr>
            <th>邮箱：</th>
            <th>
                <input type="text" name="email">
            </th>
            <th>
                <input type="submit" value="确定" name="submit">
                <input type="reset" value="重置" name="reset">
            </th>
        </tr>
    </table>mysqli_insert_id
</form>
<?php
require_once '../include.php';

$adminName = $_POST["adminName"];
$password = $_POST["password"];
$email = $_POST["email"];

$link = connect();
$table = "imooc_admin";
$array = array("adminName" => $adminName, "password" => $password, "email" => $email);
$result = insert($link, $table, $array);
if($result == 0){
    alarmAndReturn("增加管理员错误", "addAdmin.php");
}else{
    alarmAndReturn("success", "addAdmin.php");
}

?>
</body>
</html>
