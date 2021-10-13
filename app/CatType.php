<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CatType extends Model
{
    protected $table = "cat_type";
    protected $primaryKey = "tid";

    public function getType(){
    	return $this->get();
    }
}
