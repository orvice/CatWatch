<?php
header('Content-type: application/json; charset=utf-8');
require_once 'lib/class/sys.class.php';
require_once 'lib/config.php';
require_once 'lib/vnstat/json.php';
//获取系统信息
$api = new sys();
//vnstat流量
$o = $api->do_sys();
$o['traffic'] = $sum;
$json = json_encode($o);
echo $json;