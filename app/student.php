<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class student extends Model
{
    protected $table = 'student';
    use SoftDeletes;

//    public function addStudent($data){
//        return $this->insert($data);
//    }
    public function show($where)
    {
        return $this->where($where)->join('classname', 'classname', 'c_id')->paginate(5);
    }

    public function delStudent($id)
    {
        return $this->where('id', $id)->delete();
    }

    public function getDetail($id)
    {
        return $this->join('classname', 'classname', 'c_id')->where('id', $id)->first()->toArray();
    }

    public function doupdate($data,$id)
    {
        return $this->where('id',$id)->update($data);
    }
}
