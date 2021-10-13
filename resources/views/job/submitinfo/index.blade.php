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
                            <h3>Việc đã ứng tuyển ({{ $sub->count() }})
                                <div class="col-lg-3" style="float:right;">
                                <form method="GET">
                                    <select onchange="location=this.value" data-placeholder="Sắp xếp theo" class="chosen">
                                        <option {{ $sort == 'thoi_gian_nop' ? 'selected="selected"' : ''}}
                                        value="{{ route('job.submitinfo.sort', 'thoi_gian_nop') }}">Thời gian nộp</option>
                                        <option {{ $sort == 'da_gui' ? 'selected="selected"' : ''}}
                                        value="{{ route('job.submitinfo.sort', 'da_gui') }}">Đã gửi</option>
                                        <option {{ $sort == 'dang_cho_duyet' ? 'selected="selected"' : ''}}
                                        value="{{ route('job.submitinfo.sort', 'dang_cho_duyet') }}">Đang chờ duyệt</option>
                                        <option {{ $sort == 'khong_duoc_duyet' ? 'selected="selected"' : ''}}
                                        value="{{ route('job.submitinfo.sort', 'khong_duoc_duyet') }}">Không được duyệt</option>
                                    </select>
                                </form>
                                </div>
                            </h3>       
                            <table>
                                @if($sub->count())
                                <thead>
                                    <tr>
                                        <td>Thông tin ứng tuyển</td>
                                        <td>Chức năng</td>                                        
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($sub as $subs)
                                    @php 
                                        $urlDetail    = route('job.list.detail', [Str::slug($subs->name), $subs->recruitment_id]);
                                        $urlCompany   = route('job.company.detail', [Str::slug($subs->name_company), $subs->id]);
                                        $newDeadline  = date('d/m/Y', strtotime($subs->deadline));
                                        $date_created = date('d/m/Y', strtotime($subs->date_created));
                                    @endphp
                                    <tr>
                                        <td>
                                            <a href="{{ $urlDetail }}">
                                            <i>{{ $subs->name }}</i><br />
                                            </a>
                                            <a href="{{ $urlCompany }}" style="font-size: 13px;
                                            color: #888888;">
                                            <span>{{ $subs->name_company }}</span><br />
                                            </a>
                                            <div class="row">
                                                <div class="col-lg-12">
                                                    <i class="la la-eye" style="color:black;"></i> <i style="font-size: 13px;">
                                                    @if($subs->submission_status == 0)
                                                    Trạng thái: <span class="text-muted">Đã gửi thành công</span></i><br />
                                                    @elseif($subs->submission_status == 1)
                                                    Trạng thái: <span class="text-primary">Đang chờ duyệt</span></i><br />
                                                    @elseif($subs->submission_status == 2)
                                                    Trạng thái: <span class="text-danger">Không được duyệt</span></i><br />
                                                    @endif
                                                    <i class="la la-clock-o" style="color:black;"></i> 
                                                    <i style="font-size: 13px;">Ngày nộp: {{ $date_created }}</i>
                                                </div>
                                                <!-- OR -->
                                                <div class="col-lg-12">
                                                    <i class="la la-bars" style="color:black;"></i> 
                                                    <i style="font-size: 13px;">Hồ sơ ứng tuyển: Hồ sơ nộp nhanh 
                                                    <span style="color:#2f2f7d;"><a href="">(Xem hồ sơ)</a></span></i><br />
                                                    <i class="la la-calendar" style="color:black;"></i> 
                                                    <i style="font-size: 13px;">Hạn nộp hồ sơ: {{ $newDeadline }}</i>
                                                </div>
                                            </div>
                                        </td>
                                        <td>
                                            <ul class="action_job">
                                                <li><span>Xoá</span><a href="#" data-id="{{ $subs->submission_info_id }}" class="delModel" title=""><i class="la la-trash-o"></i></a></li>
                                            </ul>
                                        </td>
                                    </tr>
                                    @endforeach
                                </tbody>
                                @else 
                                <p class="text-danger" style="font-size: 15px;
                                font-weight: bold;
                                color: #fb236a;
                                padding-bottom: 14px;margin:25px;">Không có ứng tuyển dụng nào</p>
                                @endif
                            </table>
                            <div class="pagination">
                                <ul>
                                   {{ $sub->links() }}
                                </ul>
                            </div>
                            <script>
                                $(document).ready(function (){
                                    $(".delModel").on("click", function(e){
                                        e.preventDefault();
                                        var id = $(this).attr("data-id");
                                        var url = "{{ route('del-sub') }}";
                                        
                                        $.ajax({
                                            url: url,
                                            data: {
                                                id:id,
                                            },
                                            success: function(data){
                                                toastr.success(data.success);
                                                window.location.reload();
                                            }
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