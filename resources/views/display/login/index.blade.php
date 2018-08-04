<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin</title>
     <base href="{{asset('')}}">
    <link href="{{asset('public/css/bootstrap.min.css')}}" rel="stylesheet">
    <link href="{{asset('public/font-awesome/css/font-awesome.css')}}" rel="stylesheet">

    <link href="{{asset('public/css/animate.css')}}" rel="stylesheet">
    <link href="{{asset('public/css/style.css')}}" rel="stylesheet">
</head>
<body>
    <div class="gray-bg">

    <div class="middle-box text-center loginscreen animated fadeInDown">
        <div>
            <div>
            </div>
            <h3>Đăng nhập</h3>
            <p>Đăng nhập để tương tác nhiều hơn</p>
          @if(count($errors) >0)
          <div class="alert alert-danger">
            @foreach($errors->all() as $err)
                {{$err}} <br/>
            @endforeach
          </div>
          @endif
            <form class="m-t" role="form" action="" method="post">
                <div class="form-group">
                    <input type="email" class="form-control" placeholder="email" required="" name="email">
                </div>
                <div class="form-group">
                    <input type="password" class="form-control" placeholder="Password" required="" name="password">
                </div>
                <input type="hidden" name="_token" value="<?php echo csrf_token()?>">
                <button type="submit" class="btn btn-primary block full-width m-b">Đăng nhập</button>

                <a href="#"><small>*Quên mật khẩu?</small></a>
                <p class="text-muted text-center"><small>Bạn không có tài khoản?</small></p>
                <a class="btn btn-sm btn-white btn-block" href="register.html">Tạo tài khoản mới</a>
            </form>
            <p class="m-t"> <small></small> </p>
        </div>
    </div>

    <!-- Mainly scripts -->
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>

</div>
</body>
</html>


