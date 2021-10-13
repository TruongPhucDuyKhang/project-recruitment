<form method="POST" class="col-lg-12 column" action="{{ route('job.submitinfo.post-profile') }}" enctype="multipart/form-data">
    @csrf
    <div class="profile-title">
        <div class="upload-img-bar">
            <div class="uploadbox">
                 <label for="file-upload" class="custom-file-upload">
                    @if(Auth::user()->picture == '')
                    <i class="la la-cloud-upload"></i> <span>Avatar</span>
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
            <span class="pf-title">Tên chủ tài khoản *</span>
            <div class="pf-field">
                <input type="text" value="{{ Auth::user()->fullname }}" name="fullname"/>
            </div>
        </div>
        <div class="col-lg-6">
            <span class="pf-title">Email liên hệ *</span>
            <div class="pf-field">
                <input type="text" value="{{ Auth::user()->email }}" name="email"/>
            </div>
        </div>
        <div class="col-lg-6">
            <span class="pf-title">Địa chỉ liên hệ</span>
            <div class="pf-field">
                <input type="text" value="{{ Auth::user()->andress }}" name="andress" placeholder="VD: 05 Đặng Tất, Hoà Khánh Nam, Liên Chiểu, Đà Nẵng....">
            </div>
        </div>
        <div class="col-lg-6">
            <span class="pf-title">Ngày sinh *</span>
            <div class="pf-field">
                <input type="date" value="{{ Auth::user()->birthday }}" name="birthday">
            </div>
        </div>

        <div class="col-lg-7">
            <button type="submit" class="button" name="submit">Lưu</button>
        </div>
    </div>
</form>