<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Cat;
use App\City;
use App\Rank;
use App\CatType;
use App\Wage;
use App\Recruitment;
use App\Savercm;
use App\Submissioninfo;
use Carbon\Carbon;
use Auth;

class ListController extends Controller
{
	public function __construct(Cat $mcat, City $mcity, Rank $mrank,
	 CatType $mcattype, Wage $mwage, Recruitment $mrecruitment, Savercm $msavercm, Submissioninfo $msubmissioninfo){
		$this->mcat  	       = $mcat;
		$this->mcity 	       = $mcity;
		$this->mrank 	       = $mrank;
		$this->mcattype        = $mcattype;
        $this->mwage           = $mwage;
        $this->mrecruitment    = $mrecruitment;
        $this->msavercm 	   = $msavercm;
        $this->msubmissioninfo = $msubmissioninfo;
	}
    public function index(){
    	$cat  = $this->mcat->getCat();
    	$city = $this->mcity->getCity();
    	$rank = $this->mrank->getRank();
    	$type = $this->mcattype->getType();
        $wage = $this->mwage->getWage();
        $item = $this->mrecruitment->getItem();
       	return view('job.list.index', compact('cat', 'city', 'rank', 'type', 'wage', 'item'));
	}
	public function searchWage(Request $request){
		$cat  = $this->mcat->getCat();
    	$city = $this->mcity->getCity();
    	$rank = $this->mrank->getRank();
    	$type = $this->mcattype->getType();
		$wage = $this->mwage->getWage();
		if($request->value == 0){
			$item = $this->mrecruitment->getItem();
		}else {
			$item = $this->mrecruitment->findWage($request->value);
		}
       	return view('job.list.ajax', compact('cat', 'city', 'rank', 'type', 'wage', 'item'));
	}
    public function detail($slug, $id){
		$findItem    = $this->mrecruitment->findItem($id);
		$takeJob     = $this->mrecruitment->takeJob($findItem->cat_id);
		if(Auth::check()){
			$findSavercm = $this->msavercm->findSavercm($id,Auth::user()->id);
			$find 		 = $this->msavercm->find($id,Auth::user()->id);
			$findSub     = $this->msubmissioninfo->findSubs($id,Auth::user()->id);
			$findUser    = $this->msubmissioninfo->findSubOnce($id,Auth::user()->id);
		}else {
			$findSavercm = $this->msavercm->findSavercmTwo($id);
			$find        = $this->msavercm->findTwo($id);
			$findSub     = $this->msubmissioninfo->findSub($id);
			$findUser    = $this->msubmissioninfo->findSubTwo($id);
		}
		Carbon::setLocale('vi');
		$now = Carbon::now("Asia/Ho_Chi_Minh");
		return view('job.list.detail', compact('findItem', 'now', 'findSavercm', 'find', 'takeJob', 'findSub', 'findUser'));
	}
}