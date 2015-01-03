<?php
header("Content-type: text/html; charset=utf-8");
require_once 'lib/class/sys.class.php';
require_once 'lib/config.php';
$api = new sys();
$o = $api->do_sys();
$json = json_encode($o);
echo $json;