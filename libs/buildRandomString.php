<?php
/**
 * Created by PhpStorm.
 * User: yuanyihui
 * Date: 2015/5/18
 * Time: 17:57
 */
function buildRandomString($len){
    $chars = array_merge(range(0,9), range('a','z'), range('A','Z'));
    str_shuffle($chars);
    return substr($chars,0,len-1);
}