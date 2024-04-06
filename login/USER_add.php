<?php
include_once "../main/basic.php";


$hz_user = $_POST['user'];
$hz_pass = $_POST['pass'];
$hz_passcon = $_POST['passcon'];
$hz_name = $_POST['name'];
$hz_sex  = $_POST['sex'];
$hz_address = $_POST['address'];
$hz_phone = $_POST['phone'];
$hz_jcb  = $_POST['jcb'];

if (!($hz_pass||$hz_user||$hz_address||$hz_sex||$hz_passcon||$hz_phone||$hz_name||$hz_jcb)) {
    set_mess_back("检查输入数据");}
$msql = new mysql();
$time = time(); ///获取时间戳
if($hz_pass==$hz_passcon){
    $sql = "INSERT INTO user_message VALUES ( $time,'$hz_name','$hz_sex','$hz_address','$hz_phone','$hz_jcb')";
    $msql->sg_query($sql);
    if($msql){
        $sqls = "INSERT INTO user VALUES ( '$hz_user','$hz_pass','$time','$time',3,null)";
        if($msql->sg_query($sqls)){  set_mess_back("恭喜,注册完成");
        }else{
            $msql->sg_query("DELETE TABLE doctor_message WHERE ys_id =$time");
            set_mess_back("抱歉,添加失败");
        }
    }else{ set_mess_back("添加出现错误");}
}else{
    set_mess_back("两次密码不一致");
}



