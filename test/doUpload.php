<?php
require_once '../include.php';
print_r($_FILES);
$fileName = $_FILES['testFile']['name'];
$tempName = $_FILES['testFile']['tmp_name'];
$error = $_FILES['testFile']['error'];

$allowExt = array("gif", "jpeg", "jpg", "png");
$path = "images";
$destination = $path."/".$fileName;

if($error == UPLOAD_ERR_OK){
    if(!in_array(getExt($fileName), $allowExt)){//扩展名
        $msg = "不符合扩展名";
    }elseif(!getimagesize($tempName)){//图片？
        $msg = "不是图片文件";
    }elseif(is_uploaded_file($tempName)){//是否是通过HTTP POST上传的？
        if(move_uploaded_file($tempName, $destination)){
            $msg = "文件上传成功";
        }else{
            $msg = "文件上传失败";
        }
    }
}else{
    //上传失败原因
    switch($error){
        case UPLOAD_ERR_CANT_WRITE:
            $msg = "UPLOAD_ERR_CANT_WRIT";
            break;
        case UPLOAD_ERR_EXTENSION:
            $msg  = "UPLOAD_ERR_EXTENSION";
            break;
        case UPLOAD_ERR_FORM_SIZE:
            $msg = "UPLOAD_ERR_FORM_SIZE";
            break;
        case UPLOAD_ERR_INI_SIZE:
            $msg = "UPLOAD_ERR_INI_SIZE";
            break;
        case UPLOAD_ERR_NO_FILE:
            $msg = "UPLOAD_ERR_NO_FILE";
            break;
        case UPLOAD_ERR_NO_TMP_DIR:
            $msg = "UPLOAD_ERR_NO_TMP_DIR";
            break;
        case UPLOAD_ERR_PARTIAL:
            $msg = "UPLOAD_ERR_PARTIAL";
            break;
    }
}
echo $msg;