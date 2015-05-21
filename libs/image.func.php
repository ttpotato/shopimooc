<?php
require_once '../include.php';
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
#createVerifyImg();

