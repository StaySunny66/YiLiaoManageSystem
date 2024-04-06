<?php
include_once "../main/basic.php";

/// 添加一部 cookie 验证 防止恶意提交
get_msg_hander();
$yp_id = $_POST['id'];
$yp_name = $_POST['name'];
$yp_num = $_POST['num'];
$sql = "INSERT INTO yp_message VALUES ($yp_id,'$yp_name',$yp_num)";
//echo $sql;
$msql = new mysql();
if($msql->sg_query($sql)){

    set_mess_back("添加完成");

}else{
    set_mess_back("添加失败");
}
