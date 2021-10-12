<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\DoLoginRequest;
use App\Http\Requests\AddRequest;
use App\student;
use App\admin;
use Session;

class StudentController extends Controller
{
    static $obj;

    public function __construct()
    {
        self::$obj = new student;
    }
//登录功能
    public function dologin(DoLoginRequest $request)
    {
        $data = $request->post();
        $loginObj = new admin;
        $res = $loginObj->checkAdmin($data);
        $name = $request->post('name');
        if ($res) {
            Session::put('name', $name);
            echo "<script>alert('登录成功');location.href='" . route('form') . "'</script>";
        } else {
            echo "<script>alert('账号或者密码错误');history.back();</script>";
        }

    }
//跳转表单
    public function form()
    {
        $data = \DB::table('classname')->get();
        return view('form', compact('data'));
    }
//添加功能
    public function doform(AddRequest $request)
    {
        $data = $request->post();
        unset($data['_token']);
//        调用DB查询构造器实现学生信息添加
        $res = \DB::table('student')->insert($data);

        if ($res) {
            echo "<script>alert('添加成功');location.href='" . route('show') . "'</script>";
        }
    }
//展示功能
    public function show(Request $request)
    {
        $where=[];
        $condition=[];

        if($request->has('name') && !empty($request->get('name')) ){
            $name=$request->get('name');
            $where[]=['name','like','%'.$name.'%'];
            $condition['name']=$name;
        }

        if($request->has('classname') && !empty($request->get('classname')) ){
            $classname=$request->get('classname');
            $where[]=['classname','=',$classname];
            $condition['classname']=$classname;
        }
//        echo "<pre>";
//        print_r($where);
//        echo "</pre>";
        $classData = \DB::table('classname')->get();
        $data = self::$obj->show($where);
        return view('show', compact('data','classData','condition'));
    }
//删除功能
    public function delStudent(Request $request)
    {
        $id = $request->get('id');
        $res = self::$obj->delStudent($id);
        return $res;
    }

    public function detail(Request $request)
    {
        $id = $request->get('id');
        $detailData = self::$obj->getDetail($id);
        $classData = \DB::table('classname')->get();
        return view('stuDetail', compact('detailData', 'classData'));
    }
//编辑功能
    public function updateData(AddRequest $request)
    {
        $data = $request->post();
        $id = $request->post('id');
        $res = self::$obj->doupdate($data, $id);

        echo "<script>alert('保存成功');location.href='" . route('show') . "'</script>";

    }

}
