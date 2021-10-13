<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Submissioninfo;
use Auth;

class ResumeController extends Controller
{
    public function __construct(Submissioninfo $msubmissioninfo){
        $this->msubmissioninfo = $msubmissioninfo;
    }
    public function index(){
        $id = Auth::user()->id;
        $resume = $this->msubmissioninfo->getSubresume($id);
        // dd($resume);
        return view('job.resume.index', compact('resume'));
    }
    public function getResume(Request $request){
        $id = $request->id;

        $findSubId = $this->msubmissioninfo->findSubId($id);
        $urlPic    = '/job/storage/app/'.$findSubId->submission_info_picture;
        return response()->json([
            'location'       => $findSubId->submission_info_location,
            'info_school'    => $findSubId->submission_info_school,
            'specialized'    => $findSubId->submission_info_specialized,
            'type'           => $findSubId->submission_info_type,
            'school_day'     => date('d/m/Y', strtotime($findSubId->school_day)),
            'school_end_day' => date('d/m/Y', strtotime($findSubId->school_end_day)),
            'picture'        => $urlPic,
        ]);
        // echo "<pre>";
        //     print_r($findSubId);
        // echo "</pre>";
    }
    public function accept(Request $request){
        $id   = $request->id;
        $data = ['submission_info_id' => $id,
                 'submission_status'  => 1,
                ];
        $this->msubmissioninfo->editSub($data, $id);

        $id     = Auth::user()->id;
        $resume = $this->msubmissioninfo->getSubresume($id);
        return view('job.resume.ajax-status', compact('resume'));
    }

    public function noAccept(Request $request){
        $id   = $request->id;
        $data = ['submission_info_id' => $id,
                 'submission_status'  => 2,
                ];
        $this->msubmissioninfo->editSub($data, $id);

        $id     = Auth::user()->id;
        $resume = $this->msubmissioninfo->getSubresume($id);
        return view('job.resume.ajax-status', compact('resume'));
    }
}
