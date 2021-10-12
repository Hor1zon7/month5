<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class admin extends Model
{
    protected $table='admin';
    public function checkAdmin($data){
        $name=$data['name'];
        $password=$data['password'];
        return $this->where('name',$name)->where('password',$password)->first();

    }
}
