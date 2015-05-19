<?php
function getVerifyString(){
    $chars = join("", array_merge(range(0, 9), range('a', 'z'), range('A', 'Z')));
    $chars = str_shuffle($chars);
    return substr($chars, 0, 4);
}