<?php
session_start();
define("ROOT",dirname(__FILE__));
set_include_path(".".PATH_SEPARATOR.ROOT.PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."libs".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."core".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."configs".PATH_SEPARATOR.ROOT.DIRECTORY_SEPARATOR."fonts".PATH_SEPARATOR.get_include_path());
require_once 'image.func.php';
require_once 'string.func.php';
require_once 'mysql.func.php';
require_once 'configs.php';
require_once 'common.func.php';