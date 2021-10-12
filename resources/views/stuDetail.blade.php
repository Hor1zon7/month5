<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Title</title>
    <link rel="stylesheet" href="https://cdn.staticfile.org/twitter-bootstrap/4.3.1/css/bootstrap.min.css">
    <script src="https://apps.bdimg.com/libs/jquery/2.1.4/jquery.min.js">
    </script>

</head>
<body>
<form action="{{route('updateData')}}" method="post">
    <div class="jumbotron jumbotron-fluid">
        <div class="container">
            <h1 class="display-4">学生信息修改</h1>
            <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">姓名</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$detailData['name']}}" name="name">
                    @error('name')
                    <i style="color: orangered">{{ $message }}</i>
                    @enderror
                </div>
            </div>
            <input type="hidden" name="id" value="{{$detailData['id']}}">
            <div class="form-group row">
                <label class="col-sm-2 col-form-label">手机号码</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$detailData['phone']}}" name="phone">
                    @error('phone')
                    <i style="color: orangered">{{ $message }}</i>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">班级</label>
                <div class="col-sm-10">
                    <select name="classname" id="">
                        @foreach($classData as $k => $v)
                            <option value="{{$v->c_id}}"
                                    @if($v->c_id==$detailData['classname']) selected @endif>{{$v->c_name}}</option>
                        @endforeach
                    </select>
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">学院</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$detailData['deg']}}" name="deg">
                    @error('deg')
                    <i style="color: orangered">{{ $message }}</i>
                    @enderror
                </div>
            </div>

            <div class="form-group row">
                <label class="col-sm-2 col-form-label">入学成绩</label>
                <div class="col-sm-10">
                    <input type="text" class="form-control" value="{{$detailData['score']}}" name="score">
                </div>
                @error('score')
                <i style="color: orangered">{{ $message }}</i>
                @enderror
            </div>
            <button type="submit" class="btn btn-primary">保存</button>
        </div>
    </div>
</form>
</body>
</html>
