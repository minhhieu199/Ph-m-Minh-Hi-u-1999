<!DOCTYPE html>
<html lang="en">
<head>
    <title>Login V19</title>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!--===============================================================================================-->
    <link rel="icon" type="image/png" href="/backend/images/icons/favicon.ico"/>
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/vendor/bootstrap/css/bootstrap.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/fonts/font-awesome-4.7.0/css/font-awesome.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/fonts/Linearicons-Free-v1.0.0/icon-font.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/vendor/animate/animate.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/vendor/css-hamburgers/hamburgers.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/vendor/animsition/css/animsition.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/vendor/select2/select2.min.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/vendor/daterangepicker/daterangepicker.css">
    <!--===============================================================================================-->
    <link rel="stylesheet" type="text/css" href="/backend/css/util.css">
    <link rel="stylesheet" type="text/css" href="/backend/css/main.css">
    <!--===============================================================================================-->
</head>
<body>

<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100 p-l-55 p-r-55 p-t-65 p-b-50">
            <form action="{{ route('admin.postLogin') }}" class="login100-form validate-form" method="post">
                    @csrf
                    <span class="login100-form-title p-b-33">
                        Tài Khoản
                    </span>
                <div class="wrap-input100 validate-input" data-validate = "Bạn chưa nhập email có dạng đúng abc@gmail.com">
                    <input class="input100" type="text" name="email" placeholder="Email">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>

                <div class="wrap-input100 rs1 validate-input" data-validate="Bạn chưa nhập mật khẩu">
                    <input class="input100" type="password" name="password" placeholder="Password">
                    <span class="focus-input100-1"></span>
                    <span class="focus-input100-2"></span>
                </div>
                <div class="checkbox" style="padding-top: 10px">
                    <label>
                        <input type="checkbox"  name="remember" > Ghi Nhớ
                    </label>
                </div>
                <div class="container-login100-form-btn ">
                    <button class="login100-form-btn">
                        Đăng Nhập
                    </button>
                </div>

                <div class="text-center p-t-45 p-b-4">
                        <span class="txt1">
                            Quên
                        </span>

                    <a href="backend/#" class="txt2 hov1">
                        Tên đăng nhập / Password?
                    </a>
                </div>

                <div class="text-center">
                        <span class="txt1">
                            Tạo tài khoản mới?
                        </span>

                    <a href="backend/#" class="txt2 hov1">
                        Đăng Ký
                    </a>
                </div>

            </form>
        </div>
    </div>
</div>
