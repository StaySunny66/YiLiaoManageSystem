<?php
require_once 'cookie.php';
require_once 'mysql.php';

function go_to($url){
    header('location:'.$url);
}


// 得到数据主体
function get_msg_hander(){
    $msql = new mysql();
    return $msql->cookie_to_user(get_cookie());
}
// 得到患者数据
function get_user_message($hz_id){
    $msql = new mysql();
    return $msql->sg_query("SELECT * FROM user_message WHERE hz_id = $hz_id")->fetch_assoc();
}

/// 得到自己的开药订单
function get_my_ky_list($hz_id){

    $msql = new mysql();
    //echo "SELECT * FROM order_mess WHERE hz_id = $hz_id";
    return $msql->sg_query("SELECT * FROM order_mess WHERE hz_id = $hz_id")->fetch_all();

}


//// 得到主治医生的患者数量{
function get_zz_hz_num($ys_id){
    return (new mysql())->sg_query("SELECT COUNT(*) FROM hz_zhuzhi WHERE ys_id = ".$ys_id)->fetch_assoc()["COUNT(*)"];

}

//// 得到我的预约患者
///
///
function get_my_yy_user_list($ys_id){


    return (new mysql())->sg_query("select * from ghyy_mess where doctro_id = ".$ys_id)->fetch_all();

}


//// 得到我的主治患者
function get_my_user_list($ys_id){
    $sql = " SELECT * FROM user_message WHERE hz_id IN (
     SELECT hz_id FROM hz_zhuzhi WHERE ys_id = $ys_id

 ) ";

    return (new mysql())->sg_query($sql)->fetch_all();

}


// 框架 错误返回
function sg_err($id){
    if($id == 403){
        exit("
            <h1> SG 框架错误提示 ~_~</h1>
                            <h3> 鉴权错误 操作被禁止 ~_~</h3>
            " );

    }
    if($id==4031){
        exit("
            <h1> SG 框架错误提示 ~_~</h1>
                            <h3> 鉴权错误 来源地址不被允许 ~_~</h3>
            " );


    }


}

/// 获取 首页数据
function get_dashboard_data($hander){
    if(!$hander){
        return false;
    }

    $msql = new mysql();
    return $msql->sg_query('SELECT * FROM `performance` ORDER BY per_uid DESC LIMIT 1;')->fetch_object();


}

//// 获取用户基本信息
function get_user_data($user_hander){
    /// 参数合法性检测
    if(!$user_hander){
        return false;
    }
    /// 获取当前用户角色id
    $juese = $user_hander['juese'];
   // echo $juese;
    $sql = 'SELECT * FROM `user_message` WHERE hz_id = '.$juese.';';
  ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_assoc();
}


//// 获取用户的预约信息
//// 传入信息 用户id user_id
function get_user_yuyue_data($user_id){
    /// 参数合法性检测
    if(!$user_id){
        return false;
    }
    $sql = ' SELECT ghyy_message.gh_name,ghyy_message.gh_date,doctor_message.ys_name,doctor_message.ys_keshi FROM '.
        'yyc,ghyy_message,doctor_message WHERE yyc.gh_id = ghyy_message.gh_id AND ghyy_message.doctro_id = doctor_message.ys_id '.
        'AND yyc.hz_id = '.$user_id;
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_all();
    //// 返回查询数据
}



///// 得到医生数量
function get_doctor_num(){

    $sql = 'SELECT COUNT(*) FROM doctor_message';
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_assoc()['COUNT(*)'];

}


///// 得到患者数量
function get_user_num(){

    $sql = 'SELECT COUNT(*) FROM user_message';
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_assoc()['COUNT(*)'];

}

///// 得到药品总类别数量
function getyaopin_num(){

    $sql = 'SELECT COUNT(*) FROM yp_message';
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_assoc()['COUNT(*)'];

}

function set_mess_back($message){

    echo "<script language=\"JavaScript\">\r\n";
    echo " alert(\"$message\");\r\n";
    echo " history.back();\r\n";
    echo "</script>";
    exit;


}

////获取医生列表
function get_doctor_list(){

    $sql = "SELECT * FROM doctor_message";
    //echo $sql;
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_all();

}
////获取医生列表
function get_yp_list(){

    $sql = "SELECT * FROM yp_message";
    //echo $sql;
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_all();

}

////获取医生列表
function get_user_list(){

    $sql = "SELECT * FROM user_message";
    //echo $sql;
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_all();

}


////获取登录日志
function get_LOG_list(){

    $sql = "SELECT * FROM login_log";
    //echo $sql;
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_all();

}


/// 获取挂号列表
///
function get_yygh_list(){

    $sql = "SELECT * FROM ghyy_message";
    //echo $sql;
    ///echo $sql;
    $msql = new mysql();
    return $msql->sg_query($sql)->fetch_all();

}







