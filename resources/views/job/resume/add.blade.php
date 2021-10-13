@extends('templates.job.master')
@section('main-content')
<section class="overlape">
<!-- main -->
@include('templates.job.main')
<!-- END MAIN -->
</section>

<section>
<div class="block remove-top">
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
<div class="border-title"><h3>TẠO HỒ SƠ ĐÍNH KÈM</h3>
<a class="cancel" href="#" title=""><i class="la la-close"></i> Đóng</a></div>
<div class="resumeadd-form">
<div class="row">
<div class="col-lg-12" style="margin-left:30px;">
<span class="pf-title">Họ và tên: {{ Auth::user()->fullname }}</span>
<span class="pf-title">Ngày sinh: {{ Auth::user()->birthday }}</span>
<span class="pf-title">Giới tính: Nữ</span>
<span class="pf-title">Địa chỉ hiện tại: 05 đặng tất</span>
<span class="pf-title">Tỉnh/thành phố: Đà Nẵng</span>
</div>
</div>
</div> 
<div class="border-title"></div>
</div>
<div class="manage-jobs-sec">
<div class="border-title"><h3>THÔNG TIN TỔNG QUAN (bắt buộc)</h3>
<a class="cancel" href="#" title=""><i class="la la-close"></i> Đóng</a></div>
<div class="resumeadd-form">
<div class="row">
<div class="col-lg-12">
<form action="javascript:void()" method="post" enctype="multipart/form-data">
<span class="pf-title">Tên Bằng cấp/Chứng chỉ</span>
<div class="pf-field">
    <input placeholder="Ví dụ: Cử nhân kinh tế, Trung cấp du lịch, Tốt nghiệp THPT..." type="text">
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Trường/Đơn vị đào tạo</span>
<div class="pf-field">
    <input type="text">
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Chuyên ngành</span>
<div class="pf-field">
    <input type="text">
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Ngày học</span>
<div class="pf-field">
    <input pl type="date" class="form-control datepicker">
</div>
</div>
<div class="col-lg-6">
<span class="pf-title">Ngày kết thúc môn học</span>
<div class="pf-field">
    <input pl type="date" class="form-control datepicker">
</div>
</div>
<div class="col-lg-12">
<span class="pf-title">Loại tốt nghiệp</span>
<div class="pf-field">
    <select placeholder="Chọn loại tốt nghiệp" class="chosen-city">
        <option value="">Xuất sắc</option>
        <option value="">Giỏi</option>
        <option value="">Khá</option>
        <option value="">Trung bình</option>
    </select>
</div>
</div>
<br />
<br />
<br />
<br />
<br />
<div class="form-group">
<div class="upload-portfolio">
    <div class="uploadbox">
        <label for="file-upload" class="custom-file-upload">
        <i class="la la-cloud-upload"></i> <span>Tải ảnh bằng cấp nếu có</span>
    </label>
    <input id="file-upload" type="file" style="display: none;">
    </div>
    <div class="uploadfield">
        <span class="pf-title">Ảnh bằng cấp</span>
        <div class="pf-field">
            <div class="upload-info">
                <span>(Dạng file ảnh .jpg, .gif, .png, dung lượng <= 300KB)</span>
            </div>
        </div>
    </div>
</div>
</div>
<div class="col-lg-6">
    <button type="submit">Đăng hồ sơ</button>
</div>
</form>
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