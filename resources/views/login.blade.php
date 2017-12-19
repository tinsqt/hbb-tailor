<!DOCTYPE html>
<html>

<head>
    <meta charset="UTF-8">
    <meta content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no" name="viewport">
    <title>.:Đăng nhập:.</title>
    <!-- Favicon-->
    <link rel="icon" href="favicon.ico" type="image/x-icon">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Roboto:400,700&subset=latin,cyrillic-ext" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet" type="text/css">

    <base href="{{asset('')}}">

    <!-- Bootstrap Core Css -->
    <link href="plugins/bootstrap/css/bootstrap.css" rel="stylesheet">

    <!-- Waves Effect Css -->
    <link href="plugins/node-waves/waves.css" rel="stylesheet" />

    <!-- Animation Css -->
    <link href="plugins/animate-css/animate.css" rel="stylesheet" />

    <!-- Custom Css -->
    <link href="css/style.css" rel="stylesheet">
</head>

<body class="login-page">
<div class="login-box">
    <div class="logo">
        <a href="javascript:void(0);">Admin<b> TAILOR</b></a>
        <small>Trang quản lý Tailor - HBB Solutions</small>
    </div>
    <div class="card">
        <div class="body">
            <form id="sign_in" method="post" action="login" >
                <input type="hidden" name="_token" value="{{csrf_token()}}">
                <div class="msg">Đăng nhập vào trang Admin</div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">person</i>
                        </span>
                    <div class="form-line">
                        <input type="text" class="form-control" name="email" placeholder="Email đăng nhập" required autofocus>
                    </div>
                </div>
                <div class="input-group">
                        <span class="input-group-addon">
                            <i class="material-icons">lock</i>
                        </span>
                    <div class="form-line">
                        <input type="password" class="form-control" name="password" placeholder="Mật khẩu" required>
                    </div>
                </div>
                <div class="row">
                    <div class="col-xs-8 p-t-5">
                        <input type="checkbox" name="remember" id="remember" class="filled-in chk-col-pink">
                        <label for="remember">Remember Me</label>
                    </div>
                    <div class="col-xs-4">
                        <button class="btn btn-block bg-pink waves-effect" type="submit">SIGN IN</button>
                    </div>
                </div>
            </form>
            <div class="row m-t-15 m-b--20">

                <div class="col-xs-12 align-right">
                    <a href="#checkMail" data-toggle="modal">Forgot Password?</a>
                </div>
            </div>
            <div class="modal fade" id="checkMail" style="display: none;">
                <div class="modal-dialog">
                    <form action="forgetpassword" id="form-forget" autocomplete="off" method="post" role="form">
                        <input type="hidden" name="_token" value="hYEuID7SncqW1SM0metsvgqsW6RAsWSUgsl8oYJw">
                        <div class="modal-content" style="font-family: 'Lato', sans-serif;border:4px solid rgba(36, 36, 37, 0.5);">
                            <div class="modal-header" style="background: rgb(230, 249, 236);">
                                <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                                <h4 class="modal-title">Lấy lại mật khẩu</h4>
                            </div>
                            <div class="modal-body">
                                <div class="" >
                                    <label for=""></label>
                                    <input style="border: 1px solid lightseagreen" type="text" required="" autofocus="" class="form-control" name="username" placeholder="Nhập địa chỉ email hoặc tên đăng nhập để lấy lại mật khẩu...">
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-lg btn-primary">Gửi</button>
                            </div>
                        </div><!-- /.modal-content -->
                    </form>
                </div><!-- /.modal-dialog -->
            </div>

        </div>
    </div>
</div>

<!-- Jquery Core Js -->
<script src="plugins/jquery/jquery.min.js"></script>

<!-- Bootstrap Core Js -->
<script src="plugins/bootstrap/js/bootstrap.js"></script>

<!-- Waves Effect Plugin Js -->
<script src="plugins/node-waves/waves.js"></script>

<!-- Validation Plugin Js -->
<script src="plugins/jquery-validation/jquery.validate.js"></script>

<!-- Custom Js -->
<script src="js/admin.js"></script>
<script src="js/pages/examples/sign-in.js"></script>
</body>

</html>