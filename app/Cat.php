<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cat extends Model
{
    protected $table = "cat";
    protected $primaryKey = "cat_id";

    public function getCat(){
    	return $this->get();
    }
}
