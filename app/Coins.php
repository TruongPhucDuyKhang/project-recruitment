<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Coins extends Model
{
    protected $table = "Coins";
    protected $primaryKey = "coins_id";

    public function getCoin(){
        return $this->orderBy('coins_id', 'DESC')->paginate(5);
    }
    public function findCoin($id){
        return $this->where('id', $id)->first();
    }
    public function addCoin($data){
        return $this->insert($data);
    }
    public function incrementCoin($id, $number_coin){
        return $this->where('id', $id)->increment('number_coin', $number_coin);
    } 
    public function decrementCoin($id, $number_coin){
        //decrement
        return $this->where('id', $id)->decrement('number_coin', $number_coin);
    }
    public function countId($id){
        return $this->where('id', $id)->count();
    }
}
