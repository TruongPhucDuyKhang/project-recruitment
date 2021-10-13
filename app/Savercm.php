<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Savercm extends Model
{
    protected $table      = "save_recruitment";
    protected $primaryKey = "save_id";

    public function itemSavercm(){
        return $this->join('recruitment', 'recruitment.recruitment_id', '=', 'save_recruitment.recruitment_id')
                    ->join('wage', 'wage.mid', '=', 'recruitment.mid')
                    ->join('city', 'city.matp', '=', 'recruitment.matp')
                    ->join('users', 'users.id', '=', 'recruitment.id')
                    ->orderBy('save_id', 'DESC')
                    ->paginate(5);
    }
    public function findItemSavercm($users_id){
        return $this->where('users_id', $users_id)->count();
    }
    public function addSavercm($data){
        return $this->insert($data);
    }
    public function unSavercm($id){
        return $this->where('save_id', $id)->delete();
    }
    public function findSavercm($id, $users_id){
        return $this->where('recruitment_id' ,$id)->where('users_id', $users_id)->get();
    }
    public function findSavercmTwo($id){
        return $this->where('recruitment_id' ,$id)->get();
    }
    public function find($id, $users_id){
        return $this->where('recruitment_id' ,$id)->where('users_id', $users_id)->first();
    }
    public function findTwo($id){
        return $this->where('recruitment_id' ,$id)->first();
    }
}
