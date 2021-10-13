@extends('templates.job.master')
@section('main-content')
<section class="overlape">
	<!-- main -->
	@include('templates.job.main')
	<!-- END MAIN -->
</section>
@if(Session::has('success'))
<script>
	toastr.info('{{ Session::get('success') }}', '', {
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
						<div class="profile-form-edit">
						<form method="POST" action="{{ route('job.profile.profilePersonal') }}" enctype="multipart/form-data">
							@csrf
							<div class="profile-title">
								<h3>Thông tin tài khoản</h3>
								@if(Auth::user()->permission == 0 || Auth::user()->permission == 2)
								<div class="upload-img-bar">
									<div class="uploadbox">
										 <label for="file-upload" class="custom-file-upload">
											@if(Auth::user()->picture == '')
											<i class="la la-cloud-upload"></i> <span>Avatar</span>
											@else
											<img src="/job/storage/app/{{ Auth::user()->picture }}" alt="" class="custom-file-upload">
											@endif
										</label>
										<input id="file-upload" type="file" style="display: none;" name="picture">
									 </div>
									<div class="upload-info">
										<span>Kích thước tệp tối đa là 1MB, Kích thước tối thiểu: 270x210 Và các tệp phù hợp là .jpg & .png</span>
									</div>
								</div>
								@endif
							</div>
							<div class="row">
								<div class="col-lg-6">
									<span class="pf-title">Tên chủ tài khoản *</span>
									<div class="pf-field">
										<input type="text" value="{{ Auth::user()->fullname }}" name="fullname"/>
									</div>
								</div>
								<div class="col-lg-6">
									<span class="pf-title">Email liên hệ *</span>
									<div class="pf-field">
										<input type="text" value="{{ Auth::user()->email }}" name="email"/>
									</div>
								</div>
								<div class="col-lg-6">
									<span class="pf-title">Địa chỉ liên hệ</span>
									<div class="pf-field">
										<input type="text" value="{{ Auth::user()->andress }}" name="andress">
									</div>
								</div>
								<div class="col-lg-6">
									<span class="pf-title">Ngày sinh *</span>
									<div class="pf-field">
										<input type="date" value="{{ Auth::user()->birthday }}" name="birthday">
									</div>
								</div>

								<div class="form-group">
									<button type="submit" name="submit">Lưu thông tin</button>
								</div>
							</div>
						</form>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
</section>
@stop