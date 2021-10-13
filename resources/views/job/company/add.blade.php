@extends('templates.job.master')
@section('main-content')
<section class="overlape">
<!-- main -->
@include('templates.job.main')
<!-- END MAIN -->
</section>
@if(Session::has('success'))
<script>
	toastr.info('Cập nhật thông tin thành công!', '', {
		"closeButton": true,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-center",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "0",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	  });
</script>
@endif
@if(Session::has('error'))
<script>
	toastr.info('Cập nhật thông tin thất bại!', '', {
		"closeButton": true,
		"debug": false,
		"newestOnTop": false,
		"progressBar": false,
		"positionClass": "toast-top-center",
		"preventDuplicates": false,
		"onclick": null,
		"showDuration": "300",
		"hideDuration": "1000",
		"timeOut": "0",
		"extendedTimeOut": "1000",
		"showEasing": "swing",
		"hideEasing": "linear",
		"showMethod": "fadeIn",
		"hideMethod": "fadeOut"
	  });
</script>
@endif
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
<div class="profile-form-edit">
    <form method="POST" action="{{ route('job.company.add') }}" enctype="multipart/form-data">
        @csrf
        <div class="profile-title">
            <h3>Hồ sơ công ty</h3>
            <div class="upload-img-bar">
                <div class="uploadbox">
                    <label for="file-upload" class="custom-file-upload">
                        @if(Auth::user()->picture == '')
                        <i class="la la-cloud-upload"></i> <span>Logo công ty</span>
                        @else
                        <img src="/job/storage/app/{{ Auth::user()->picture }}" alt="" class="custom-file-upload">
                        @endif
                    </label>
                    <input id="file-upload" type="file" style="display: none;" name="picture">
                </div>
                <div class="upload-info">
                    <span>Kích thước tệp tối đa là 1MB, Kích thước tối thiểu: 270x210 Và các tệp phù hợp là .jpg & .png</span>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-6">
                <span class="pf-title">Tên công ty *</span>
                <div class="pf-field">
                    @if(Auth::user()->name_company == null)
                    <input type="text" name="name_company" placeholder="Tên công ty đầy đủ và rõ kèm theo Giấy phép kinh doanh." />
                    @else
                    <input type="text" name="name_company" value="{{ Auth::user()->name_company }}" disabled />
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <span class="pf-title">Quy mô nhân sự *</span>
                <div class="pf-field">
                    @if(Auth::user()->personnel == null)
                    <select name="personnel" data-placeholder="Please Select Specialism" class="chosen">
                        <option value="Dưới 20 người">Dưới 20 người</option>
                        <option value="20 - 150 người">20 - 150 người</option>
                        <option value="150 - 300 người">150 - 300 người</option>
                        <option value="Trên 300 người">Trên 300 người</option>
                    </select>
                    @else 
                    <input type="text" value="{{ Auth::user()->personnel }}" disabled>
                    @endif
                </div>
            </div>
            <div class="col-lg-6">
                <span class="pf-title">Lĩnh vực hoạt động</span>
                <div class="pf-field">
                    <select data-placeholder="Please Select Specialism" class="chosen">
                        <option value="">asdasdasd</option>
                    </select>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="pf-title">Điện thoại cố định *</span>
                <div class="pf-field">
                    <input type="text" name="phone" value="{{ Auth::user()->phone }}" />
                </div>
            </div>
            <div class="col-lg-12">
                <span class="pf-title">Giới thiệu về công ty *</span>
                <div class="pf-field">
                    <textarea name="content_company">{{ Auth::user()->content_company }}</textarea>
                </div>
            </div>
            <div class="col-lg-6">
                <span class="pf-title">Địa chỉ công ty *</span>
                <div class="pf-field">
                    <input type="text" name="andress" value="{{ Auth::user()->andress }}">
                </div>
            </div>
            <div class="col-lg-6">
                <span class="pf-title">Tỉnh/Thành phố *</span>
                <div class="pf-field">
                    <select name="matp" class="chosen">
                        @foreach($city as $citys)
                        @php 
                        $selected = '';
                        @endphp
                        @if($citys->matp == Auth::user()->matp)  
                        @php
                            $selected = 'selected="selected"';
                        @endphp
                        @endif
                        <option {{ $selected }} value="{{ $citys->matp }}">{{ $citys->city_name }}</option>
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="col-lg-12">
                <span class="pf-title">Website</span>
                <div class="pf-field">
                    <input type="text" name="website" value="{{ Auth::user()->website }}" placeholder="Nếu có website...">
                </div>
            </div>
            
            <div class="form-group">
                <div class="col-lg-12">
                <button type="submit" name="submit">Lưu thông tin</button>
                </div>
            </div>
        </div>
    </form>
</div>
</div>
</div>
</div>
</div>
</div>
</section>
@stop