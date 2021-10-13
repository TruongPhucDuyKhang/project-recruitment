<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Validator;
use Auth;
use App\Users;


class AuthController extends Controller
{
    public function __construct(Users $musers){
        $this->musers = $musers;
	}
	public function login(){
		return view('auth.auth.login');
	}
	public function postLoginTwo(Request $request){
		$email    = $request->email;
    	$password = $request->password;
		$remember = $request->has('remember_me') ? true : false;

    	if(Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
    		return redirect()->route('job.index.index')->with('msg','Đăng nhập thành công!');
    	}else {
    		return back()->with('msg', 'Sai email hoặc password!');
		}
		// return $request->all();
	}
	public function postLogin(Request $request){
		// echo "<pre>";
		// 	print_r($request->all());
		// echo "</pre>";
    	$email    = $request->email;
    	$password = $request->password;
		$remember = $request->has('remember_me') ? true : false;

        if(Auth::attempt(['email' => $email, 'password' => $password], $remember)) {
            return response()->json([
    			'success' => 'Đăng nhập thành công'
    		]);
        }else {
            return response()->json([
            	'errors' => 'Sai email hoặc password!'
            ]);
        }
	}
	
    public function postRegister(Request $request)
    {
    		// echo "<pre>";
    		// 	print_r($request->all());
    		// echo "</pre>";
    	$validator = Validator::make($request->all(), [
    		'fullname' 	 => 'required',
    		'password' 	 => 'required',
    		'email' 	 => 'required',
    		// 'permission' => 'required',
    		'phone'      => 'required',
    		'birthday'   => 'required',
    	], [
    		'fullname.required' => 'Vui lòng nhập họ và tên',
    		'password.required' => 'Vui lòng nhập mật khẩu',
    		'email.required' => 'Vui lòng nhập E-MAIL',
    		// 'permission.required' => 'Vui lòng nhập vị trí',
    		'phone.required' => 'Vui lòng nhập số điện thoại',
    		'birthday.required' => 'Vui lòng nhập ngày tháng năm sinh',
    	]);
    	if($validator->fails()) {
    		return response()->json([
    			'errors' => $validator->errors()->all()
    		]);
    	}
    	$fullname   = $request->fullname;
        $password   = bcrypt($request->password);
        $email      = $request->email;
        $permission = $request->permission;
        $phone      = $request->phone;
        $birthday 	= $request->birthday;

    	$data = ['fullname'   => $fullname,
        		 'password'   => $password,
        		 'email' 	  => $email,
        		 'permission' => $permission,
        		 'phone' 	  => $phone,
        		 'birthday'   => $birthday,
    			];
    	$result = $this->musers->register($data);
    	if($result == true) {
    		return response()->json([
    			'success' => 'Đăng ký thành công'
    		]);
    	}
	}
	public function logout() {
    	Auth::logout();
    	return back();
    }
}
