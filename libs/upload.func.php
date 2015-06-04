<?php

function getFileInfo(){
    if(is_array($_FILES['uploadFile']['name'])){
        for($i = 0; $i < count($_FILES['uploadFile']['name']); $i++){
            $files[$i]['name'] = $_FILES['uploadFile']['name'][$i];
            $files[$i]['type'] = $_FILES['uploadFile']['type'][$i];
            $files[$i]['tmp_name'] = $_FILES['uploadFile']['tmp_name'][$i];
            $files[$i]['error'] = $_FILES['uploadFile']['error'][$i];
            $files[$i]['size'] = $_FILES['uploadFile']['size'][$i];
        }
    }else{
        $files[0] = $_FILES['uploadFile'];
    }
    return $files;
}

function fileUpload($path = ROOT.DIRECTORY_SEPARATOR."images", $allowExt = array("gif", "jpeg", "jpg", "png") ){
    //print_r($_FILES);
    //$fileName = $_FILES['testFile']['name'];
    //$tempName = $_FILES['testFile']['tmp_name'];
    //$error = $_FILES['testFile']['error'];
    $fileInfo = getFileInfo();

    $i = 0;
    foreach($fileInfo as $file) {
        $ext = getExt($file['name']);
        $uniqueFileName = getUniqueName($file['name']);
        $destination = $path . DIRECTORY_SEPARATOR . $uniqueFileName . "." . $ext;

        if ($file['error'] == UPLOAD_ERR_OK) {
            if (!in_array($ext, $allowExt)) {//扩展名
                $msg = "不符合扩展名";
            } elseif (!getimagesize($file['tmp_name'])) {//图片？
                $msg = "不是图片文件";
            } elseif (is_uploaded_file($file['tmp_name'])) {//是否是通过HTTP POST上传的？
                if (move_uploaded_file($file['tmp_name'], $destination)) {
                    $msg = "文件上传成功";
                    $filesName[$i] = $destination;
                    $i++;
                } else {
                    $msg = "文件上传失败";
                }
            }
        } else {
            //上传失败原因
            switch ($file['error']) {
                case UPLOAD_ERR_CANT_WRITE:
                    $msg = "UPLOAD_ERR_CANT_WRIT";
                    break;
                case UPLOAD_ERR_EXTENSION:
                    $msg = "UPLOAD_ERR_EXTENSION";
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
    }
    return $filesName;
}
