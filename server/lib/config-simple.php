<?php
/*
 * CatWatch配置文件
 * https://github.com/orvice/CatWatch
 * Author @orvice
 * https://orvice.org
 */

//Define DB Connection
define('DB_HOST','localhost');
define('DB_USER','root');
define('DB_PWD','password');
define('DB_DBNAME','db');
define('DB_CHARSET','utf8');

/*
 * DO NOT EDIT THIS
 */



//Version
$version   ="0.1.2";

//set timezone
date_default_timezone_set('PRC');

//Using Mysqli
$dbc = new mysqli(DB_HOST,DB_USER,DB_PWD,DB_DBNAME);
$db_char = DB_CHARSET;
$dbc->query("SET NAMES utf8");
$dbc->query("SET time_zone = '+8:00'");

//定义流量
$tomb = 1024*1024;
$togb = $tomb*1024;



/*
 * Edit this
 */



//name
$site_name = "CatWatch";
