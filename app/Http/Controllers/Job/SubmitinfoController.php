<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\SubmissionRequest;
use Auth;
use App\Submissioninfo;
use App\Recruitment;
use App\Users;

class SubmitinfoController extends Controller
{
    public function __construct(Submissioninfo $msubmissioninfo, Users $musers, Recruitment $mrecruitment){
        $this->msubmissioninfo = $msubmissioninfo;
        $this->musers          = $musers;
        $this->mrecruitment    = $mrecruitment;
    }
    public function index(Request $request){
        $sort = $request->sort;
        $id = Auth::user()->id;
        $sub  = $this->msubmissioninfo->getSub($id);
        if($sort == 'thoi_gian_nop'){
            foreach($sub as $subs){
               $date = $subs->date_created;
               $sub  = $this->msubmissioninfo->sortDate($date, $id); 
            }
        }else if($sort == 'da_gui'){
            $status = 0;
            $sub  = $this->msubmissioninfo->sortZero($status, $id);
        }else if($sort == 'dang_cho_duyet'){
            $status = 1;
            $sub  = $this->msubmissioninfo->sortOnce($status, $id);
        }else if($sort == 'khong_duoc_duyet'){
            $status = 2;
            $sub  = $this->msubmissioninfo->sortTwo($status, $id);
        }
        return view('job.submitinfo.index', compact('sort', 'sub'));
    }
    public function getAdd(){
        return view('job.submitinfo.add');
    }
    public function postAdd(SubmissionRequest $request){
        $recruitment_id = $this->mrecruitment->checkIdrcm($request->recruitment_id);
        if($request->hasFile('submission_info_picture')){
            $fileName = $request->file('submission_info_picture')->store('avatar');
            if($recruitment_id){
                $data = ['recruitment_id'             => $request->recruitment_id,
                        'id'                          => Auth::user()->id,
                        'submission_info_location'    => $request->submission_info_location,
                        'submission_info_school'      => $request->submission_info_school,
                        'submission_info_type'        => $request->submission_info_type,
                        'submission_info_specialized' => $request->submission_info_specialized,
                        'submission_info_picture'     => $fileName,
                        'school_day'                  => $request->school_day,
                        'school_end_day'              => $request->school_end_day,
                        'submission_status'           => 0,
                ];
                $this->msubmissioninfo->addSubmission($data);
                return back()->with('msg', 'NỘP HỒ SƠ THÀNH CÔNG');
            }else {
                return redirect()->route('job.list.index')->with('error', 'Lỗi vui lòng bạn hãy nộp lại');
            }   
        }else {
            if($recruitment_id){
                $data = ['recruitment_id'              => $request->recruitment_id,
                         'id'                          => Auth::user()->id,
                         'submission_info_location'    => $request->submission_info_location,
                         'submission_info_type'        => $request->submission_info_type,
                         'submission_info_school'      => $request->submission_info_school,
                         'submission_info_specialized' => $request->submission_info_specialized,
                         'school_day'                  => $request->school_day,
                         'school_end_day'              => $request->school_end_day,
                         'submission_status'           => 0,
                ];
                $this->msubmissioninfo->addSubmission($data);
                return back()->with('msg', 'NỘP HỒ SƠ THÀNH CÔNG');
            }else {
                return redirect()->route('job.index.search')->with('error', 'Lỗi vui lòng bạn hãy nộp lại');
            }
        }
        // echo "<pre>";
        //     print_r($request->all());
        // echo "</pre>";
    }
    public function getEdit(Request $request){
        return view('job.submitinfo.edit-profile');
    }
    public function postEdit(Request $request){
        $id = Auth::user()->id;
        // echo "<pre>";
        //     print_r($request->all());
        //     echo "</pre>";
        if($request->hasFile('picture')){
            $fileName = $request->file('picture')->store('avatar');
            $data     = ['fullname' => $request->fullname,
                         'birthday' => $request->birthday,
                         'email'    => $request->email,
                         'andress'  => $request->andress,
                         'picture'  => $fileName,
                    ];
                    // dd($data);
            $this->musers->editUser($data, $id);
            return back()->with('success', 'Cập nhật thông tin thành công!');
            // return "OK";
        }else {
            $findUser = $this->musers->findUser($id);
            $data     = ['fullname' => $request->fullname,
                         'birthday' => $request->birthday,
                         'email'    => $request->email,
                         'andress'  => $request->andress,
                         'picture'  => $findUser->picture,
                    ];
                    // dd($data);
            $this->musers->editUser($data, $id);
            return back()->with('success', 'Cập nhật thông tin thành công!');
            // return "FAlse";
        }
    }
    public function delSub(Request $request){
        $id = $request->id;

        // echo "<pre>";
        //     print_r($request->all());
        // echo "</pre>";
        $result = $this->msubmissioninfo->delSub($id);
        return response()->json([
            'success' => 'Xoá thành công',
        ]);
    }
}
