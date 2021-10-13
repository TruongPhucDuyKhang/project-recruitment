@extends('templates.job.master')
@section('main-content')
@if(Session::has('error'))
<script>
	toastr.error('{{ Session::get('error') }}', '', {
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
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header wform">
                        <div class="job-search-sec">
                            <div class="job-search">
                                <form method="GET" action="{{ route('job.index.search') }}">
									<div class="row">
										<div class="col-lg-5 col-md-5 col-sm-12 col-xs-12">
											<div class="job-field">
												<input type="text" placeholder="Tiêu đề công việc, vị trí, địa điểm làm việc..." name="q" value="{{ Request::get('q') }}" />
												<i class="la la-briefcase"></i>
											</div>
										</div>
										<div class="col-lg-3 col-md-5 col-sm-12 col-xs-12">
											<div class="job-field">
												<select placeholder="Tất cả ngành nghề" class="chosen-city" name="cat_id">
													<option value="">Tất cả ngành nghề</option>
													@foreach($cat as $cats)
													<option {{ Request::get('cat_id') == $cats->cat_id ? "selected='selected'" : "" }} value="{{ $cats->cat_id }}">{{ $cats->cname }}</option>
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
													<option {{ Request::get('matp') == $citys->matp ? "selected='selected'" : "" }} value="{{ $citys->matp }}">{{ $citys->city_name }}</option>
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
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block remove-top">
        <div class="container">
                <div class="row no-gape">
                <div class="col-lg-12 column">
                    <div class="modrn-joblist np">
                        <div class="filterbar">
                            <h5>KẾT QUẢ TÌM KIẾM ({{ $item->count() }})</h5>
                            <div class="sortby-sec">
                            @if(Request::get('q'))
                            <span>Có {{ $item->count() }} kết quả với từ khóa <span class="text-danger">"{{ $_GET['q'] }}";</span> </span>
                            @endif
                            </div>                            
                        </div>
                        </div><!-- MOdern Job LIst -->
                        <div class="job-list-modern">
                        <div class="job-listings-sec no-border">
                            @foreach($item as $items)
                            <div class="job-listing wtabs">
                                <div class="job-title-sec">
                                    <div class="c-logo"> <img src="/job/storage/app/{{ $items->picture }}" alt="" /> </div>
                                    <h3><a href="{{ route('job.list.detail', [Str::slug($items->name), $items->recruitment_id]) }}" title="">{{ $items->name }}</a></h3>
                                    <a href="{{ route('job.company.detail', [Str::slug($items->name_company), $items->id]) }}">
                                    <span>{{ $items->name_company }}</span>
                                    </a><br />
                                    <div class="job-lctn"><i class="la la-map-marker"></i>{{ $items->city_name }}</div>
                                </div>
                                <div class="job-style-bx">
                                    <span class="job-is ft">{{ $items->tname }}</span>
                                    {{-- <span class="fav-job"><i class="la la-heart-o"></i></span> --}}
                                    <i>{{ $now->diffForHumans($items->created_at)}}</i>
                                </div>
                            </div>
                            @endforeach
                        </div>
                        <div class="pagination">
                            <ul>
                                <li>{{ $item->links() }}</li>
                            </ul>
                        </div><!-- Pagination -->
                        </div>
                    </div>
                </div>
        </div>
    </div>
</section>
@stop