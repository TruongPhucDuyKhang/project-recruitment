<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Wage extends Model
{
    protected $table = "wage";
    protected $primaryKey = "mid";

    public function getWage(){
    	return $this->get();
    }
}
