<?php
include_once "../main/basic.php";

/// 添加一部 cookie 验证 防止恶意提交
get_msg_hander();

$doc_user = $_POST['user'];
$doc_pass = $_POST['pass'];
$doc_passcon = $_POST['passcon'];

$doc_name = $_POST['name'];
$doc_sex  = $_POST['sex'];
$doc_zc = $_POST['zc'];
$doc_keshi = $_POST['keshi'];

if (!($doc_pass||$doc_user||$doc_zc||$doc_sex||$doc_passcon||$doc_keshi||$doc_name)) {

    set_mess_back("检查输入数据");


}

$msql = new mysql();
//// 第一次查询 建立医生表
///
///
$time = time();
if($doc_pass==$doc_passcon){
    $sql = "INSERT INTO doctor_message VALUES ( $time,'$doc_name','$doc_sex','$doc_zc','$doc_keshi')";
    $msql->sg_query($sql);
    if($msql){
        $sqls = "INSERT INTO user VALUES ( '$doc_user','$doc_pass','$time','$time',2,null)";
        //echo $sqls;

        if($msql->sg_query($sqls)){
            set_mess_back("恭喜,医生账号添加完成");
        }else{
            $msql->sg_query("DELETE TABLE doctor_message WHERE ys_id =$time");
            set_mess_back("抱歉,添加失败");



        }



    }else{

        set_mess_back("添加出现错误");

    }





}else{

    set_mess_back("两次密码不一致");


}



