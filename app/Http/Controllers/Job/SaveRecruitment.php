<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Auth;
use App\Savercm;
use App\Recruitment;

class SaveRecruitment extends Controller
{
    public function __construct(Savercm $msavercm, Recruitment $mrecruitment){
        $this->msavercm     = $msavercm;
        $this->mrecruitment = $mrecruitment;
    }
    public function index(){
        $itemSavercm     = $this->msavercm->itemSavercm();
        $findItemSavercm = $this->msavercm->findItemSavercm(Auth::user()->id); 
        return view('job.savercm.index', compact('itemSavercm', 'findItemSavercm'));
    }
    public function saveRecruitment(Request $request){
        $users_id       = $request->users_id;
        $recruitment_id = $request->recruitment_id;
        $data = ['recruitment_id' => $recruitment_id,
                 'users_id'       => $users_id,
                 'sv_status'      => 1,
                ];
        $this->msavercm->addSavercm($data);
        // echo "<pre>";
        //     print_r($request->all());
        // echo "</pre>";
        $findItem    = $this->mrecruitment->findItem($recruitment_id);
        if(Auth::check()){
            $findSavercm = $this->msavercm->findSavercm($recruitment_id,Auth::user()->id);
            $find = $this->msavercm->find($recruitment_id,Auth::user()->id);
        }else {
            $findSavercm = $this->msavercm->findSavercmTwo($recruitment_id);
            $find        = $this->msavercm->findTwo($recruitment_id);
        }
        
        return view('job.list.ajax-savercm', compact('findItem', 'findSavercm', 'find'));
    }
    public function unRecruitment(Request $request){
       $id   = $request->id;
       $svid = $request->svid;
       
       $this->msavercm->unSavercm($svid);

       $findItem    = $this->mrecruitment->findItem($id);
        if(Auth::check()){
            $findSavercm = $this->msavercm->findSavercm($id,Auth::user()->id);
            $find = $this->msavercm->find($id,Auth::user()->id);
        }else {
            $findSavercm = $this->msavercm->findSavercmTwo($id);
            $find        = $this->msavercm->findTwo($id);
        }
        
        return view('job.list.ajax-savercm', compact('findItem', 'findSavercm', 'find'));
    }
}
