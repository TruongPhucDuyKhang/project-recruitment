<div class="resumeadd-form">
    <div class="row">
        <div class="col-lg-12" style="margin-left:30px;">
            <span class="pf-title">Họ và tên: {{ Auth::user()->fullname }}</span>
            <span class="pf-title">Email: {{ Auth::user()->email }}</span>
            <span class="pf-title">Địa chỉ hiện tại: {{ Auth::user()->andress }}</span>
            <span class="pf-title">Ngày sinh: {{ date('d-m-Y', strtotime(Auth::user()->birthday)) }}</span>
        </div>
    </div>
</div> 
<div class="col-lg-7">
    <button type="submit" class="button" onclick="editProfile();">Chỉnh sửa</button>
</div>