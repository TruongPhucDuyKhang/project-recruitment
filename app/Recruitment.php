<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use DB;

class Recruitment extends Model
{
    protected $table = "recruitment";
    protected $primaryKey = "recruitment_id";

    public function getItem(){
        return $this->join('cat', 'recruitment.cat_id', '=', 'cat.cat_id')
                    ->join('wage', 'recruitment.mid', '=', 'wage.mid')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->join('rank', 'recruitment.rid', '=', 'rank.rid')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('users', 'recruitment.id', '=', 'users.id')
                    ->orderBy('recruitment_id', 'desc')
                    ->paginate(10);
    }
    public function getPin(){
        return $this->join('cat', 'recruitment.cat_id', '=', 'cat.cat_id')
                    ->join('wage', 'recruitment.mid', '=', 'wage.mid')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->join('rank', 'recruitment.rid', '=', 'rank.rid')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('users', 'recruitment.id', '=', 'users.id')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('pin', 1)
                    ->get();
    }
    public function addPin($data, $id){
        return $this->where('recruitment_id', $id)->update($data);
    }
    public function findWage($id){
        return $this->join('cat', 'recruitment.cat_id', '=', 'cat.cat_id')
                    // ->join('wage', 'recruitment.mid', '=', 'wage.mid')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->join('rank', 'recruitment.rid', '=', 'rank.rid')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('users', 'recruitment.id', '=', 'users.id')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('mid', $id)
                    ->paginate(10);
    }
    public function findItem($id){
        return $this->join('cat', 'recruitment.cat_id', '=', 'cat.cat_id')
                    ->join('wage', 'recruitment.mid', '=', 'wage.mid')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->join('rank', 'recruitment.rid', '=', 'rank.rid')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('users', 'recruitment.id', '=', 'users.id')
                    ->findOrFail($id);
    }
    public function addItem($data){
        return $this->insert($data);
    }
    public function takeJob($cat_id){
        return $this->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->where('cat_id', $cat_id)
                    ->take(6)->get();
    }
    public function searchAll($q, $cat_id, $matp){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('name', 'like', '%'.$q.'%')
                    ->where('cat_id', $cat_id)
                    ->where('city.matp', $matp)
                    ->paginate(10);
    }
    public function searchNameAndCat($q, $cat_id){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('name', 'like', '%'.$q.'%')
                    ->where('cat_id', $cat_id)
                    ->paginate(10);
    }
    public function searchCatAndMatp($cat_id, $matp){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('cat_id', $cat_id)
                    ->where('city.matp', $matp)
                    ->paginate(10);
    }
    public function searchNameAndMatp($q, $matp){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('name', 'like', '%'.$q.'%')
                    ->where('city.matp', $matp)
                    ->paginate(10);
    }
    public function searchCat($cat_id){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('cat_id', $cat_id)
                    ->paginate(10);
    }
    public function searchName($q){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('name', 'like', '%'.$q.'%')
                    ->paginate(10);
    }
    public function searchMatp($matp){
        return $this->join('users', 'recruitment.id', '=', 'users.id')
                    ->join('city', 'recruitment.matp', '=', 'city.matp')
                    ->join('cat_type', 'recruitment.tid', '=', 'cat_type.tid')
                    ->orderBy('recruitment_id', 'desc')
                    ->where('city.matp', $matp)
                    ->paginate(10);
    }
    public function findCountRcm($id){
        return $this->where('id', $id)->count();
    }
    public function checkIdrcm($id){
        return $this->where('recruitment_id', $id)->count();
    }
}
