<?php
///**
/// SG 框架 mysql 数据库部分
///  简单封装数据库 简化后续数据查询
///  shilight.cn
/////
class mysql
{
    private   $user="gxysjk";
    private   $password="@gxy7788521";
    private   $host="rm-uf6d33kic42132w9ano.mysql.rds.aliyuncs.com";
    private   $BDname="shujukushixi";
    private   $connect;
    //构建函数
    function __construct() {
        $this->connect = mysqli_connect($this->host,$this->user,$this->password,$this->BDname);
        if (!$this->connect)
        {
            exit("
            <h1> SG 框架错误提示 ~_~</h1>
                            <h3> 无法连接到数据库  ~_~</h3>
            
            " );
        }
    }


    //查询函数
    function sg_query($sql){
        return mysqli_query($this->connect,$sql);
    }


    //通过cookie查找用户
    //返回 时间戳  用户名  用户UID
    function cookie_to_user($cookie){
        if(strlen($cookie)!=32){
            return false;
        }
       $sql = "SELECT *FROM user WHERE cookie_id = '".$cookie."'";
       $result = $this->sg_query($sql);
        if($result->num_rows==0){
            return false;
        }
        $result = $result->fetch_assoc();
        if(time() - $result["login_time"] > 3600){
            return false;
        }
        return $result;

    }

    // 登记cookie
    // 账号密码不对是登记不了的
    function set_cookie_to_user($user,$password,$cookie) {
        //1.先执行查询//2.插入
        $sql_1 = "SELECT *FROM user WHERE user='".$user."' AND pass = '".$password."'";
        $sql_2 = "UPDATE user SET cookie_id = '".$cookie."' ,login_time = unix_timestamp() WHERE  user='".$user."' AND  pass = '".$password."';";
        $data = $this->sg_query($sql_1);
        if($data->num_rows!=1){
            return false;
        }else{
            /// 保存cookie 信息
            if($this->sg_query($sql_2)){
                return $data;
            }else{
                return  false;
            }
        }
    }


    //对象关闭函数
    function sg_close(){
        mysqli_close($this->connect);
    }
}