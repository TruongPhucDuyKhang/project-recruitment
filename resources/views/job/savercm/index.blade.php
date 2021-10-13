@extends('templates.job.master')
@section('main-content')
<section class="overlape">
    @include('templates.job.main')
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
                            <h3>Việc đã lưu ({{ $findItemSavercm }})</h3>
                            <table>
                                <thead>
                                    <tr>
                                        <td><i class="la la-star"></td>
                                        <td><i class="la la-money"></i></td>
                                        <td><i class="la la-map-marker"></i></td>
                                        <td><i class="la la-calendar"></i></td>
                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($itemSavercm as $itemSavercms)
                                    @if($itemSavercms->users_id == Auth::user()->id)
                                    <tr>
                                        <td>
                                            <a href="{{ route('job.list.detail', [Str::slug($itemSavercms->name), $itemSavercms->recruitment_id]) }}">
                                            <i>{{ $itemSavercms->name }}</i><br />
                                            </a>
                                            <a href="{{ route('job.company.detail', [Str::slug($itemSavercms->name_company), $itemSavercms->id]) }}" style="font-size: 13px;
                                            color: #888888;">
                                            <span>{{ $itemSavercms->name_company }}</span><br />
                                            </a>
                                        </td>
                                        <td>
                                            <span>{{ $itemSavercms->mname }}</span><br />
                                        </td>
                                        <td>
                                            <span>{{ $itemSavercms->city_name }}</span><br />
                                        </td>
                                        <td>
                                            <span class="text-left">{{ $itemSavercms->deadline }}</span><br />
                                        </td>
                                    </tr>
                                    @endif
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