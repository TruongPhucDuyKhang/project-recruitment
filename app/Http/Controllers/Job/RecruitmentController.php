<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\RecruitmentRequest;
use App\Cat;
use App\City;
use App\Rank;
use App\CatType;
use App\Wage;
use App\Recruitment;
use App\Users;
use Auth;

class RecruitmentController extends Controller
{
	public function __construct(Cat $mcat, City $mcity, Rank $mrank, 
	CatType $mcattype, Wage $mwage, Recruitment $mrecruitment, Users $musers){
		$this->mcat  	    = $mcat;
		$this->mcity 	    = $mcity;
		$this->mrank 	    = $mrank;
		$this->mcattype     = $mcattype;
	    $this->mwage        = $mwage;
		$this->mrecruitment = $mrecruitment;
		$this->musers 	    = $musers;
	}
    public function index(){
		$item = $this->mrecruitment->getItem();
		$rcm  = $this->mrecruitment->findCountRcm(Auth::user()->id);
    	return view('job.recruitment.index', compact('item'));
    }
    public function detail($slug, $id){

    }
    public function getAdd(){
    	$cat  = $this->mcat->getCat();
    	$city = $this->mcity->getCity();
    	$rank = $this->mrank->getRank();
    	$type = $this->mcattype->getType();
        $wage = $this->mwage->getWage();
    	return view('job.recruitment.add', compact('cat', 'city', 'rank', 'type', 'wage'));
    }
    public function postAdd(RecruitmentRequest $request){
		$id = Auth::user()->id;
		$data = ['name' 		=> $request->name,
				 'preview_text' => $request->preview_text,
				 'mid' 			=> $request->mid,
				 'gender'       => $request->gender,
				 'benefit_text' => $request->benefit_text,
				 'profile_text' => $request->profile_text,
				 'matp' 		=> $request->matp,
				 'cat_id' 		=> $request->cat_id,
				 'tid' 			=> $request->tid,
				 'rid' 			=> $request->rid,
				 'qty' 			=> $request->qty,
				 'id'			=> $id,
				 'deadline' 	=> $request->deadline,
				 'status'		=> 0,
			];
		$this->mrecruitment->addItem($data);
		
		$data = ['fullname' => $request->fullname,
				 'andress'  => $request->andress,
				 'phone'	=> $request->phone,
				 'email'	=> $request->email,
				];
		$this->musers->editUser($data, $id);
		return back()->with('success', 'Đăng tin tuyển dụng thành công');
		// echo "<pre>";
		// 	print_r($request->all());
		// echo "</pre>";
    }
}
