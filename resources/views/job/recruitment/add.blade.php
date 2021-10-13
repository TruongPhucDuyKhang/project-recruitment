@extends('templates.job.master')
@section('main-content')
<section class="overlape">
<!-- main -->
@include('templates.job.main')
<!-- END MAIN -->
</section>
@if(Session::has('success'))
<script>
	toastr.info('Đăng tin tuyển dụng thành công!', '', {
		"closeButton": false,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-center",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "5000",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	  });
</script>
@endif
<section>
<div class="block no-padding">
<div class="container">
<div class="row no-gape">
<aside class="col-lg-3 column border-right">
<div class="widget">
<div class="tree_widget-sec">
@include('templates.job.leftbar-profile')
</div>
</div>
</aside>
<div class="col-lg-9 column">
<div class="padding-left">
<div class="profile-title">
<div class="border-title"><h3>Đăng tin tuyển dụng</h3>
<a class="cancel" href="#" title=""><i class="la la-thumb-tack"></i></a>
</div>
<div class="steps-sec">
<div class="step active">
<p><i class="la la-info"></i></p>
<span>Information</span>
</div>
<div class="step">
<p><i class="la la-cc-mastercard"></i></p>
<span>Package & Payments</span>
</div>
<div class="step">
<p><i class="la la-check-circle"></i></p>
<span>Done</span>
</div>
</div>
</div>
<div class="profile-form-edit">
<form method="post" action="{{ route('job.recruitment.add') }}">
@csrf
<div class="row">
<div class="col-lg-12">
<span class="pf-title">Vị trí tuyển dụng *</span>
<div class="pf-field">
	<input type="text" name="name" placeholder="Lưu ý: Vị trí tuyển dụng sẽ không được chỉnh sửa sau 72 giờ kiểm duyệt"/>
	@error('name')
	<p class="text-danger">{{ $message }}</p>
	@enderror
</div>
</div>
<div class="col-lg-12">
<span class="pf-title">Mô tả công việc</span>
<div class="pf-field">
	<textarea name="preview_text"></textarea>
	@error('preview_text')
	<p class="text-danger">{{ $message }}</p>
	@enderror
</div>
</div>
<div class="col-lg-12">
<span class="pf-title">Quyền lợi được hưởng</span>
<div class="pf-field">
	<textarea name="benefit_text"></textarea>
	@error('benefit_text')
	<p class="text-danger">{{ $message }}</p>
	@enderror
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Ngành nghề</span>
<div class="pf-field">
	<select data-placeholder="Please Select Specialism" class="chosen" name="cat_id">
		@foreach($cat as $cats)
		<option value="{{ $cats->cat_id }}">{{ $cats->cname }}</option>
		@endforeach
	</select>
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Địa chỉ</span>
<div class="pf-field">
	<select data-placeholder="Please Select Specialism" class="chosen" name="matp">
		@foreach($city as $citys)
		<option value="{{ $citys->matp }}">{{ $citys->city_name }}</option>
		@endforeach
	</select>
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Mức lương</span>
<div class="pf-field">
	<select data-placeholder="Please Select Specialism" class="chosen" name="mid">
		@foreach($wage as $wages)
		<option value="{{ $wages->mid }}">{{ $wages->mname }}</option>
		@endforeach
	</select>
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Cấp bậc</span>
<div class="pf-field">
	<select data-placeholder="Please Select Specialism" class="chosen" name="rid">
		@foreach($rank as $ranks)
		<option value="{{ $ranks->rid }}">{{ $ranks->rname }}</option>
		@endforeach
	</select>
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Loại hình công việc</span>
<div class="pf-field">
	<select data-placeholder="Please Select Specialism" class="chosen" name="tid">
		@foreach($type as $types)
		<option value="{{ $types->tid }}">{{ $types->tname }}</option>
		@endforeach
	</select>
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Giới tính</span>
<div class="pf-field">
	<select data-placeholder="Please Select Specialism" class="chosen" name="gender">
		<option value="Nam">Nam</option>
		<option value="Nữ">Nữ</option>
		<option value="Không yêu cầu giới tính">Không yêu cầu giới tính</option>
	</select>
</div>
</div>
<div class="col-lg-12">
<span class="pf-title">Số lượng cần tuyển *</span>
<div class="pf-field">
	<input type="number" name="qty" min="1" value="1" max="100"/>
</div>
</div>
<div class="col-lg-12">
<span class="pf-title">Hạn nộp hồ sơ</span>
<div class="pf-field">
	<input type="date" placeholder="01.11.207"  class="form-control datepicker" name="deadline" />
</div>
</div>
<div class="col-lg-12">
<span class="pf-title">Yêu cầu hồ sơ</span>
<div class="pf-field">
	<textarea name="profile_text">Ưu tiên nộp hồ sơ trực tuyến qua hệ thống của Việc làm KayG
	Hoặc gửi CV mô tả quá trình học tập và làm việc về email liên hệ
	</textarea>
</div>
</div>
</div>

</div>
</div>

<!-- Contact Recruitment -->
<div class="col-lg-9 column">
<div class="padding-left">
<div class="profile-title">
<h3>Thông tin liên hệ</h3>
</div>
<div class="profile-form-edit">
<div class="row">
<div class="col-lg-12">
	<span class="pf-title">Tên người liên hệ *</span>
	<div class="pf-field">
		<input type="text" name="fullname" value="{{ Auth::user()->name_company }}"/>
	</div>
</div>


<div class="col-lg-6">
	<span class="pf-title">Địa chỉ liên hệ *</span>
	<div class="pf-field">
		<input type="text" name="andress" value="{{ Auth::user()->andress }}"/>
	</div>
</div>

<div class="col-lg-6">
	<span class="pf-title">Số điện thoại liên hệ *</span>
	<div class="pf-field">
		<input type="text" name="phone" value="{{ Auth::user()->phone }}"/>
	</div>
</div>

<div class="col-lg-12">
	<span class="pf-title">Email liên hệ *</span>
	<div class="pf-field">
		<input type="text" name="email" value="{{ Auth::user()->email }}"/>
	</div>
</div>
<div class="form-group">
	<div class="col-lg-12">
		<button type="button">Xem trước</button>
		<button type="submit">Đăng</button>
	</div>
</div>
</div>
</form>
</div>
</div>
</div>
</div>
</div>

</div>
</div>
</section>
@stop