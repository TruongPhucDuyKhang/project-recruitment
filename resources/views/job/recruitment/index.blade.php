@extends('templates.job.master')
@section('main-content')
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Xin chào {{ Auth::user()->fullname }}</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

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
							<h3>Danh sách tin tuyển dụng</h3>
							<div class="extra-job-info">
								<span><i class="la la-clock-o"></i><strong></strong> Công việc đã đăng</span>
								<span><i class="la la-file-text"></i><strong>20</strong> Application</span>
								<span><i class="la la-users"></i><strong></strong> Việc làm đang hoạt động</span>
							</div>
							<table>
								<thead>
									<tr>
										<td>Tên tuyển dụng</td>
										<td>Ngành nghề</td>
										<td>Ngày đăng</td>
										<td>Tình trạng</td>
										<td>Chức năng</td>
									</tr>
								</thead>
								<tbody>
									@foreach($item as $items)
									@php 
										$id   	   = $items->recruitment_id;
										$uid	   = $items->id;
										$name 	   = $items->name;
										$city_name = $items->city_name;
										$cname     = $items->cname;
										$deadline  = $items->deadline;
										$status    = $items->status;
										$pin       = $items->pin;

										$slug = Str::slug($name);
										$urlDetail = route('job.list.detail', [$slug, $id]);
									@endphp
									@if($uid == Auth::user()->id)
									<tr>
										<td>
											<div class="table-list-title">
												<h3><a href="{{ $urlDetail }}" title="">{{ $name }}</a></h3>
												<span><i class="la la-map-marker"></i>{{ $city_name }}</span>
											</div>
										</td>
										<td>
											<span class="applied-field">{{ $cname }}</span>
										</td>
										<td>
											<span>{{ $deadline }}</span>
										</td>
										<td>
											@if($status == 0)
											<span class="status active">Chờ xét duyệt</span>
											@else
											<span class="status">Đã duyệt</span>
											@endif
										</td>
										<td>
											<ul class="action_job">
												@if($pin == 1)
												<li><span>Đã ghim</span><a href="#" class="text-primary" title=""><i class="la la-thumb-tack"></i></a></li>
												@else
												<li><span>Ghim</span><a href="#" data-id="{{ $id }}" class="pin" title=""><i class="la la-thumb-tack"></i></a></li>
												@endif
												<li><span>Sửa</span><a href="#" title=""><i class="la la-pencil"></i></a></li>
											</ul>
										</td>
									</tr>
									@endif
									@endforeach
								</tbody>
							</table>
							<script>
								$(document).ready(function(){
									$(".pin").on("click", function(e){
										e.preventDefault();
										var id  = $(this).attr("data-id");
										var url = "{{ route('pin') }}";
										
										$.ajax({
											url: url,
											data: {
												id:id,
											},
											success: function(data){
												if(data.error){
													Swal.fire({
														icon: 'error',
														title: 'Lỗi',
														text: 'Nếu bạn chưa có xu thì hãy click đường dẫn bên dưới để mua xu!',
														footer: '<a href="{{ route('job.coin.vnpay-coin') }}">Đi đến mua xu?</a>'
													  });
												}else if(data.success) {
													Swal.fire({
														icon: 'success',
														title: '',
														text: 'Bạn sẽ bị tốn 10 xu để có thể ghim bài viết!',
													  });		
												}else if(data.errorPin){
													Swal.fire({
														icon: 'error',
														title: 'Lỗi',
														text: 'Đã có quá 6 bài tuyển dụng được ghim!',
													  });
												}
											},
										});
									});
								});
							</script>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop