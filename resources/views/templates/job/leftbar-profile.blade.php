@if(Auth::check())
@if(Auth::user()->permission == 0)
<ul>
	<li><a href="{{ route('job.profile.profilePersonal') }}" title=""><i class="la la-briefcase"></i>Quản lý tài khoản</a></li>
	<li><a href="{{ route('job.savercm.index') }}" title=""><i class="la la-paper-plane"></i>Việc đã lưu</a></li>
	<li><a href="{{ route('job.submitinfo.index') }}" title=""><i class="la la-user"></i>Việc đã ứng tuyển</a></li>
	<li><a href="{{ route('job.profile.changePassword') }}" title=""><i class="la la-lock"></i>Đổi mật khẩu</a></li>
	<li><a href="{{ route('logout') }}" title=""><i class="la la-unlink"></i>Đăng xuất</a></li>
</ul>
@elseif(Auth::user()->permission == 1)
<ul>
	<li><a href="{{ route('job.profile.profilePersonal') }}" title=""><i class="la la-user"></i>Quản lý tài khoản</a></li>
	<li><a href="{{ route('job.company.add') }}" title=""><i class="la la-file-text"></i>Hồ sơ công ty</a></li>
	<li><a href="{{ route('job.recruitment.add') }}" title=""><i class="la la-plus"></i>Đăng tin tuyển dụng</a></li>
	<li><a href="{{ route('job.recruitment.index') }}" title=""><i class="la la-briefcase"></i>Danh sách tin tuyển dụng</a></li>
	<li><a href="{{ route('job.resume.index') }}" title=""><i class="la la-book"></i>Hồ sơ đã ứng tuyển</a></li>
	<li><a href="{{ route('job.coin.vnpay-coin') }}" title=""><i class="la la-money"></i>Job Xu</a></li>
	<li><a href="{{ route('job.profile.changePassword') }}" title=""><i class="la la-lock"></i>Đổi mật khẩu</a></li>
	<li><a href="{{ route('logout') }}" title=""><i class="la la-unlink"></i>Đăng xuất</a></li>
</ul>
@elseif(Auth::user()->permission == 2)
<ul>
	<li><a href="{{ route('job.admin.index') }}" title=""><i class="la la-bank"></i>Trang chủ</a></li>
	<li><a href="{{ route('job.profile.profilePersonal') }}" title=""><i class="la la-user"></i>Quản lý tài khoản</a></li>
	<li><a href="{{ route('job.profile.profilePersonal') }}" title=""><i class="la la-newspaper-o"></i>Quản lý tin tức</a></li>
	<li><a href="{{ route('job.profile.profilePersonal') }}" title=""><i class="la la-newspaper-o"></i>Quản lý tin tuyển dụng</a></li>
	<li><a href="{{ route('job.profile.changePassword') }}" title=""><i class="la la-lock"></i>Đổi mật khẩu</a></li>
	<li><a href="{{ route('logout') }}" title=""><i class="la la-unlink"></i>Đăng xuất</a></li>
</ul>
@endif
@endif