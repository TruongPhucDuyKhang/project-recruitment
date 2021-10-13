@extends('templates.job.master')
@section('main-content')
<section>
    <div class="block no-padding  gray">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="inner2">
                        <div class="inner-title2">
                            {{--  <h3>ĐĂNG NHẬP</h3>
                            <span>Keep up to date with the latest news</span>  --}}
                        </div>
                        {{--  <div class="page-breacrumbs">
                            <ul class="breadcrumbs">
                                <li><a href="#" title="">Home</a></li>
                                <li><a href="#" title="">Pages</a></li>
                                <li><a href="#" title="">Login</a></li>
                            </ul>
                        </div>  --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>

<section>
    <div class="block remove-bottom">
        <div class="container">
            <div class="row">
                <div class="col-lg-12">
                    <div class="account-popup-area signin-popup-box static">
                        <div class="account-popup">
                            <h3>Đăng nhập</h3>
                            <form method="post" action="{{ route('auth.auth.logins') }}">
                                @csrf
                                @if(Session::has('msg'))
                                <p class="text-danger">{{ Session::get('msg') }}</p>
                                @endif
                                <div class="cfield">
                                    <input type="email" placeholder="E-MAIL" name="email"/>
                                    <i class="la la-user"></i>
                                </div>
                                <div class="cfield">
                                    <input type="password" placeholder="********" name="password"/>
                                    <i class="la la-key"></i>
                                </div>
                                <p class="remember-label">
                                    <input type="checkbox" name="remember_me" id="cb1"><label for="cb1">Nhớ mật khẩu</label>
                                </p>
                                <a href="#" title="">Quên mật khẩu?</a>
                                <button type="submit">Đăng nhập</button>
                            </form>
                            <div class="extra-login">
                                <span>hoặc</span>
                                <div class="login-social">
                                    <a class="fb-login" href="#" title=""><i class="fa fa-facebook"></i></a>
                                    <a class="tw-login" href="#" title=""><i class="fa fa-twitter"></i></a>
                                </div>
                            </div>
                        </div>
                    </div><!-- LOGIN POPUP -->
                </div>
            </div>
        </div>
    </div>
</section>
@stop
