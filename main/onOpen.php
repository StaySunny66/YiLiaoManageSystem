<?php
// 登录跳转检查函数
require_once 'mysql.php';
require_once 'cookie.php';
include 'basic.php';
$my = new mysql();
$onopen_cookie = get_cookie();
$msg_hander = $my->cookie_to_user($onopen_cookie);
//var_dump($msg_hander);

if(!$msg_hander){
    set_cookie();
    go_to('/login/');

    return ;

}
    go_to('/admin/?view=main');


//var_dump($my->set_cookie_to_user('gxyos','gxy7788521','12345678999999'));
