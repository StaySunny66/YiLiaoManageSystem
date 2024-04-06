<?php
$vid = $_GET['view'];
require_once '../main/cookie.php';
require_once '../main/mysql.php';
include '../main/basic.php';

//$ms = new mysql();

$to_way = $_GET['view'];
$live_user = $_GET['live_user'];
$live_id = $_GET['live_id'];
$hander = get_msg_hander();


// 医生后台 路由列表
$router = array(
    'main'=>'view/dashboard.php',
    'WDYY' =>'view/ZL_WDYY.php',
    'WDHZ'=>'view/ZL_WDHZ.php',
    'KY'=>'view/ZL_KY.php',
    'login_out'=>'login_out.php'
);


if(!$hander['user']){
    header('HTTP/1.0 403 Forbidden');
    return;
}
if(!$router[$to_way]){
    header('HTTP/1.0 403 Forbidden');
    return;
}

require_once $router[$to_way];












