<?php

function addPro(){

    $fileNames = fileUpload();
    print_r($fileNames);

    generateThumbnails($fileNames, 0.5, "..".DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."thumbnails".DIRECTORY_SEPARATOR."50");

    $table = "imooc_pro";

    $array = $_POST;
    array_pop($array);
    print_r($array);
    $result = insert($table, $array);
    if ($result == 0) {
        $mes = "添加失败";
    } else {
        $mes = "添加成功<br><a href='addPro.php'>继续添加</a>|<a href='listPro.php'>商品列表</a>";
    }
    return $mes;
}

//echo addPro();