@if(Auth::check())
<div class="my-profiles-sec">
	<span>
		@if(Auth::user()->picture == null)
		<img src="/job/storage/app/avatar/images.png" width="50px" height="50px" alt="" /> 
		@else 
		<img src="/job/storage/app/{{ Auth::user()->picture }}" width="50px" height="50px" alt="" />
		@endif
		@if(Auth::user()->permission == 1)
		@if(Auth::user()->name_company == null)
		{{ Auth::user()->fullname }} <i class="la la-bars"></i>
		@else
		{{ Auth::user()->name_company }} <i class="la la-bars"></i>
		@endif
		@elseif(Auth::user()->permission == 0)
		{{ Auth::user()->fullname }} <i class="la la-bars"></i>
		@elseif(Auth::user()->permission == 2)
		{{ Auth::user()->fullname }} <i class="la la-bars"></i>
		@endif
	</span>
</div>
<style>
	.wishlist-dropsec > span {
		border: 2px solid rgb(123, 118, 118);
	}
</style>
<div class="wishlist-dropsec">
	<span><i class="la la-bell text-dark"></i><strong>3</strong></span>
	<div class="wishlist-dropdown">
		<ul class="scrollbar ss-container">
			<div class="ss-wrapper">
				<div class="ss-content">
					<li>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="{{ $publicUrl }}/images/resource/l1.png" alt=""> </div>
								<h3><a href="#" title="">Web Designer / Developer</a></h3>
								<span>Massimo Artemisis</span>
							</div>
						</div><!-- Job -->
					</li>
					<li>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="{{ $publicUrl }}/images/resource/l2.png" alt=""> </div>
								<h3><a href="#" title="">C Developer (Senior) C .Net</a></h3>
								<span>StarHealth</span>
							</div>
						</div><!-- Job -->
					</li>
					<li>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="{{ $publicUrl }}/images/resource/l3.png" alt=""> </div>
								<h3><a href="#" title="">Marketing Director</a></h3>
								<span>Tix Dog</span>
							</div>
						</div><!-- Job -->
					</li>
					<li>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="{{ $publicUrl }}/images/resource/l4.png" alt=""> </div>
								<h3><a href="#" title="">Web Designer / Developer</a></h3>
								<span>Massimo Artemisis</span>
							</div>
						</div><!-- Job -->
					</li>
					<li>
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="{{ $publicUrl }}/images/resource/l5.png" alt=""> </div>
								<h3><a href="#" title="">Web Designer / Developer</a></h3>
								<span>Massimo Artemisis</span>
							</div>
						</div><!-- Job -->
					</li>
				</div>
			</div>
			{{-- <div class="ss-scroll" style="height: 60%; top: 0%; right: -325px;"></div> --}}
		</ul>
	</div>
</div>
@else
<div class="btn-extars">
<ul class="account-btns">
<li class="signup-popup"><a title=""><i class="la la-key"></i> Đăng ký</a></li>
<li class="signin-popup"><a title=""><i class="la la-external-link-square"></i> Đăng nhập</a></li>
</ul>
</div>
@endif