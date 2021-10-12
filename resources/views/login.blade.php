<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
</head>
<body>
<form action="{{route('dologin')}}" method="post">
    @csrf
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">登录111</h1>
            <p class="lead">2222222</p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">账号</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="name">

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">密码</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" name="password">

                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">验证码</label>
                <div class="col-sm-10">
                    <img src="{{captcha_src()}}" alt="">
                    <input type="text" class="form-control" name="captcha" style="width: 200px">
                    @error('captcha')
                    <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                </div>
            </div>
            <button type="submit" class="btn btn-outline-primary">登录</button>
        </div>
    </div>
</form>
</body>
</html>
