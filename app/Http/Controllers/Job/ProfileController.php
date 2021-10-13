<?php

namespace App\Http\Controllers\Job;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Http\Requests\ProfileRequest;
use Auth;
use Hash;
use App\Users;

class ProfileController extends Controller
{
    public function __construct(Users $musers){
        $this->musers = $musers;
    }  
    public function profilePersonal(){
    	return view('job.profile.profile');
    }
    public function postProfile(Request $request){
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
            $data     = ['fullname'        => $request->fullname,
                         'birthday'        => $request->birthday,
                         'email'           => $request->email,
                         'picture'         => $findUser->picture,
                    ];
                        // dd($data);
            $this->musers->editUser($data, $id);
            return back()->with('success', 'Cập nhật thông tin thành công!');
            // return "FAlse";
        }
    }
    public function getChangePassword(){
    	return view('job.profile.changePassword');
    }
    public function postChangePassword(Request $request){
        if(!(Hash::check($request->get('current_password'), Auth::user()->password))){
            return back()->with('error', 'Mật khẩu cũ không chính xác');
        }
       if(strcmp($request->get('current_password'), $request->get('new_password')) == 0){
            return back()->with('false', 'Mật khẩu mới không được trùng lập với mật khẩu cũ');
       }
       $request->validate([
           'current_password' => 'required',
           'new_password'     => 'required|string|min:8|confirmed',
       ], [
           'current_password.required' => 'Vui lòng nhập mật khẩu',
           'new_password.required'     => 'Vui lòng nhập mật khẩu',
           'new_password.min'          => 'Mật khẩu phải trên 8 ký tự',
           'new_password.confirmed'    => 'Mật khẩu xác nhận không trùng khớp.',

       ]);
       $user = Auth::user();
       $user->password = bcrypt($request->new_password);
       $user->save();
       return back()->with('success', 'Đổi mật khẩu thành công');
    }
}
