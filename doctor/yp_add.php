<?php
include "../main/basic.php";
//// cookie 鉴权
///
$hander = get_msg_hander();
$hz_id = $_GET["hz_id"];
$ys_id= $hander['juese'];
$num = $_POST['num'];
$name = $_POST['name'];
if($hander['juese_id']!=2){
    set_mess_back("不允许医生以外开药");
}
if($hz_id){
    $msql = new mysql();
    $sq = "UPDATE `shujukushixi`.`yp_message` SET `yp_num`=`yp_num`-$num WHERE `yp_name`='$name';";
    $result = $msql->sg_query($sq);
    if($result){
        /// 数量减少成功
        $yp_id = $msql->sg_query("SELECT yp_id FROM `shujukushixi`.yp_message WHERE yp_name = '$name'")->fetch_assoc()['yp_id'];
        /// 开始在订单池生成订单
        $add_sql = "INSERT INTO `shujukushixi`.yp_order VALUES (null,$hz_id,$ys_id,$yp_id,$num)";
        if($msql->sg_query($add_sql)){
            set_mess_back("开药成功");
        }else{
            $msql->sg_query("UPDATE `shujukushixi`.`yp_message` SET `yp_num`=`yp_num`+$num WHERE `yp_name`=$name;");
            set_mess_back("开药失败");
        }
    }else{
        set_mess_back("抱歉,药品库存不足");
    }
}
