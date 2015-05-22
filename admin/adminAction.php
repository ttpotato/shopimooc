<?php
require_once '../include.php';

$act = $_REQUEST['act'];
$id = $_REQUEST['id'];
if($act == "addAdmin"){
    $msg = addAdmin();
}elseif($act == "editAdmin"){
    $msg = editAdmin($id);
}elseif($act == "deleteAdmin"){
    $msg = deleteAdmin($id);
}elseif($act == "addUser"){
    $msg = addUser();
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    echo $msg;
?>
</body>
</html>