<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Cat;
use App\Recruitment;
use Auth;
use Carbon\Carbon;

class IndexController extends Controller
{
	public function __construct(Cat $mcat, City $mcity, Recruitment $mrecruitment){
		$this->mcat   	    = $mcat;
		$this->mcity        = $mcity;
		$this->mrecruitment = $mrecruitment;
	}
    public function index(){
    	$cat  = $this->mcat->getCat();
		$city = $this->mcity->getCity();
		$pin  = $this->mrecruitment->getPin();
       	return view('job.index.index', compact('cat', 'city', 'pin'));
	}
	public function search(Request $request){
		Carbon::setLocale('vi');
		$now     = Carbon::now('Asia/Ho_Chi_Minh');
		$cat  	 = $this->mcat->getCat();
		$city 	 = $this->mcity->getCity();
		$q	     = $request->q;
		$cat_id	 = $request->cat_id;
		$matp 	 = $request->matp;

		$item = $this->mrecruitment->getItem();

		if($q != "" && $cat_id != "" && $matp != ""){
			$item = $this->mrecruitment->searchAll($q, $cat_id, $matp);
		}elseif($q != "" && $cat_id != ""){
			$item = $this->mrecruitment->searchNameAndCat($q, $cat_id);
		}elseif($cat_id != "" && $matp != ""){
			$item = $this->mrecruitment->searchCatAndMatp($cat_id, $matp);
		}elseif($q != "" && $matp != ""){
			$item = $this->mrecruitment->searchNameAndMatp($q, $matp);
		}elseif($cat_id) {
			$item = $this->mrecruitment->searchCat($cat_id);
		}elseif($q){
			$item = $this->mrecruitment->searchName($q);
		}elseif($matp){
			$item = $this->mrecruitment->searchMatp($matp);
		}
		
		// if($matp){
		// 	$item = $this->mrecruitment->searchCity($matp);
		// }
       	return view('job.index.search', compact('cat', 'city', 'item', 'now'));
	}
}