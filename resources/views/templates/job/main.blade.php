<div class="block no-padding">
    <div data-velocity="-.1" style="background: url({{ $publicUrl }}/images/resource/mslider3.jpg) repeat scroll 50% 422.28px transparent;" class="parallax scrolly-invisible no-parallax"></div><!-- PARALLAX BACKGROUND IMAGE -->
    <div class="container fluid">
        <div class="row">
            <div class="col-lg-12">
                <div class="inner-header">
                    @if(Auth::check())
                    <h3>Xin chào {{ Auth::user()->fullname }}</h3>
                    @else
                    <h3>Xin chào, Khách</h3>
                    @endif
                </div>
            </div>
        </div>
    </div>
</div>