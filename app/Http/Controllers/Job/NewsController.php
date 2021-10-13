<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class NewsController extends Controller
{
    public function index(){ 
        return view('job.news.index');
    }
    public function detail(){
        
    }
}
