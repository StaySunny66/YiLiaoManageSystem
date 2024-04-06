<?php
    $hander = get_msg_hander();
    //$data = get_dashboard_data($hander);
  //  var_dump($data);

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>管理员后台</title>

    <!--css 引入-->
    <link href="../../resource/vendor/fontawesome-free/css/all.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,200i,300,300i,400,400i,600,600i,700,700i,800,800i,900,900i" rel="stylesheet">
    <link href="../../resource/css/sb-admin-2.min.css" rel="stylesheet">
    <script src="../../resource/js/view/mqtt.min.js"></script>
    <script src="../../resource/js/view/home.js"></script>

    <!-- 引入样式 -->
    <script src="https://lib.baomitu.com/vue/2.6.14/vue.common.dev.js"></script>
    <script src="https://lib.baomitu.com/element-ui/2.15.7/index.js"></script>

    <script src="https://upcdn.b0.upaiyun.com/libs/jquery/jquery-2.0.2.min.js"></script>

</head>
<style>

    @import url("https://lf9-cdn-tos.bytecdntp.com/cdn/expire-1-M/element-ui/2.15.7/theme-chalk/index.css");

</style>

<body id="page-top " onload="on_open();on_open_control()">

<script>





</script>

<!-- 页面包装 -->
<div id="wrapper">

    <!-- 侧边栏 -->
    <ul class="navbar-nav bg-gradient-primary sidebar sidebar-dark accordion" id="accordionSidebar">

        <!-- Sidebar - Brand -->
        <a class="sidebar-brand d-flex align-items-center justify-content-center" href="index.html">
            <div class="sidebar-brand-icon rotate-n-15">
                <i class="fas fa-laugh-wink"></i>
            </div>
            <div class="sidebar-brand-text mx-3">管理员<sup>后台</sup></div>
        </a>

        <!-- Divider -->
        <hr class="sidebar-divider my-0">

        <!-- Nav Item - Dashboard -->
        <li class="nav-item active">
            <a class="nav-link" href="/admin/?view=main">
                <i class="fas fa-fw fa-tachometer-alt"></i>
                <span>总览</span></a>
        </li>

        <!-- 分割线 -->
        <hr class="sidebar-divider">


        <!-- 标题 -->
        <div class="sidebar-heading">
            医疗
        </div>

        <!-- 菜单 1 -->
        <li class="nav-item">
            <a class="nav-link collapsed" href="#" data-toggle="collapse" data-target="#collapseTwo"
               aria-expanded="true" aria-controls="collapseTwo">
                <i class="fas fa-fw fa-cog"></i>
                <span>数据查看</span>
            </a>
            <div id="collapseTwo" class="collapse" aria-labelledby="headingTwo" data-parent="#accordionSidebar">
                <div class="bg-white py-2 collapse-inner rounded">
                    <h6 class="collapse-header">资产查看</h6>
                    <a class="collapse-item" href="/admin/?view=YSLB">医生列表</a>
                    <a class="collapse-item" href="/admin/?view=HZLB">患者列表</a>
                    <a class="collapse-item" href="/admin/?view=YPLB">药品列表</a>
                    <a class="collapse-item" href="/admin/?view=DLRZ">登录日志</a>
                </div>
            </div>
        </li>







        <!-- Divider -->
        <hr class="sidebar-divider d-none d-md-block">

        <!-- Sidebar Toggler (Sidebar) -->
        <div class="text-center d-none d-md-inline">
            <button class="rounded-circle border-0" id="sidebarToggle"></button>
        </div>

    </ul>
    <!-- 侧边栏结束 -->

    <!-- 内容部分 -->
    <div id="content-wrapper" class="d-flex flex-column">

        <!-- Main Content -->
        <div id="content">

            <!-- 顶部栏 -->
            <nav class="navbar navbar-expand navbar-light bg-white topbar mb-4 static-top shadow">

                <!-- 侧边栏开关  -->
                <button id="sidebarToggleTop" class="btn btn-link d-md-none rounded-circle mr-3">
                    <i class="fa fa-bars"></i>
                </button>

                <!-- 搜索 -->
                <form
                    class="d-none d-sm-inline-block form-inline mr-auto ml-md-3 my-2 my-md-0 mw-100 navbar-search">
                    <div class="input-group">
                        <input type="text" class="form-control bg-light border-0 small" placeholder="输入搜索内容..."
                               aria-label="Search" aria-describedby="basic-addon2">
                        <div class="input-group-append">
                            <button class="btn btn-primary" type="button">
                                <i class="fas fa-search fa-sm"></i>
                            </button>
                        </div>
                    </div>
                </form>

                <!-- Topbar Navbar -->
                <ul class="navbar-nav ml-auto">

                    <!-- Nav Item - Search Dropdown (Visible Only XS) -->
                    <li class="nav-item dropdown no-arrow d-sm-none">
                        <a class="nav-link dropdown-toggle" href="#" id="searchDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <i class="fas fa-search fa-fw"></i>
                        </a>
                        <!-- Dropdown - Messages -->
                        <div class="dropdown-menu dropdown-menu-right p-3 shadow animated--grow-in"
                             aria-labelledby="searchDropdown">
                            <form class="form-inline mr-auto w-100 navbar-search">
                                <div class="input-group">
                                    <input type="text" class="form-control bg-light border-0 small"
                                           placeholder="Search for..." aria-label="Search"
                                           aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        <button class="btn btn-primary" type="button">
                                            <i class="fas fa-search fa-sm"></i>
                                        </button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </li>

                    <!-- 分割线 -->

                    <div class="topbar-divider d-none d-sm-block"></div>



                    <!-- 顶栏  用户信息 -->
                    <li class="nav-item dropdown no-arrow">
                        <a class="nav-link dropdown-toggle" href="#" id="userDropdown" role="button"
                           data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                            <span class="mr-2 d-none d-lg-inline text-gray-600 small" id = "doctor_user"><?php echo $hander['userid']; ?></span>
                            <img class="img-profile rounded-circle"
                                 src="../resource/img/undraw_profile.svg">
                        </a>
                        <!-- 按下 用户头像 -->
                        <div class="dropdown-menu dropdown-menu-right shadow animated--grow-in"
                             aria-labelledby="userDropdown">

                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="3" data-toggle="modal" data-target="#logoutModal">
                                <i class="fas fa-sign-out-alt fa-sm fa-fw mr-2 text-gray-400"></i>
                                注销登录
                            </a>
                        </div>
                    </li>

                </ul>

            </nav>
            <!-- 顶部栏 结束 -->

            <!-- 主体内容开始 -->
            <div class="container-fluid">

                <!-- Page Heading -->
                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                    <h1 class="h3 mb-0 text-gray-800">总览</h1>
                </div>

                <!-- Content Row -->
                <div class="row">

                    <!-- 显示文章 数量 -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-primary shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-primary text-uppercase mb-1">
                                            患者总数 (名)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo get_user_num()?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-calendar fa-2x text-primary"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- Earnings (Monthly) Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-danger shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-danger text-uppercase mb-1">
                                            医生总数 (名)</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800"><?php echo get_doctor_num()?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-ban fa-2x text-danger"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>



                    <!-- Pending Requests Card Example -->
                    <div class="col-xl-3 col-md-6 mb-4">
                        <div class="card border-left-warning shadow h-100 py-2">
                            <div class="card-body">
                                <div class="row no-gutters align-items-center">
                                    <div class="col mr-2">
                                        <div class="text-xs font-weight-bold text-warning text-uppercase mb-1">
                                            药品总数</div>
                                        <div class="h5 mb-0 font-weight-bold text-gray-800" id="web_open"><?php echo getyaopin_num()?></div>
                                    </div>
                                    <div class="col-auto">
                                        <i class="fas fa-comments fa-2x text-warning"></i>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>


                <!-- Content Row -->
                <div class="row">

                    <div class="col-lg-6">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">药品添加</h6>
                            </div>
                            <div class="card-body " style="padding-top: 30px;padding-left: 10px">
                                <div class="p-1 ">
                                    <p>修改/添加 药品信息</p>

                                    <div  style="width: 100%; display: block;">
                                        <form action="./YP_add.php" method="post">

                                            <div class="form-group" >
                                                <label for="line1">药品编号</label>
                                                <input id="l1" type="text" class="form-control" name="id">
                                                <label for="line1">药品名称</label>
                                                <input id="l1" type="text" class="form-control" name="name">
                                                <label for="line1">药品数量</label>
                                                <input id="l1" type="text" class="form-control" name="num">
                                            </div>
                                            <div>
                                                <button id="renow" type="submit"  class=" mt-2 btn btn-primary">
                                                    <span class="text" id="renow">添加/更新</span>
                                                </button>

                                            </div>

                                        </form>

                                    </div>



                                </div>



                            </div>
                        </div>


                    </div>
                    <div class="col-lg-6">

                        <!-- Circle Buttons -->
                        <div class="card shadow mb-4">
                            <div class="card-header py-3">
                                <h6 class="m-0 font-weight-bold text-primary">医生注册</h6>
                            </div>
                            <div class="card-body " style="padding-top: 30px;padding-left: 10px">
                                <!-- Circle Buttons (Default) -->
                                <div class="p-1 ">
                                    <div  style="width: 100%; display: block;">
                                        <form action="./DOCTOR_add.php" method="post">



                                            <table  class="table table table-condensed bg-white">
                                                <tr>
                                                    <td>
                                                        <div class="form-group" >
                                                            <label for="line1">账号</label>
                                                            <input id="l1" type="text" class="form-control" name="user">
                                                            <label for="line1">密码</label>
                                                            <input id="l1" type="password" class="form-control" name="pass">
                                                            <label for="line1">确认密码</label>
                                                            <input id="l1" type="password" class="form-control" name="passcon">
                                                        </div>
                                                    </td>
                                                    <td>
                                                        <div class="form-group" >
                                                            <label for="line1">姓名</label>
                                                            <input id="l1" type="text" class="form-control" name="name">
                                                            <label for="line1">性别</label>
                                                            <input id="l1" type="text" class="form-control" name="sex">
                                                            <label for="line1">职称</label>
                                                            <input id="l1" type="text" class="form-control" name="zc">
                                                            <label for="line1">科室</label>
                                                            <input id="l1" type="text" class="form-control" name="keshi">
                                                        </div>
                                                    </td>

                                                </tr>

                                            </table>

                                            <div>
                                                <button id="renow" type="submit"  class=" mt-2 btn btn-primary">
                                                    <span class="text" id="renow">注册医生</span>
                                                </button>

                                            </div>

                                        </form>

                                    </div>



                                </div>


                            </div>
                        </div>


                    </div>



                </div>



            </div>

        </div>
        <!-- 主体内容结束 -->
        <footer class="sticky-footer bg-white">
            <div class="container my-auto">
                <div class="copyright text-center my-auto">
                    <span>Copyright &copy; 数据库实习大作业 2022 河北科技师范学院</span>
                </div>
                <div class="copyright text-center my-auto">
                    <span>前端基于 SB Admin 2  bootstrap</span>
                </div>
            </div>
        </footer>

    </div>
    <!-- End of Main Content -->

</div>
<!-- End of Content Wrapper -->

</div>
<!-- End of Page Wrapper -->

<!-- Scroll to Top Button-->
<a class="scroll-to-top rounded" href="#page-top">
    <i class="fas fa-angle-up"></i>
</a>

<!-- Logout Modal-->
<div class="modal fade" id="logoutModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">确定注销?</h5>
                <button class="close" type="button" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">注销登录后，需要重新登录.</div>
            <div class="modal-footer">
                <button class="btn btn-secondary" type="button" data-dismiss="modal">取消</button>
                <a class="btn btn-primary" href="/admin/index.php?view=login_out">注销</a>
            </div>
        </div>
    </div>
</div>

<!-- Bootstrap core JavaScript-->
<script src="../../resource/vendor/jquery/jquery.min.js"></script>
<script src="../../resource/vendor/bootstrap/js/bootstrap.bundle.min.js"></script>

<!-- Core plugin JavaScript-->
<script src="../../resource/vendor/jquery-easing/jquery.easing.min.js"></script>

<!-- Custom scripts for all pages-->
<script src="../../resource/js/sb-admin-2.min.js"></script>

<!-- Page level plugins -->
<script src="../../resource/vendor/chart.js/Chart.min.js"></script>

<!-- Page level custom scripts -->
<script src="../../resource/js/demo/chart-area-demo.js"></script>
<script src="../../resource/js/demo/chart-pie-demo.js"></script>


</body>

</html>
