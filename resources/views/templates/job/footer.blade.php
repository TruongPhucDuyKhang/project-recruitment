<footer>
	<div class="bottom-line">
		<span>© 2020 được viết bởi <a href="">Duy Khang</a></span>
		<a href="#scrollup" class="scrollup" title=""><i class="la la-arrow-up"></i></a>
	</div>
</footer>

</div>

<div class="contactus-popup">
	<div class="contact-popup">
		<i class="la la-close close-contact"></i>
		<h3>Send Message to “Ali TUFAN”</h3>
		<form>
			<div class="popup-field">
				<input type="text" placeholder="Tera Planer" />
				<i class="la la-user"></i>
			</div>
			<div class="popup-field">
				<input type="text" placeholder="demo@jobhunt.com" />
				<i class="la la-envelope-o"></i>
			</div>
			<div class="popup-field">
				<input type="text" placeholder="+90 538 845 09 85" />
				<i class="la la-phone"></i>
			</div>
			<div class="popup-field">
				<textarea placeholder="Message"></textarea>
			</div>
			<button type="submit">Send Message</button>
		</form>
	</div>
</div>

<div class="account-popup-area signin-popup-box">
<div class="account-popup">
	<span class="close-popup"><i class="la la-close"></i></span>
	<h3>Đăng nhập</h3>
	{{-- <span>Click To Login With Demo User</span> --}}
	<form class="form_login" method="POST" action="{{ route('post-login') }}">
		{{-- <div class="select-user">
			<span>Ứng viên</span>
			<span>Nhà tuyển dụng</span>
		</div> --}}
		@csrf
		<div class="cfield">
			<input type="email" placeholder="E-MAIL" class="email" />
			<i class="la la-user"></i>
		</div>
		<div class="cfield">
			<input type="password" placeholder="********" class="password"/>
			<i class="la la-key"></i>
		</div>
		<p class="remember-label">
			<input type="checkbox" class="remember_me" id="cb1"><label for="cb1">Nhớ mật khẩu</label>
		</p>
		<a href="#" title="">Quên mật khẩu?</a>
		<button type="submit">Đăng nhập</button>
	</form>
	<script>
		$(document).ready(function(){
			$(".form_login").on("submit", function(e){
				e.preventDefault();
				var url 	 = "{{ route('post-login') }}";
				var email    = $(".email").val();
				var password = $(".password").val();
				var remember_me =  $('.remember_me').val();

				$.ajax({
					url: url,
					type: "POST",
					data: {
						email: email,
						password: password,
						remember_me: remember_me,
					},
					success: function(data){
						if(data.success) {
							toastr.success(data.success, '', {
							  "closeButton": false,
							  "debug": false,
							  "newestOnTop": false,
							  "progressBar": true,
							  "positionClass": "toast-top-right",
							  "preventDuplicates": false,
							  "onclick": null,
							  "showDuration": "300",
							  "hideDuration": "1000",
							  "timeOut": "1000",
							  "extendedTimeOut": "1000",
							  "showEasing": "swing",
							  "hideEasing": "linear",
							  "showMethod": "fadeIn",
							  "hideMethod": "fadeOut"
							});
							setTimeout(function(){
                            window.location.reload();
                        	}, 1000);
						}else {
							toastr.error(data.errors);
						}
						{{--  alert(data);  --}}
					}
				});
			});
		});
	</script>
	<div class="extra-login">
		<span>Or</span>
		<div class="login-social">
			<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
			<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
		</div>
	</div>
</div>
</div><!-- LOGIN POPUP -->

<div class="account-popup-area signup-popup-box">
<div class="account-popup">
	<span class="close-popup"><i class="la la-close"></i></span>
	<h3>Đăng ký</h3>
	{{-- <div class="select-user">
		<span>Ứng viên</span>
		<span>Nhà tuyển dụng</span>
	</div> --}}
	<form class="form_register">
		<div class="cfield">
			<input type="text" placeholder="Họ và tên" class="fullname" name="fullname" />
			<i class="la la-user"></i>
		</div>
		<div class="cfield">
			<input type="password" placeholder="********" name="password" class="passwords"/>
			<i class="la la-key"></i>
		</div>
		<div class="cfield">
			<input type="text" placeholder="E-MAIL" name="email" class="e-mail" />
			<i class="la la-envelope-o"></i>
		</div>
		<div class="cfield">
			<input type="date" name="birthday" class="birthday"/>
		</div>
		<div class="dropdown-field">
			<select data-placeholder="Please Select Specialism" class="chosen permission" name="permission">
				<option value="0">Ứng viên</option>
				<option value="1">Nhà tuyển dụng</option>
			</select>
		</div>
		<div class="cfield">
			<input type="text" placeholder="Số điện thoại" name="phone" class="phone" />
			<i class="la la-phone"></i>
		</div>
		<button type="submit">Tạo tài khoản</button>
	</form>
	<script>
		$(document).ready(function(){
			$(".form_register").on("submit", function(e){
				e.preventDefault();
				var url 	   = "{{ route('post-register') }}";
				var fullname   = $(".fullname").val();	
				var password   = $(".passwords").val();	
				var email      = $(".e-mail").val();	
				var birthday   = $(".birthday").val();	
				var permission = $(".permission").val();	
				var phone      = $(".phone").val();	

				$.ajax({
					url: url,
					type: "POST",
					data: {
						fullname: fullname,
						password: password,
						email: email,
						birthday: birthday,
						permission: permission,
						phone: phone,
					},
					success: function(data){
						if(data.errors) {
							for(var count = 0; count < data.errors.length; count++) {
								toastr.error(data.errors[count]);
							}
						}else {
							toastr.success(data.success);
							setTimeout(function(){
								window.location.reload();
							}, 200);
						}
	     				{{-- alert(data); --}}
	     			}
	     		});
			});
		});
	</script>
	<div class="extra-login">
		<span>Or</span>
		<div class="login-social">
			<a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
			<a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
		</div>
	</div>
</div>
</div><!-- SIGNUP POPUP -->

@if(Auth::check())
<div class="profile-sidebar">
<span class="close-profile"><i class="la la-close"></i></span>
<div class="can-detail-s">
	<div class="cst">
		@if(Auth::user()->picture == null)
		<img src="/job/storage/app/avatar/images.png" width="50px" height="50px" alt="" /> 
		@else 
		<img src="/job/storage/app/{{ Auth::user()->picture }}" width="50px" height="50px" alt="" />
		@endif
	</div>
	@if(Auth::user()->permission == 1)
	@if(Auth::user()->name_company == null)
	<h3>{{  Auth::user()->fullname }}</h3>
	@else
	<h3>{{  Auth::user()->name_company }}</h3>
	@endif
	<p><i class="la la-envelope-o"></i>{{ Auth::user()->email }}</p>
	@elseif(Auth::user()->permission == 0)
	<h3>{{ Auth::user()->fullname }}</h3>
	<p><i class="la la-envelope-o"></i>{{ Auth::user()->email }}</p>
	@elseif(Auth::user()->permission == 2)
	<h3>{{ Auth::user()->fullname }}</h3>
	<p><i class="la la-envelope-o"></i>{{ Auth::user()->email }}</p>
	@endif
</div>
<div class="tree_widget-sec">
	@include('templates.job.leftbar-profile')
</div>
</div><!-- Profile Sidebar -->
@endif

<!-- Resume -->
<div class="modal fade" tabindex="-1" id="resumeModel" role="dialog" aria-labelledby="gridSystemModalLabel">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
          <h4 class="modal-title" id="gridSystemModalLabel">Hồ sơ ứng tuyển</h4>
		  <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<div class="modal-body-hidden">
			<div class="col-lg-12"><p>Tên Bằng cấp/Chứng chỉ: <span class="location"></span></p></div>
			<div class="col-lg-12"><p>Trường/Đơn vị đào tạo: <span class="info_school"></span></p></div>
			<div class="col-lg-12"><p>Chuyên ngành: <span class="specialized"></span></p></div>
			<div class="col-lg-12"><p><span class="school_day"></span> - <span class="school_end_day"></span></p></div>
			<div class="col-lg-12"><p>Loại tốt nghiệp: <span class="type"></span></p></div>
			<div class="col-lg-12"><p>Ảnh bằng cấp</p></div>
			<div class="col-lg-12">
			<div class="emply-resume-thumb">
				<img class="imgModal" src="" alt="">
			</div>
			</div>
		</div>
	  </div><!-- /.modal-content -->
	</div><!-- /.modal-dialog -->
  </div><!-- /.modal -->
<!--  End - Resume  -->

<div class="coverletter-popup">
	<div class="cover-letter">
		<i class="la la-close close-letter"></i>
		<h3>Thông báo</h3>
		<p class="text-center">Chức năng dành cho người tìm việc!</p>
	</div>
</div>

<div class="modal fade" id="myModel" tabindex="-1" role="dialog">
	<div class="modal-dialog" role="document">
	  <div class="modal-content">
		<div class="modal-header">
			<h3 class="modal-title" id="gridModalLabel">Thông báo</h3>
			<button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
		</div>
		<div class="modal-body">
		  <p>Bạn đã nộp hồ sơ cho tin tuyển dụng này ngày!</p>
		</div>
	</div><!-- /.modal-content -->
</div><!-- /.modal-dialog -->
</div><!-- /.modal -->

<script src="{{ $publicUrl }}/js/jquery.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/modernizr.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/script.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/alertmess.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/bootstrap.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/wow.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/slick.min.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/parallax.js" type="text/javascript"></script>
<script src="{{ $publicUrl }}/js/select-chosen.js" type="text/javascript"></script>
{{-- <script src="{{ $publicUrl }}/js/jquery.scrollbar.min.js" type="text/javascript"></script> --}}
{{-- <script src="{{ $publicUrl }}/js/circle-progress.min.js" type="text/javascript"></script> --}}
<script>
$.ajaxSetup({
	headers: {
		'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
	}
});
</script>
</body>

</html>