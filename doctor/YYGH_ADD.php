<?php
include_once "../main/basic.php";
$handel = get_msg_hander();

if($handel['juese_id']!=2){

    set_mess_back("权限不足");

}
$ys_id = $handel['juese'];
$date = $_POST["date"];
$num = $_POST["num"];
$name = $_POST["name"];

if(!($date||$name|$num)){
        set_mess_back("输入有误");
}

$msql = new mysql();

$sql = "INSERT INTO ghyy_message values (null,'$date','$name',$num,$ys_id)";

if($msql->sg_query($sql)){

    set_mess_back("添加成功");

}else{

    set_mess_back("抱歉 添加失败");

}