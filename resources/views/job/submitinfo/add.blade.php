@extends('templates.job.master')
@section('main-content')
<section class="overlape">
<!-- main -->
@include('templates.job.main')
<!-- END MAIN -->
</section>
@if(Session::has('msg'))
<script>
	toastr.success('{{ Session::get('msg') }}', '', {
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
                        <div class="profile-form-edit">
                            <div class="border-title"><h3>TẠO HỒ SƠ ĐÍNH KÈM</h3>
                            <a class="cancel" href="#" title=""><i class="la la-close"></i> Đóng</a></div>
                            <style>
                                .button {
                                    float: right;
                                    border: 2px solid #fb236a;
                                    color: #ffffff;
                                    font-family: Open Sans;
                                    font-size: 15px;
                                    padding: 12px 41px;
                                    -webkit-border-radius: 8px;
                                    -moz-border-radius: 8px;
                                    -ms-border-radius: 8px;
                                    -o-border-radius: 8px;
                                    border-radius: 8px;
                                    margin-top: 10px;
                                    background: #f43574;
                                }
                            </style>
                            <div id="ajax-profile">
                            @include('job.submitinfo.post-profile')
                            </div>
                            <script>
                                function editProfile(){
                                   var url = "{{ route('job.submitinfo.edit-profile') }}";
                                   $.ajax({
                                        url: url,
                                        data: {},
                                        success: function(data){
                                            $("#ajax-profile").html(data);
                                        },
                                   });
                                }
                            </script>
                            <div class="border-title"></div>
                        </div>
                        <style>
                            .form-control.errors {
                                border: 1px solid red !important;
                            }
                        </style>
                        <div class="manage-jobs-sec">
                            <form action="{{ route('job.submitinfo.add') }}" method="post" enctype="multipart/form-data">
                            @csrf
                            <div class="border-title"><h3>THÔNG TIN TỔNG QUAN (bắt buộc)</h3>
                            <a class="cancel" href="#" title=""><i class="la la-close"></i> Đóng</a></div>
                            <div class="resumeadd-form">
                                <div class="row">
                                    <div class="col-lg-12">
                                        <input type="hidden" name="recruitment_id" value="{{ Request::get('recruitment_id')}}">
                                        <span class="pf-title">Tên Bằng cấp/Chứng chỉ</span>
                                        <div class="pf-field">
                                            <input class="form-control @error('submission_info_location') errors @enderror" type="text" name="submission_info_location" placeholder="Ví dụ: Cử nhân kinh tế, Trung cấp du lịch, Tốt nghiệp THPT...">
                                            @error('submission_info_location') 
                                            <p class="text-danger">{{ $message }}</p> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Trường/Đơn vị đào tạo</span>
                                        <div class="pf-field">
                                            <input class="form-control @error('submission_info_school') errors @enderror" type="text" name="submission_info_school">
                                            @error('submission_info_school') 
                                            <p class="text-danger">{{ $message }}</p> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Chuyên ngành</span>
                                        <div class="pf-field">
                                            <input class="form-control @error('submission_info_specialized') errors @enderror" type="text" name="submission_info_specialized">
                                            @error('submission_info_specialized') 
                                            <p class="text-danger">{{ $message }}</p> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Ngày học</span>
                                        <div class="pf-field">
                                            <input type="date" class="form-control datepicker @error('school_day') errors @enderror" name="school_day">
                                            @error('school_day') 
                                            <p class="text-danger">{{ $message }}</p> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-6">
                                        <span class="pf-title">Ngày kết thúc môn học</span>
                                        <div class="pf-field">
                                            <input pl type="date" class="form-control datepicker @error('school_end_day') errors @enderror" name="school_end_day">
                                            @error('school_end_day') 
                                            <p class="text-danger">{{ $message }}</p> 
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-lg-12">
                                        <span class="pf-title">Loại tốt nghiệp</span>
                                        <div class="pf-field  @error('submission_info_type') form-control errors @enderror">
                                            <select placeholder="Chọn loại tốt nghiệp" class="chosen-city" name="submission_info_type">
                                                <option value="" selected="selected">Chọn loại tốt nghiệp</option>
                                                <option value="Xuất sắc">Xuất sắc</option>
                                                <option value="Giỏi">Giỏi</option>
                                                <option value="Khá">Khá</option>
                                                <option value="Trung bình">Trung bình</option>
                                            </select>
                                            @error('submission_info_type') 
                                            <p class="text-danger">{{ $message }}</p> 
                                            @enderror
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
                                                <i class="la la-cloud-upload"></i> <span>Ảnh bằng cấp (nếu có)</span>
                                            </label>
                                            <input id="file-upload" type="file" style="display: none;" name="submission_info_picture">
                                            </div>
                                            <div class="uploadfield">
                                                <div class="pf-field">
                                                    <div class="upload-info">
                                                        <span>(Dạng file ảnh .jpg, .gif, .png, dung lượng <=300KB)</span>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-7">
                                        <button type="submit">Nộp hồ sơ</button>
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