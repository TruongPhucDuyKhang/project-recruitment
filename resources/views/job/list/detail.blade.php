@if($findItem->status == 0)
    @include('error.404')
@else 
@extends('templates.job.master')
@section('main-content')
<section class="overlape">
    <div class="block nop-padding">
        {{--  <div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider1.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->  --}}
        <div class="container fluid">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner-header">
                        @php 
                            $deadline = $findItem->deadline;
                            $newDeadline = date('d/m/Y', strtotime($deadline));
                        @endphp
                        <h3>{{ $findItem->name }}</h3>
                        <div class="job-statistic">
                            <span>{{ $findItem->tname }}</span>
                            <p><i class="la la-map-marker"></i>{{ $findItem->city_name }}</p>
                            <p><i class="la la-calendar-o"></i>{{ $newDeadline }}</p>
                        </div>
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
                <div class="col-lg-8 column">
                    <div class="job-single-sec">
                        <div class="job-single-head">
                            <div class="job-thumb"> 
                                <img src="/job/storage/app/{{ $findItem->picture }}" alt="" />
                            </div>
                            <div class="job-head-info">
                                @if($findItem->name_company == null)
                                <h4>{{ $findItem->fullname }}</h4>
                                @else
                                <h4>{{ $findItem->name_company }}</h4>
                                @endif
                                <span>{{ $findItem->andress }}</span>
                                <p><i class="la la-unlink"></i> {{ $findItem->website }}</p>
                                <p><a href="tel:{{ $findItem->phone }}"><i class="la la-phone"></i> {{ $findItem->phone }}</a></p>
                                <p><i class="la la-envelope-o"></i> 
                                <a href="mailto:{{ $findItem->email }}" class="__cf_email__" data-cfemail="94f5f8fdbae0e1f2f5fad4fefbf6fce1fae0baf7fbf9">{{ $findItem->email }}
                                </a></p>
                                <p><i class="la la-eye"></i> L?????t ?????c 5683</p>
                                <p><i class="la la-heart-o"></i> L?????t th??ch 5683</p>
                            </div>
                        </div><!-- Job Head -->
                        <div class="job-details">
                            <h3>M?? T??? C??NG VI???C</h3>
                            <p>{{ $findItem->preview_text }}</p>
                            <h3>QUY???N L???I ???????C H?????NG</h3>
                            <ul>
                                <li>{{ $findItem->benefit_text }}</li>
                            </ul>
                            <h3>Y??U C???U H??? S??</h3>
                            <ul>
                                <li>{{ $findItem->profile_text }}</li>
                            </ul>
                        </div>
                        <div class="share-bar">
                            <span>Chia s???</span><a href="#" title="" class="share-fb"><i class="fa fa-facebook"></i></a>
                        </div>
                        <div class="recent-jobs">
                            <h3>VI???C L??M T????NG T???</h3>
                            <div class="job-list-modern">
                                <div class="job-listings-sec no-border">
                                    @foreach($takeJob as $takeJobs)
                                    @if($findItem->recruitment_id != $takeJobs->recruitment_id)
                                    <div class="job-listing wtabs">
                                        <div class="job-title-sec">
                                            <div class="c-logo"> <img src="/job/storage/app/{{ $takeJobs->picture }}" alt="" /> </div>
                                            <h3><a href="{{ route('job.list.detail', [Str::slug($takeJobs->name), $takeJobs->recruitment_id])}}" title="">{{ $takeJobs->name }}</a></h3>
                                            <a href="{{ route('job.company.detail', [Str::slug($takeJobs->name_company), $takeJobs->id]) }}"><span>{{ $takeJobs->name_company }}</span></a><br />
                                            <div class="job-lctn"><i class="la la-map-marker"></i>{{ $takeJobs->city_name }}</div>
                                        </div>
                                        <div class="job-style-bx">
                                            <span class="job-is ft">{{ $takeJobs->tname }}</span>
                                            {{--  <span class="fav-job"><i class="la la-heart-o"></i></span>  --}}
                                            <i>5 ng??y tr?????c</i>
                                        </div>
                                    </div>
                                    @endif
                                    @endforeach
                                </div>
                                </div>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4 column">
                    @if(Auth::check())
                    @if(Auth::user()->permission == 0)
                    <form action="{{ route('job.submitinfo.add') }}" method="get">
                    <input type="hidden" name="recruitment_id" value="{{ $findItem->recruitment_id }}">
                        @if($findSub->count())     
                            @if($findUser->id == Auth::user()->id)  
                            <button type="button" data-toggle="modal" data-target="#myModel" style="background: #9fa4e1;color:white;border-color: #9fa4e1;" class="apply-thisjob" title=""><i class="la la-paper-plane"></i>N???P H??? S??</button>
                            @else
                            <button style="background: #9fa4e1;color:white;border-color: #9fa4e1;" class="apply-thisjob" title=""><i class="la la-paper-plane"></i>N???P H??? S??</button>
                            @endif
                        @else
                        <button style="background: #9fa4e1;color:white;border-color: #9fa4e1;" class="apply-thisjob" title=""><i class="la la-paper-plane"></i>N???P H??? S??</button>
                        @endif
                    </form>
                    @endif
                    @else 
                    <form action="javascript:void(0)" method="get">
                    <button style="background: #9fa4e1;color:white;border-color: #9fa4e1;" class="apply-thisjob signin-popup" title=""><i class="la la-paper-plane"></i>N???P H??? S??</button>
                    </form>
                    @endif
                    <style>
                        .apply-alternative a.active-ajax{
                            background: #fb236a;
                            border-color: #fb236a;
                            color: #ffffff;
                        }
                    </style>
                    <div id="ajax-savercm">
                        @include('job.list.ajax-savercm')
                    </div>
                    <div class="job-overview">
                        <h3>T???ng quan v??? c??ng vi???c</h3>
                        <ul>
                            <li><i class="la la-money"></i><h3>M???c l????ng</h3><span>{{ $findItem->mname }}</span></li>
                            <li><i class="la la-mars-double"></i><h3>Y??u c???u gi???i t??nh</h3><span>{{ $findItem->gender }}</span></li>
                            <li><i class="la la-thumb-tack"></i><h3>Ch???c v???</h3><span>{{ $findItem->rname }}</span></li>
                            <li><i class="la la-puzzle-piece"></i><h3>Ng??nh ngh???</h3><span>{{ $findItem->cname }}</span></li>
                            <li><i class="la la-user"></i><h3>S??? l?????ng c???n tuy???n</h3><span>{{ $findItem->qty }}</span></li>
                            <li><i class="la la-map-marker"></i><h3>?????a ??i???m l??m vi???c</h3><span>{{ $findItem->city_name }}</span></li>
                            {{-- <li><i class="la la-line-chart"></i><h3>Y??u c???u b???ng c???p</h3><span>{{ $findItem->rname }}</span></li> --}}
                            <li><i class="la la-laptop"></i><h3>H??nh th???c l??m vi???c</h3><span>{{ $findItem->tname }}</span></li>
                        </ul>
                    </div><!-- Job Overview -->
                </div>
            </div>
        </div>
    </div>
</section>
@stop
@endif