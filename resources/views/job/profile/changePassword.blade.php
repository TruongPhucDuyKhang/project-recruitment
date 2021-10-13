@extends('templates.job.master')
@section('main-content')
<section class="overlape">
<!-- main -->
@include('templates.job.main')
<!-- END MAIN -->
</section>
@if(Session::has('success'))
<script>
	toastr.info('Đổi mật khẩu thành công!', '', {
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
						<div class="manage-jobs-sec">
							<h3>Đổi mật khẩu</h3>
							<div class="change-password">
								<form class="needs-validation" method="post" action="{!! route('job.profile.changePassword') !!}">
									@csrf
									<div class="row">
										<div class="col-lg-6">
											<span class="pf-title">Mật khẩu cũ</span>
											<div class="pf-field">
												<input type="password" name="current_password"/>
											</div>
											@error('current_password')
											<p class="text-danger">{{ $message }}</p>
											@enderror
											@if(Session::has('error'))
											<p class="text-danger">{{ Session::get('error') }}</p>
											@endif
											<span class="pf-title">Mật khẩu mới</span>
											<div class="pf-field">
												<input type="password" name="new_password"/>
											</div>
											@error('new_password')
											<p class="text-danger">{{ $message }}</p>
											@enderror
											@if(Session::has('false'))
											<p class="text-danger">{{ Session::get('false') }}</p>
											@endif
											<span class="pf-title">Xác nhập lại mật khẩu</span>
											<div class="pf-field">
												<input type="password" name="new_password_confirmation"/>
											</div>
											@error('new_password')
											<p class="text-danger">{{ $message }}</p>
											@enderror
											@if(Session::has('false'))
											<p class="text-danger">{{ Session::get('false') }}</p>
											@endif
												
											<button type="submit">Cập nhật</button>
										</div>
										<div class="col-lg-6">
											<i class="la la-key big-icon"></i>
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