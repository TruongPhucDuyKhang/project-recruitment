<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\City;
use App\Users;
use Auth;

class CompanyController extends Controller
{
    public function __construct(City $mcity, Users $musers){
        $this->mcity    = $mcity;
        $this->musers   = $musers;
    }   
    public function index(){
        return view('job.company.index');
    }
    public function detail($slug, $id){
        $findUser = $this->musers->findUser($id);
        return view('job.company.detail', compact('findUser'));
    }

    public function getAdd(){
        $city = $this->mcity->getCity();
        return view('job.company.add', compact('city'));
    }
    public function postAdd(Request $request){
        $id = Auth::user()->id;
        if($request->hasFile('picture')){
            $fileName = $request->file('picture')->store('avatar');
            $data     = ['name_company'    => $request->name_company,
                         'personnel'       => $request->personnel,
                         'phone'           => $request->phone,
                         'content_company' => $request->content_company,
                         'andress'         => $request->andress,
                         'matp'            => $request->matp,
                         'website'         => $request->website,
                         'picture'         => $fileName,
                        ];
            $result = $this->musers->editUser($data, $id);
            if($result){
                return back()->with('success', 'Cập nhật thông tin thành công!');
            }else {
                return back()->with('error', 'Cập nhật thông tin thất bại!');
            }
        }else {
            $findUser = $this->musers->findUser($id);
            $data     = ['name_company'    => $request->name_company,
                         'personnel'       => $findUser->personnel,
                         'phone'           => $request->phone,
                         'content_company' => $request->content_company,
                         'andress'         => $request->andress,
                         'matp'            => $request->matp,
                         'website'         => $request->website,
                         'picture'         => $findUser->picture,
                        ];
                        // dd($data);
            $result = $this->musers->editUser($data, $id);
            if($result){
                return back()->with('success', 'Cập nhật thông tin thành công!');
            }else {
                return back()->with('error', 'Cập nhật thông tin thất bại!');
            }
        }
    }
}