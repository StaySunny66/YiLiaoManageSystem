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


// 患者后台 路由列表
// 实现功能
// 产看自己药品订单
// 挂号预约
//
$router = array(
    'main'=>'view/dashboard.php',
    'WDCF' =>'view/ZL_WDCF.php',
    'ZXGH'=>'view/ZL_ZXGH.php',
    'ZZYS'=>'view/ZL_ZZYS.php',
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












