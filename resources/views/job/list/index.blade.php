@extends('templates.job.master')
@section('main-content')
<section class="overlape">
	<div class="block no-padding">
		<div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
		<div class="container fluid">
			<div class="row">
				<div class="col-lg-12">
					<div class="inner-header">
						<h3>Tất cả việc làm</h3>
					</div>
				</div>
			</div>
		</div>
	</div>
</section>

<section>
	<div class="block less-top">
		<div class="container">
			<div class="row">
				<!-- Left bar -->
				@include('templates.job.leftbar')
				<!-- End Left bar -->
				<div class="col-lg-9 column">
					<div class="filterbar">
						{{-- <p>Total of 145 Employer</p> --}}
						{{-- <div class="sortby-sec">
							<span>Sort by</span>
							<select data-placeholder="20 Per Page" class="chosen">
								<option>30 Per Page</option>
								<option>40 Per Page</option>
								<option>50 Per Page</option>
								<option>60 Per Page</option>
							</select>
						</div> --}}
					</div>
					<div id="wherewage">
						@include('job.list.ajax')
					</div>
				</div>
			</div>
		</div>
	</div>
</section>
@stop

