<?php

namespace App\Http\Controllers\job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class AdminindexController extends Controller
{
    public function index(){
		return view('job.admin.index.index');
	}
}
