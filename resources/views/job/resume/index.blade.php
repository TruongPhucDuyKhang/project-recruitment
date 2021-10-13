@extends('templates.job.master')
@section('main-content')
<section class="overlape">
    <!-- main -->
    @include('templates.job.main')
    <!-- END MAIN -->
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
                        <div class="manage-jobs-sec addscroll">
                            <h3>Danh sách ứng tuyển dụng ({{ $resume->count() }})</h3>
                            <table class="pkges-table">
                                <thead>
                                    <tr>
                                        <td>Thông tin</td>
                                        <td>Vị trí ứng tuyển</td>
                                        <td>Ngày nộp</td>
                                        <td class="text-center">Tình trạng</td>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($resume as $resumes)
                                    <tr>
                                        <td>
                                            <div class="table-list-title">
                                                {{--  <h3><a href="#" title="">{{ $resumes->fullname }}</a></h3>  --}}
                                                <div class="emply-resume-list">
                                                    <div class="emply-resume-thumb">
                                                        @if($resumes->picture == null)
                                                        <img src="/job/storage/app/images.png" alt="">
                                                        @else
                                                        <img src="/job/storage/app/{{ $resumes->picture }}" alt="">
                                                        @endif
                                                    </div>
                                                    <div class="emply-resume-info">
                                                        <h3><a title="">{{ $resumes->fullname }}</a></h3>
                                                        <p>{{ date('d/m/Y', strtotime($resumes->birthday)) }}</p>
                                                        <p><i class="la la-phone"></i>{{ $resumes->phone }}</p>
                                                        <p><i class="la la-map-marker"></i>{{ $resumes->andress }}</p>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                        <td><span><a href="{{ route('job.list.detail', [Str::slug($resumes->name), $resumes->recruitment_id]) }}">{{ $resumes->name }}</a></span></td>
                                        <td>
                                            <span>{{ date('d/m/Y', strtotime($resumes->date_created)) }}</span>
                                        </td>
                                        <td class="text-center" id="result-{{ $resumes->submission_info_id }}">
                                            @include('job.resume.ajax-status')
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
                </div>
        </div>
    </div>
</section>
@stop