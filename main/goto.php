<?php

//
//  SG 框架 路由检查器
//  参数  ？to = **  需要转向的view
//
///

$WAY = $_GET['to'];

/// 系统基本跳转函数
/// 数据保存在这里
$DIC = array(
    0=>'/',
    'admin'=>'/admin',
    'login'=>'/login',
    'exit'=>'/exit.php',
);

if(!$DIC[$WAY]||!$WAY) {
    echo '连接指向错误';
    return;
}
