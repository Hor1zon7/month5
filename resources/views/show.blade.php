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
<div class="jumbotron jumbotron-fluid">
    <div class="container">
        <h1 class="display-4">学生列表</h1>
        <p class="lead">This is a modified jumbotron that occupies the entire horizontal space of its parent.</p>
        <form  method="get" action="{{'show'}}">
            姓名<input type="text" name="name">
            班级 <select name="classname" id="">
                    <option value=" ">------</option>
                @foreach($classData as $k=>$v)
                <option value="{{$v->c_id}}">{{$v->c_name}}</option>
                @endforeach
            </select>
            <button type="submit">搜索</button>
        </form>
        <table class="table">
            <thead>
            <tr>
                <th scope="col">学生编号</th>
                <th scope="col">学生姓名</th>
                <th scope="col">手机号码</th>
                <th scope="col">班级</th>
                <th scope="col">所属学院</th>
                <th scope="col">入学成绩</th>
                <th scope="col">操作</th>
            </tr>
            </thead>
            <tbody>
            @foreach($data as $k=>$v)
                <tr>
                    <th scope="row">{{$v['id']}}</th>
                    <td>{{$v['name']}}</td>
                    <td>{{$v['phone']}}</td>
                    <td>{{$v['c_name']}}</td>
                    <td>{{$v['deg']}}</td>
                    <td>{{$v['score']}}</td>
                    <td>
                        <button type="button" class="btn btn-outline-danger" id="{{$v['id']}}" score="{{$v['score']}}">删除</button>
                        <a href="{{ route('detail')}}?id={{$v['id']}}"><button type="button" class="btn btn-outline-info">编辑</button></a>
                    </td>

                </tr>
            @endforeach

            </tbody>
        </table>
        {{$data->appends($condition)->links()}}
    </div>
</div>
</body>
</html>
<script>
    $('.btn-outline-danger').click(function (){
        var id=$(this).attr('id');
        var score=$(this).attr('score');
        var that=$(this);
        if(score!='0'){
            alert('只能删分数为0分的学生信息');
            return false;
        }
        $.ajax({
            url:"{{'delStudent'}}",
            data:{id:id},
            success:function (res){
                if(res){
                    that.parents('tr').remove();
                    alert('软删除成功');
                }

            }
        })
    })
</script>
