<?php
include "../main/basic.php";
//// cookie 鉴权
$hander = get_msg_hander();
$hz_id= $hander['juese'];
if($hander['juese_id']!=3){
set_mess_back("不允许患者以外添加");
}
$gh_id = $_GET["gh_id"];
if($gh_id){
    $msql = new mysql();
    $result = $msql->sg_query("UPDATE `shujukushixi`.`ghyy_message` SET `gh_num`=`gh_num`-1 WHERE `gh_id`=$gh_id;");
     if($result){
         /// 数量减少成功
         /// 开始在订单池生成订单
         $add_sql = "INSERT INTO yyc VALUES ($gh_id,$hz_id,'无')";
         if($msql->sg_query($add_sql)){
             set_mess_back("挂号完成");
         }else{
             $msql->sg_query("UPDATE `shujukushixi`.`ghyy_message` SET `gh_num`=`gh_num`+1 WHERE `gh_id`=$gh_id;");
             set_mess_back("挂号失败,请勿重复挂号 ");
         }
     }else{
         set_mess_back("抱歉,已无号位 ");
     }
}
