<?php

function createVerifyImg(){
    $width = 80;
    $height = 28;
    $img = imagecreatetruecolor($width, $height);
    $white = imagecolorallocate($img, 255, 255, 255);
    imagefilledrectangle($img, 1, 1, $width-2, $height-2, $white);
    $fontfiles = array("BELL.TTF", "BRLNSB.TTF", "CALISTI.TTF");
    $chars = getVerifyString();
    $_SESSION["verifyString"] = $chars;
    for($i = 0; $i < 4; $i++) {
        $size = mt_rand(14, 18);
        $angle = mt_rand(-15, 15);
        $x = 5 + $i * $size;
        $y = mt_rand(20, 26);
        $color = imagecolorallocate($img, mt_rand(100, 200), mt_rand(50, 100), mt_rand(100, 200));
        #$fontfile = ROOT.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR.$fontfiles[mt_rand(0, count($fontfiles)-1)];
        $fontfile = ROOT.DIRECTORY_SEPARATOR."fonts".DIRECTORY_SEPARATOR.$fontfiles[mt_rand(0, count($fontfiles)-1)];
        $text = substr ( $chars, $i, 1);
        imagettftext($img, $size, $angle, $x, $y, $color, $fontfile, $text);
    }
    header ( "content-type:image/gif" );
    imagegif ( $img );
    imagedestroy ( $img );
}

function generateThumbnails($fileNames, $percent, $dstDir){

    foreach($fileNames as $file){
        $ext = getExt($file);
        $imageCreateFunction = "imagecreatefrom".$ext;
        $imageMaker = "image".$ext;
        $srcImg = call_user_func($imageCreateFunction, $file);

        list($srcWidth, $srcHeight) = getimagesize($file);
        $dstWidth = ceil($srcWidth * $percent);
        $dstHeight = ceil($srcHeight * $percent);
        $dstImg = imagecreatetruecolor($dstWidth, $dstHeight);
        imagecopyresampled($dstImg, $srcImg, 0, 0, 0, 0, $dstWidth, $dstHeight, $srcWidth, $srcHeight);
        //header("content-type:image/gif");
        $name = strtolower(end(explode(DIRECTORY_SEPARATOR, $file)));
        $dstName = $dstDir.DIRECTORY_SEPARATOR.$name;
        echo $dstName;
        call_user_func($imageMaker, $dstImg, $dstName);
        imagedestroy($dstImg);
    }



}


//$percent = 0.5;
//$dstDir = ROOT.DIRECTORY_SEPARATOR."images".DIRECTORY_SEPARATOR."thumbnails".DIRECTORY_SEPARATOR."new.gif";
//echo generateThumbnails($fileName, $percent, $dstDir);
