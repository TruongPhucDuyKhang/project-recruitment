@extends('templates.job.master')
@section('main-content')
@if(Session::has('msg'))
<div class="alert alert-success">
  <span class="closebtn" onclick="this.parentElement.style.display='none';">&times;</span>
  {{ Session::get('msg') }}
</div>
@endif
<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="main-featured-sec">
						<div class="new-slide-3">
							<img src="{{ $publicUrl }}/images/resource/vector-4.png">
						</div>
						<div class="job-search-sec">
							<div class="job-search">
								<h3>Cách dễ nhất để có được công việc mới của bạn</h3>
								<span>Việc Làm KayG tự hào 16 năm làm cầu nối cho hơn 15 triệu lượt tuyển dụng và tìm việc thành công</span>
								<form method="GET" action="{{ route('job.index.search') }}">
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
											<div class="job-field">
												<input type="text" placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc..." name="q"/>
												<i class="la la-briefcase"></i>
											</div>
										</div>
										<div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
											<div class="job-field">
												<select placeholder="Tất cả ngành nghề" class="chosen-city" name="cat_id">
													<option value="">Tất cả ngành nghề</option>
													@foreach($cat as $cats)
													<option value="{{ $cats->cat_id }}">{{ $cats->cname }}</option>
													@endforeach
												</select>
												<i class="la la-wrench"></i>
											</div>
										</div>
										<div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
											<div class="job-field">
												<select data-placeholder="Tất cả địa điểm" class="chosen-city" name="matp">
													<option value="">Tất cả địa điểm</option>
													@foreach($city as $citys)
													<option value="{{ $citys->matp }}">{{ $citys->city_name }}</option>
													@endforeach
												</select>
												<i class="la la-map-marker"></i>
											</div>
										</div>
										<div class="col-lg-1 col-md-2 col-sm-12 col-xs-12">
											<button type="submit"><i class="la la-search"></i></button>
										</div>
									</div>
								</form>
							</div>
						</div>
						<div class="scroll-to">
							<a href="#scroll-here" title=""><i class="la la-arrow-down"></i></a>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section id="scroll-here">
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Ngành nghề phổ biến</h2>
						<span>37 việc làm đang hoạt động - 0 được thêm vào hôm nay.</span>
					</div><!-- Heading -->
					<div class="cat-sec">
						<div class="row no-gape">
							@foreach($cat as $cats)
							<div class="col-lg-3 col-md-3 col-sm-6">
								<div class="p-category">
									<a href="#" title="">
										<img src="/job/storage/app/public/nganh_chung.png" width="70px">
										<span>{{ $cats->cname }}</span>
										<p>(22 việc làm đang tuyển)</p>
									</a>
								</div>
							</div>
							@endforeach
						</div>
					</div>
				</div>
				<div class="col-lg-12">
					<div class="browse-all-cat">
						<a href="#" title="">Xem thêm</a>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block double-gap-top double-gap-bottom">
		<div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/parallax1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="simple-text-block">
						<h3>Tạo sự khác biệt với Sơ yếu lý lịch trực tuyến của bạn!</h3>
						<span>Sơ yếu lý lịch của bạn trong vài phút với trợ lý sơ yếu lý lịch Job KayG đã sẵn sàng!</span>
						<a class="signup-popup" title="">Đăng ký ngay</a>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section>

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Các nhà tuyển dụng nổi bật</h2>
						<span>Các nhà tuyển dụng hàng đầu đã sử dụng công việc và tài năng.</span>
					</div><!-- Heading -->
					<div class="job-listings-sec">
						@foreach($pin as $pins)
						@php 
							$pin_date = strtotime($pins->pin_date);
						@endphp
						<div class="job-listing">
							<div class="job-title-sec">
								<div class="c-logo"> <img src="/job/storage/app/{{ $pins->picture }}" alt="" /> </div>
								<h3><a href="{{ route('job.list.detail', [Str::slug($pins->name), $pins->recruitment_id]) }}" title="">{{ $pins->name }}</a></h3>
								<a href="{{ route('job.company.detail', [Str::slug($pins->name_company), $pins->id]) }}"><span>{{ $pins->name_company }}</span></a>
							</div>
							<span class="job-lctn"><i class="la la-map-marker"></i>{{ $pins->city_name }}</span>
							{{-- <span class="fav-job"><i class="la la-heart-o"></i></span> --}}
							<span class="job-is ft">{{ $pins->tname }}</span>
						</div><!-- Job -->
						<script>
							var readtime = setInterval(myTimer, 1000);
							var url      = "{{ route('update-pin') }}";
							var id       = "{{ $pins->recruitment_id }}";
							function myTimer() {
								var pin_date = "{{ $pin_date }}";
								var aestTime = new Date().toLocaleString("en-US", {timeZone: "Asia/SaiGon"});
								date_current = new Date(aestTime);  
								var date_current = Date.parse(date_current)/1000;
								if(date_current >= pin_date) {
									$.ajax({
										url: url,
										data: {
											id:id,
										},
										success: function(data){
											window.location.reload();
										},
									});
								clearInterval(myTimer,300);
								}
							}
						</script>
						@endforeach
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

{{-- <section>
	<div class="block">
		<div data-velocity="-.1" style="background: url(images/resource/parallax2.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible layer color light"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading light">
						<h2>Những lời tử tế từ những ứng viên hạnh phúc</h2>
						<span>Người khác nghĩ gì về dịch vụ do JobKayG cung cấp</span>
					</div><!-- Heading -->
					<div class="reviews-sec" id="reviews-carousel">
						<div class="col-lg-6">
							<div class="reviews">
								<img src="{{ $publicUrl }}/images/resource/r1.jpg" alt="" />
								<h3>Augusta Silva <span>Web designer</span></h3>
								<p>Without Job KayG i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-6">
							<div class="reviews">
								<img src="{{ $publicUrl }}/images/resource/r2.jpg" alt="" />
								<h3>Ali Tufan <span>Web designer</span></h3>
								<p>Without Job KayG i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-6">
							<div class="reviews">
								<img src="{{ $publicUrl }}/images/resource/r1.jpg" alt="" />
								<h3>Augusta Silva <span>Web designer</span></h3>
								<p>Without Job KayG i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
						<div class="col-lg-6">
							<div class="reviews">
								<img src="{{ $publicUrl }}/images/resource/r2.jpg" alt="" />
								<h3>Ali Tufan <span>Web designer</span></h3>
								<p>Without Job KayG i’d be homeless, they found me a job and got me sorted out quickly with everything!  Can’t quite believe the service</p>
							</div><!-- Reviews -->
						</div>
					</div>
				</div>
			</div>
		</div>	
	</div>
</section> --}}

<section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Các công ty chúng tôi đã hợp tác</h2>
						<span>Một số công ty chúng tôi đã giúp tuyển dụng những ứng viên xuất sắc trong những năm qua.</span>
					</div><!-- Heading -->
					<div class="comp-sec">
						<div class="company-img">
							<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/cc1.jpg" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/cc2.jpg" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/cc3.jpg" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/cc4.jpg" alt="" /></a>
						</div><!-- Client  -->
						<div class="company-img">
							<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/cc5.jpg" alt="" /></a>
						</div><!-- Client  -->
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block">
		<div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/parallax3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Tin tức mới</h2>
						<span>Được tìm thấy bởi nhà tuyển dụng giao tiếp trực tiếp với người quản lý tuyển dụng và nhà tuyển dụng.</span>
					</div><!-- Heading -->
					<div class="blog-sec">
						<div class="row">
							<div class="col-lg-4">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/b1.jpg" alt="" /></a>
										<div class="blog-metas">
											<a href="#" title="">March 29, 2017</a>
											<a href="#" title="">0 Comments</a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="#" title="">Attract More Attention Sales And Profits</a></h3>
										<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
										<a href="#" title="">Xem Thêm <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/b2.jpg" alt="" /></a>
										<div class="blog-metas">
											<a href="#" title="">March 29, 2017</a>
											<a href="#" title="">0 Comments</a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="#" title="">11 Tips to Help You Get New Clients</a></h3>
										<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
										<a href="#" title="">Xem Thêm <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="my-blog">
									<div class="blog-thumb">
										<a href="#" title=""><img src="{{ $publicUrl }}/images/resource/b3.jpg" alt="" /></a>
										<div class="blog-metas">
											<a href="#" title="">March 29, 2017</a>
											<a href="#" title="">0 Comments</a>
										</div>
									</div>
									<div class="blog-details">
										<h3><a href="#" title="">An Overworked Newspaper Editor</a></h3>
										<p>A job is a regular activity performed in exchange becoming an employee, volunteering, </p>
										<a href="#" title="">Xem Thêm <i class="la la-long-arrow-right"></i></a>
									</div>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

{{--  <section>
	<div class="block">
		<div class="container">
			<div class="row">
				<div class="col-lg-12">
					<div class="heading">
						<h2>Mua các gói xu của chúng tôi</h2>
						<span>Một trong những công việc của chúng tôi có một số loại tùy chọn linh hoạt - chẳng hạn như làm việc từ xa, lịch trình bán thời gian hoặc lịch trình linh hoạt hoặc linh hoạt.</span>
					</div><!-- Heading -->
					<div class="plans-sec">
						<div class="row">
							<div class="col-lg-4">
								<div class="pricetable">
									<div class="pricetable-head">
										<h2><i>$</i>10</h2>
									</div><!-- Price Table -->
									<ul>
										<li>1 job posting</li>
										<li>0 featured job</li>
										<li>Job displayed for 20 days</li>
										<li>Premium Support 24/7</li>
									</ul>
									<a href="#" title="">MUA NGAY</a>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pricetable active">
									<div class="pricetable-head">
										<h2><i>$</i>40</h2>
									</div><!-- Price Table -->
									<ul>
										<li>11 job posting</li>
										<li>12 featured job</li>
										<li>Job displayed for 30 days</li>
										<li>Premium Support 24/7</li>
									</ul>
									<a href="#" title="">MUA NGAY</a>
								</div>
							</div>
							<div class="col-lg-4">
								<div class="pricetable">
									<div class="pricetable-head">
										<h2><i>$</i>20</h2>
									</div><!-- Price Table -->
									<ul>
										<li>44 job posting</li>
										<li>56 featured job</li>
										<li>Job displayed for 80 days</li>
										<li>Premium Support 24/7</li>
									</ul>
									<a href="#" title="">MUA NGAY</a>
								</div>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>  --}}

<section>
	<div class="block no-padding">
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="simple-text">
						<h3>Gat một câu hỏi?</h3>
						<span>Chúng tôi ở đây để giúp đỡ. Xem Câu hỏi thường gặp của chúng tôi, gửi email cho chúng tôi hoặc gọi cho chúng tôi theo số 1 (800) 555-5555</span>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop