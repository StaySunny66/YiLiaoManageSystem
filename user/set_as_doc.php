<?php
include "../main/basic.php";
//// cookie 鉴权
///
$hander = get_msg_hander();
$hz_id= $hander['juese'];
if($hander['juese_id']!=3){

    set_mess_back("不允许患者以外添加");

}

$ys_id = $_GET["ys_id"];
////主治 医生 添加 一个患者可以有多个主治医生
///
///
///
///
if($ys_id){
    $msql = new mysql();
    $add_sql = "INSERT INTO hz_zhuzhi VALUES ($hz_id,$ys_id,'无')";
    if($msql->sg_query($add_sql)){
        set_mess_back("添加完成");
    }else{
        set_mess_back("挂号失败,请勿重复挂号 ");

    }

}else{


    set_mess_back("非法参数!");
}

