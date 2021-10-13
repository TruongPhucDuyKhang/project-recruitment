<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rank extends Model
{
    protected $table = "rank";
    protected $primaryKey = "rid";

    public function getRank(){
    	return $this->get();
    }
}
