<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;
use Auth;

class Users extends Model
{
    protected $table = "users";
    protected $primaryKey = "id";

    public function register($data){
        return $this->insert($data);
    }
    public function changePassword($data, $id){
        $id = Auth::user()->id;
        return $this->where('id', $id)->update($data);
    }
    public function editUser($data, $id){
        return $this->where('id', $id)->update($data);
    }
    public function findUser($id){ 
        return $this->findOrFail($id);
    }
}
