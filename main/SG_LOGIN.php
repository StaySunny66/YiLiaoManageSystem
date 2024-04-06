<?php
//**
//  SG 框架 登录验证脚本
//  MySQL 引擎
//
//
include 'mysql.php';
include 'cookie.php';



///
/// 认证函数
/// 更新 cookie 认证
/// 返回 认证结果
///
function yanzheng($user,$password,$cookie){
    if(!$user||!$cookie||!$password){
        echo 'login_error';
        return;
    }
    $GSQ = new mysql();
    $COOKIE =   new  cookie();

    $sql = "SELECT *FROM user WHERE userid = '".$user."' AND  password =  '".$password."'";
    $result = $GSQ->sg_query($sql);
    if($result->num_rows!=1){
       // echo '查询错误/登录错误';
        return;
    }
    $arr = $result->fetch_assoc();
    $COOKIE->zhuce_cookie($cookie,$arr['userid']);
    return true;
}



/// 用户注册函数
function zhuce($user,$password){
    $GSQ = new mysql();
    $sql =
        "INSERT INTO `sg_user`.`user` (`uid`,`userid`,`password`,`quanxian`) VALUES (NULL,'".$user."','".$password."',1);";

    $GSQ->sg_query($sql);
    $GSQ->sg_close();
}
















