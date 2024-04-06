<?php

include './main/mysql.php';

$coo = $_COOKIE['sg_uid'];
$puser = $_POST['user'];
$ppassword = $_POST['password'];
$log_mysql = new  mysql();

if(!$coo||!$puser||!$ppassword){
    echo '错误的访问路径/访问方法';
    return;
}
$t = time();
$IP= $_SERVER['REMOTE_ADDR'];

//echo "测试信息";
$res = $log_mysql->set_cookie_to_user($puser,$ppassword,$coo);
//echo $res->fetch_assoc()['juese_id'];
if($res){
    switch ($res->fetch_assoc()['juese_id']){
        case 1: $log_mysql->sg_query("INSERT INTO login_log values ($t,'$puser',now(),'管理员','$IP')");
            header('location:/admin/?view=main');break; /// 进入管理系统
        case 2: $log_mysql->sg_query("INSERT INTO login_log values ($t,'$puser',now(),'医生','$IP')");
            header('location:/doctor/?view=main');break; /// 进入医生后台
        case 3: $log_mysql->sg_query("INSERT INTO login_log values ($t,'$puser',now(),'患者','$IP')");
            header('location:/user/?view=main');break;   /// 进入患者后台
    }



}else{

// 弹出对话框并且返回原来的页面
echo "<script language=\"JavaScript\">\r\n";
echo " alert(\"登录失败\");\r\n";
// 历史返回；
echo " history.back();\r\n";
echo "</script>";
exit;

}





