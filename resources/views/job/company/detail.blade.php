@extends('templates.job.master')
@section('main-content')
<section class="overlape">
    <div class="block no-padding">
        <div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        <div class="container">
                            <div class="row">
                                <div class="col-lg-12">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section class="overlape">
    <div class="block remove-top">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="cand-single-user">
                        <div class="share-bar circle"></div>
                        <div class="can-detail-s">
                            <div class="cst">
                                @if($findUser->picture == null)
									<img src="/job/storage/app/avatar/images.png" /> 
                                @else 
                                    <img src="/job/storage/app/{{ $findUser->picture }}" alt="" />
                                @endif
                            </div>
                            <h3>{{ $findUser->name_company }}</h3>
                            <p><i class="la la-map-marker"></i>{{ $findUser->andress }}, {{ $findUser->city_name }}</p>
                            <p><i class="la la-users"></i>{{ $findUser->personnel }}</p>
                            <p><i class="la la-globe"></i>https://{{ $findUser->website }}/</p>
                            <div class="skills-badge">
                                {{-- <span>Photoshop</span><span>Designer</span><span>Ilustrator</span> --}}
                            </div>
                        </div>
                        <div class="download-cv"></div>
                    </div>
                    <div class="cand-details-sec">
                        <div class="row no-gape">
                            <div class="col-lg-12 column">
                                <div class="cand-details">
                                    <h2>Giới thiệu về công ty</h2>
                                    <p>{{ $findUser->content_company }}</p>
                                    <div class="companyies-fol-sec">
                                        <h2>Việc làm {{ $findUser->name_company }} (1)</h2>
                                        <div class="cmp-follow">
                                            <div class="row">
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="#" title=""><img src="{{ $publicUrl }}/images/resource/em1.jpg" alt="" /><span>King LLC</span></a>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="#" title=""><img src="{{ $publicUrl }}/images/resource/em2.jpg" alt="" /><span>Telimed</span></a>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="#" title=""><img src="{{ $publicUrl }}/images/resource/em3.jpg" alt="" /><span>Ucesas</span></a>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="#" title=""><img src="{{ $publicUrl }}/images/resource/em4.jpg" alt="" /><span>TeraPlaner</span></a>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="#" title=""><img src="{{ $publicUrl }}/images/resource/em5.jpg" alt="" /><span>Cubico</span></a>
                                                </div>
                                                <div class="col-lg-2 col-md-2 col-sm-3 col-xs-12">
                                                    <a href="#" title=""><img src="{{ $publicUrl }}/images/resource/em6.jpg" alt="" /><span>Airbnb</span></a>
                                                </div>
                                            </div>
                                        </div>
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
@stop

