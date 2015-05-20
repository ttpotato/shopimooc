<?php
function alarmAndReturn($msg, $url) {
        echo "<script>alert('{$msg}');</script>";
        echo "<script>window.location='{$url}';</script>";
}
