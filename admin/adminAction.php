<?php
require_once '../include.php';

$act = $_REQUEST['act'];
$id = $_REQUEST['id']?$_REQUEST['id']:null;
$fileInfo = $_FILES?$_FILES:null;
if($act == "addAdmin"){
    $msg = addAdmin();
}elseif($act == "editAdmin"){
    $msg = editAdmin($id);
}elseif($act == "deleteAdmin"){
    $msg = deleteAdmin($id);
}elseif($act == "addUser"){
    $msg = addUser();
}elseif($act == 'editUser'){
    $msg = editUser($id);
}elseif($act == 'deleteUser'){
    $msg = deleteUser($id);
}elseif($act == "logout"){
    logout();
    $msg = "";
}elseif($act == "addCate"){
    $msg = addCate();
}elseif($act == "deleteCate"){
    $msg = deleteCate($id);
}elseif($act == "uploadImg"){
    $msg = fileUpload();
}elseif($act == "addPro"){
    $msg = addPro();
}
?>

<html>
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<?php
    //echo $msg;
print_r($msg);
?>
</body>
</html>