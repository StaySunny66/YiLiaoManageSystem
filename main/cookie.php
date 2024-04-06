<?php
///
/// cookie 验证操作函数
///  让浏览器 记住你的登录状态
///
///


function set_cookie(){
    if(!cookie_chick()){
        $raw = time() + rand(1000,9999) + rand(1000,9999) + rand(1000,9999);
        $raw = md5($raw);
        setcookie('sg_uid',$raw,time()+36000,'/');
    }

}

function cookie_chick(){
    $cookie = $_COOKIE['sg_uid'];
    if(strlen($cookie)!=32){
        return false;
    }
    return true;
}

function get_cookie(){

   if(strlen($_COOKIE['sg_uid'])!=32){
       return false;
   }
   if(!$_COOKIE['sg_uid']){
       return false;
   }
   return $_COOKIE['sg_uid'];

}
