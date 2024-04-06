<?php
require_once '../main/cookie.php';
if(!get_cookie()){

    set_cookie();
}

?>
<!DOCTYPE html>
<html lang="zh">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>后台登录</title>

    <!-- Custom fonts for this template-->
    <link href="../resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link
            href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i"
            rel="stylesheet">

    <!-- Custom styles for this template-->
    <link href="../resource/css/sb-admin-2.min.css" rel="stylesheet">

</head>

<body class="bg-gradient-primary">

<div class="container">

    <!-- Outer Row -->
    <div class="row justify-content-center">

        <div class="col-xl-10 col-lg-12 col-md-9 mt-5">

            <div class="card o-hidden border-0 shadow-lg my-5 ">
                <div class="card-body p-0">
                    <!-- Nested Row within Card Body -->
                    <div class="row">
                        <div class="col-lg-6 d-none d-lg-block   p-5 "  style="background-image: url(https://phplearn.shilight.cn/resource/images/login_bg.jpg)">

                            <div class="text-center p-5 ">
                                <h1 class="h2  mb-4 text-white">欢迎使用</h1>
                            </div>
                            <div class="text-center p-1  " style="background: rgba(79,89,217,0.62) ;border-radius: 6px">
                                <h1 class="h4   text-white">医院医疗信息管理平台</h1>
                            </div>

                        </div>
                        <div class="col-lg-6">
                            <div class="p-5">
                                <div class="text-center">
                                    <h1 class="h4 text-gray-900 mb-4">统一登录平台!</h1>
                                </div>
                                <form class="user" action="../login.php" method="post">
                                    <div class="form-group">
                                        <input type="text" class="form-control form-control-user"
                                               id="exampleInputEmail" aria-describedby="emailHelp" name="user"
                                               placeholder="用户名...">
                                    </div>
                                    <div class="form-group">
                                        <input type="password" class="form-control form-control-user" name="password"
                                               id="exampleInputPassword" placeholder="密码">
                                    </div>
                                    <div class="form-group">
                                        <div class="custom-control custom-checkbox small">
                                            <input type="checkbox" class="custom-control-input" id="customCheck">
                                            <label class="custom-control-label" for="customCheck">记住我</label>
                                        </div>
                                    </div>
                                    <button class="btn btn-primary btn-user btn-block" >
                                        登录
                                    </button>
                                    <hr>

                                </form>
                                <div class="text-center">
                                    <a class="small" href="forgot-password.html">忘记密码 ?</a>
                                </div>
                                <div class="text-center">
                                    <a class="small" href="register.html">注册账号 !</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

        </div>

    </div>

</div>

<!-- Bootstrap core JavaScript-->
<script src="../resource/vendor/jquery/jquery.min.js"></script>
<script src="../resource/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../resource/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../resource/js/sb-admin-2.min.js"></script>

</body>

</html>